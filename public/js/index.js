const weeklyTopContainer = document.querySelector(".slider-viewport");
const catalogContainer = document.querySelector(".marketplace-content");
const collectionTableContainer = document.querySelector(".collection-table");

document.addEventListener("DOMContentLoaded", async () => {
    fetch("application/get_top_collection.php")
        .then( async res => res.ok ? drawWeeklyTop(await res.json()) : Promise.reject(res) )
        .catch( () => console.log("an error occured") );
    fetch("application/get_all_catalog.php")
        .then( async res => res.ok ? drawCatalog(await res.json()) : Promise.reject(res) )
        .catch( () => console.log("an error occured") );
    fetch("application/get_collections.php")
        .then( async res => res.ok ? drawCollections(await res.json()) : Promise.reject(res) )
        .catch( () => console.log("an error occured") );
});

const drawWeeklyTop = json => {
    json.forEach(element => populateContainer(weeklyTopContainer, element));
}; 

const drawCatalog = json => {
    for (let i = 0; i < json.length; i++) {
        if (i % 4 == 0)
            catalogContainer.innerHTML += "<div class=\"marketplace-content-row\"></div>";
        populateContainer(catalogContainer.lastChild, json[i]);       
    }
}; 

const populateContainer = (container, element) => {
    container.innerHTML += `
        <div class="nft-item">
            <div class="nft-item-img">
                <img src="public/img/${element.imagePath}.png" alt="nft">
            </div>
            <div class="nft-item-title">${element.title}</div>
            <div class="nft-item-bottom-controls">
                <div class="nft-item-current-bid">
                    Current bid
                    <div class="ntf-item-current-bid-val">
                        ${element.bid}
                    </div>
                </div>
                <button class="nft-item-place-bid">place bid</button>
            </div>
        </div>
    `;
};

const drawCollections = json => {
    json.forEach(element => {
        collectionTableContainer.innerHTML += `
            <tr class="table-row">
                <td class="collection-owner-info">
                    <div class="owner-ico">
                        <img src="public/img/${element.image}.png" alt="" >
                    </div>
                    <div class="owner-info-group">
                        <div class="collection-name-value">${element.title}</div>
                        <div class="collection-owner-value">By ${element.holder}</div>
                    </div>
                </td>
                <td class="collection-volume-value table-header-content-item">${element.volume}</td>
                <td class="collection-addition-value table-header-content-item">+ ${element.percent}%</td>
                <td class="collection-floor-price-value table-header-content-item">${element.floor}</td>
                <td class="collection-item-count-value table-header-content-item">${element.items}</td>
            </tr> 
        `;
    });
};

  