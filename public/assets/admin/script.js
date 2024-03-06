const showPopupBtn = document.querySelector(".btn-success");
const hidePopupBtn = document.querySelector(".form-popup .close-btn");

//Show form popup
showPopupBtn.addEventListener("click", () => {
    document.body.classList.toggle("show-popup");
});

//Hide form popup
hidePopupBtn.addEventListener("click", () => showPopupBtn.click());