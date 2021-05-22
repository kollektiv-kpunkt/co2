var landingStyles = function landingStyles() {
    var vw = window.innerWidth * 0.01;
    document.documentElement.style.setProperty("--vw", `${vw}px`);
    if (window.innerWidth > 1095) {
        var landcpad = (window.innerWidth - 985) / 2;
    } else {
        var landcpad = 5 * vw;
    }
    document.documentElement.style.setProperty("--landcpad", `${landcpad}px`);
}

window.addEventListener("load", landingStyles, false);
window.addEventListener("resize", landingStyles, false);

setTimeout(() => {
    jQuery("#letter").css("transform", "translateX(0)")
}, 750);