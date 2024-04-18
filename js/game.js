const gameBoard = document.getElementById('game-board');
let cardArr = [];
const cardArrEasy = [1, 1, 2, 2, 3, 3, 4, 4, 5, 5];
const cardArrMed = [1, 1, 2, 2, 3, 3, 4, 4, 5, 5, 6, 6, 7, 7, 8, 8, 9, 9, 10, 10];
const cardArrHard = [1, 1, 2, 2, 3, 3, 4, 4, 5, 5, 6, 6, 7, 7, 8, 8, 9, 9, 10, 10, 11, 11, 12, 12, 13, 13, 14, 14, 15, 15];
const cardArrExtreme = [1, 1, 2, 2, 3, 3, 4, 4, 5, 5, 6, 6, 7, 7, 8, 8, 9, 9, 10, 10, 11, 11, 12, 12, 13, 13, 14, 14, 15, 15, 16, 16, 17, 17, 18, 18, 19, 19, 20, 20];

let clickedArr = [];
let itemArr = [];
let itemClass = [];
let cardMatches = 0;
let attempts = 0;
let difficulty = "medium";
let extreme = false;
let matchesNeeded = cardArrMed / 2;

function shuffleArray(array) {
    for (let i = array.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        [array[i], array[j]] = [array[j], array[i]];
    }
}

function setupGame() {
    selectDifficulty();
    gameBoard.innerHTML = "";
    shuffleArray(cardArr);
    setupCards();
    attempts = 0;
    cardMatches = 0;
}

function setupCards() {
    cardArr.forEach((a, b) => {
        return gameBoard.innerHTML +=
            `<div id='card' class='card${b}'>
            ${a}
        </div>`
    });

}

function removeClasses() {
    gameBoard.classList.remove('easy');
    gameBoard.classList.remove('medium');
    gameBoard.classList.remove('hard');
    gameBoard.classList.remove('extreme');
}

function resetClicks() {
    clickedArr = [];
    itemArr = [];
    itemClass = [];
}

function removeClass() {
    itemArr.map(a => { a.classList.remove('active') });
    resetClicks();
}

function selectDifficulty() {
    if (difficulty == "easy") {
        cardArr = cardArrEasy;
        extreme = false;
        removeClasses();
        gameBoard.classList.add('easy');
    } else if (difficulty == "medium") {
        cardArr = cardArrMed;
        extreme = false;
        removeClasses();
        gameBoard.classList.add('medium');
    } else if (difficulty == "hard") {
        cardArr = cardArrHard;
        extreme = false;
        removeClasses();
        gameBoard.classList.add('hard');
    } else if (difficulty == "extreme") {
        cardArr = cardArrExtreme;
        extreme = true;
        removeClasses();
        gameBoard.classList.add('extreme');
    }
    matchesNeeded = (cardArr.length / 2);
}

function checkClick() {
    let classList = event.srcElement.className.split(/\s+/);

    if (itemArr.length <= 1 && itemClass[0] !== classList[0]) {

        itemClass.push(event.target.classList[0]);
        itemArr.push(event.target);

        if (clickedArr.length <= 2) {
            clickedArr.push(event.target.innerHTML);
            event.target.classList.add('active');
        }
    }

    if (clickedArr.length === 2) {
        if (clickedArr[0] === clickedArr[1]) {
            setTimeout(function () { itemArr.map(a => { a.classList.remove('active'); a.classList.add('matched'); }) }, 800);
            cardMatches++;
        }
        attempts++;
        setTimeout(function () { removeClass() }, 800);

    }

    if (cardMatches >= matchesNeeded) {
        setTimeout(function () { window.location.replace("http://divesea/html/you_won.php") }, 500);
    }
    if (extreme == true && attempts >= 70) {
        setTimeout(function () {
            infoBox.innerHTML =
            `<p>You Lose! Attempts: ${attempts}</p> <button id='reset' onClick='setupGame()' class="btn">Reset</button>`;
            gameBoard.innerHTML = "";
        }, 100);
        gameBoard.innerHTML = "";
    }
}


setupGame();


document.addEventListener('click', function (event) {
    if (event.target.matches('#easy')) { difficulty = "easy"; setupGame() }
    if (event.target.matches('#medium')) { difficulty = "medium"; setupGame() }
    if (event.target.matches('#hard')) { difficulty = "hard"; setupGame() }
    if (event.target.matches('#extreme')) { difficulty = "extreme"; setupGame() }

    if (!event.target.matches('#card')) { return };


    checkClick();
    updateInfoBox();

}, false);


