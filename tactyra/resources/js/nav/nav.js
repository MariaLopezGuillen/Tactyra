document.addEventListener("DOMContentLoaded", function () {

    const menu = document.getElementById("mobile-menu");
    const nav = document.getElementById("nav-menu");

    if(menu){
        menu.addEventListener("click", function () {
            nav.classList.toggle("active");
        });
    }

});