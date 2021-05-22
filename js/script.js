document.getElementById("opensesame").addEventListener("click", function() {
    document.getElementById("menu-overlay").classList.toggle("show");
    document.getElementById("main-content").classList.toggle("hide");
    document.getElementsByTagName("html")[0].classList.toggle("noscroll");
});

document.getElementById("closesesame").addEventListener("click", function() {
    document.getElementById("menu-overlay").classList.remove("show");
    document.getElementById("main-content").classList.remove("hide");
    document.getElementsByTagName("html")[0].classList.remove("noscroll");
})