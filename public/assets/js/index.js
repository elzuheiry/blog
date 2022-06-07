setTimeout(() => {
    document.querySelector(".flash-message").style.display = "none";
}, 4000);

const category_select = document.getElementById("category_select");
const category_options = document.getElementById("category_options");

category_select.addEventListener("click", () => {
    category_options.classList.toggle("active");
});

const author_select = document.getElementById("author_select");
const author_options = document.getElementById("author_options");

author_select.addEventListener("click", () => {
    author_options.classList.toggle("active");
});
