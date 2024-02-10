const leftBtn = document.querySelector(".left");
const rightBtn = document.querySelector(".right");
const container = document.querySelector(".slider-viewport");

const CLICK_OFFSET = 425;
const HOLD_OFFSET = 275;

let timer;

leftBtn.addEventListener("click", () => {
    container.scrollLeft -= CLICK_OFFSET;
});

rightBtn.addEventListener("click", () => {
    container.scrollLeft += CLICK_OFFSET;
});

leftBtn.addEventListener("mousedown", evt => {
    timer = window.setInterval(() => {
        container.scrollLeft -= HOLD_OFFSET;
    }, 100);
});

rightBtn.addEventListener("mousedown", evt => {
    timer = window.setInterval(() => {
        container.scrollLeft += HOLD_OFFSET;
    }, 100);
});

leftBtn.addEventListener("mouseup", evt => {
    stopTimer();
});

rightBtn.addEventListener("mouseup", evt => {
    stopTimer();
});

const stopTimer = () => {
    clearTimeout(timer);
};

container.scrollLeft += 425;