function checkDone() {
    if (jQuery(".cta-button.done").length == jQuery(".cta-button").length) {
        var lang = jQuery("#challenge").attr("data-lang");
        jQuery(".challenge-inner").load("/wp-content/themes/co2/partials/nolang/thx-challenge.php?lang=" + lang);
    }
}

jQuery(".cta-button").click(function(e){
    e.preventDefault();
    var type = jQuery(this).attr("data-cta-type");
    var src = jQuery(this).attr("data-src");

    if (type == "facebook") {
        window.open(src, "windowName", "height=200,width=200")
    } else if (type == "instagram") {
        window.open(src, "windowName", "height=540,width=960")
    } else if (type == "download") {
        window.open(src)
    }

    jQuery(this).addClass("done");
    setTimeout(() => {
        checkDone();
    }, 2500);
})

