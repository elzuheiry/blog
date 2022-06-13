const nav_tabs_head = document.querySelector(".nav-tabs-head");
const navTabs = document.querySelector(".nav-tabs");

nav_tabs_head.onclick = (event) => {
    if (
        event.target.classList.contains("tab_link") &&
        !event.target.classList.contains("active")
    ) {
        nav_tabs_head.querySelector(".active").classList.remove("active");
        event.target.classList.add("active");

        const dataTarget = event.target.getAttribute("data-target");

        navTabs
            .querySelector(".permissionsTabs .active")
            .classList.remove("active");

        navTabs.querySelector(dataTarget).classList.add("active");
    }
};

function flashMessage() {
    document.querySelector(".flash-message").style.display = "none";
}

setTimeout(flashMessage, 4000);

const category_select = document.querySelector(".category_select");
const category_options = document.getElementById("category_options");

category_select.onclick = () => {
    console.log("hi");
    // category_options.classList.toggle("active");
};

const author_select = document.getElementById("author_select");
const author_options = document.getElementById("author_options");

author_select.addEventListener("click", () => {
    author_options.classList.toggle("active");
});
