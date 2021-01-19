
var menu_item_has_child = document.querySelectorAll(".menu-item-has-children > a");
var toggle_submenu = function (e) {
    if (this.parentElement.classList.contains("close")) {
        e.preventDefault();
        this.parentElement.classList.remove("close");
    } else {
        document.querySelectorAll('.menu-item-has-children').forEach(el => el.classList.remove('close'));
        e.preventDefault();
        this.parentElement.classList.add("close");
    }
};

for (var i = 0; i < menu_item_has_child.length; i++) {
    menu_item_has_child[i].addEventListener("click", toggle_submenu, false);
}




document.getElementById("hamburger-toggle").addEventListener("click", toggle_nav);
function toggle_nav() {

    var ele = document.getElementById("site-navigation");
    if (ele.classList.contains("active")) {
        ele.classList.remove("active");
        this.classList.remove("close");
    } else {
        ele.classList.add("active");
        this.classList.add("close");
    }
}



document.getElementById("search-trigger").addEventListener("click", toggleSearch);
function toggleSearch() {
    document.getElementById("search-form-wrapper").classList.toggle("visible");
}
