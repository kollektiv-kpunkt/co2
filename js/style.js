var styleSets = function styleSets() {
    var vh = window.innerHeight * 0.01;
    var vw = window.innerWidth * 0.01;
    document.documentElement.style.setProperty("--vh", `${vh}px`);
    document.documentElement.style.setProperty("--vw", `${vw}px`);

    if (window.innerWidth > 881.1111111111111) {
        var scpad = (window.innerWidth - 793) / 2;
    } else if (window.innerWidth > 438 && window.innerWidth < 630) {
        var scpad = (window.innerWidth - 394) / 2;
    }
    else {
        var scpad = 5 * vw;
    }
    document.documentElement.style.setProperty("--scpad", `${scpad}px`);
    if (window.innerWidth > 1400) {
        var mcpad = (window.innerWidth - 1260) / 2;
    } else {
        var mcpad = 5 * vw;
    }
    document.documentElement.style.setProperty("--mcpad", `${mcpad}px`);
    var lcpad = 5 * vw;
    document.documentElement.style.setProperty("--lcpad", `${lcpad}px`);

    // ScrollReveal({ reset: true }).reveal('.reveal :not(.noreveal)', { delay: 200 })
}

window.addEventListener("load", styleSets, false);
window.addEventListener("resize", styleSets, false);