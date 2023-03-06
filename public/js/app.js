window.addEventListener("DOMContentLoaded", () => {

    //Nav mobile
    let items = document.getElementById('mobile_drop');
    let nav_drop = Array.from(items.children);

    nav_drop.forEach(element =>
        element.addEventListener("touchstart", function () {
            this.classList.toggle("unfold"); 
        })
    );




});