const menu = document.getElementById('menu');
const cover = document.getElementById("cover");
const back = document.getElementById('back');


menu.addEventListener("click", () => {
    cover.style.display = "block";
})

back.addEventListener("click", () => {
    cover.style.display = "none";
})
