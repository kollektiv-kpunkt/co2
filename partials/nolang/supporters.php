<?php
include(get_template_directory() . "/includes/conn.inc.php");
$lang_settings = get_option( 'co2_lang_options' );
$lang = $lang_settings["general"];
include(get_template_directory() . "/includes/{$lang}/var.inc.php");
?>
<div class="partial" id="load-ajax">
    <div class="supporter-grid">
    <?php
    $query = "SELECT * FROM `pn24_testimonials` WHERE `supporter_status` = 1 ORDER BY RAND()";

    $result = $conn->query($query);
    $i=1;
    while ($row = $result->fetch_assoc()) {
        if ($i > 12) {
            $hide = "hidden";
        }
    ?>
        <div class="supporter <?= $hide ?>" data-testimonial="<?=$i?>" id="<?=$row["supporter_UUID"]?>">
            <div class="s-over" id="saturation"></div>
            <div class="s-over" id="darken"></div>
            <div class="s-over" id="red"></div>
            <div class="s-over" id="name">
                <h5 class="nohyphen"><?=$row["supporter_fname"]?> <?=$row["supporter_lname"]?></h5>
            </div>
            <?php
            if ($row["supporter_img"] != "") { ?>
                <img src="/wp-content/themes/co2/upload/<?=$row["supporter_img"]?>" alt="<?=$row["supporter_fname"]?> <?=$row["supporter_lname"]?>">
            <?php } else if ($row["supporter_img"] != "") { ?>
                <img src="/wp-content/themes/co2/upload/fallback.jpg" alt="<?=$row["supporter_fname"]?> <?=$row["supporter_lname"]?>">
            <?php } else { ?>
                <img src="/wp-content/themes/co2/upload/fallback.jpg" alt="<?=$row["supporter_fname"]?> <?=$row["supporter_lname"]?>">
            <?php } ?>
        </div>
    <?php
    $i++;
    }
    ?>
        <div class="supp-quote" style="--quote-row: 2">
            <div class="quote-head"><span class="supp-name"></span><span class="supp-position"></span></span></div>
            <p><b class="supp-quote-text"></b></p>
            <i class="ri-close-circle-line" id="close-quote" style="position: absolute; top: -0.25rem; right: 0; cursor:pointer; font-size:1.5rem;"></i>
        </div>
    </div>
    <a href="#load-ajax" class="button" id="refreshgrid" style="margin-top:2rem; font-size: 1rem;"><?= $refresh_button ?></a>
</div>

<script>

jQuery("#refreshgrid").click(function(){
    jQuery(".supporter.hidden").removeClass("hidden")
    jQuery("#refreshgrid").remove()
})

jQuery("#close-quote").click(function(){
    jQuery(".supporter.active").removeClass("active");
    jQuery(".supp-quote").removeClass("active");
})

jQuery(".supporter").on("click", function() {
    if (jQuery(this).hasClass("active")){
        jQuery(this).removeClass("active");
        jQuery(".supp-quote").removeClass("active");
        return;
    }
    jQuery(".supporter.active").removeClass("active");
    jQuery(this).addClass("active");
    var uuid = jQuery(this).attr("id");
    var position = jQuery(this).attr("data-testimonial");
    if (window.innerWidth > 980) {
        var row = Math.ceil(position / 4) + 1;
    } else if (window.innerWidth <= 980 && window.innerWidth > 630) {
        var row = Math.ceil(position / 3) + 1;
    } else if (window.innerWidth <= 630) {
        var row = Math.ceil(position / 2) + 1;
    }
    jQuery.ajax({
        url: "/wp-content/themes/co2/partials/nolang/supporter-ajax.php",
        type: "post",
        data: {
            "uuid": uuid
        },
        dataType: "JSON",
        success: function(response){
            var currQuote = jQuery("supp-quote.active");
            if (currQuote) {
                currQuote.removeClass("active");
            }
            jQuery(".supp-name").html(`${response[0].fname} ${response[0].lname}`);
            jQuery(".supp-position").html(`${response[0].position}`);
            jQuery(".supp-quote-text").html(`«${response[0].quote}»`);
            jQuery(`.supp-quote`).css({"--quote-row":row});
            var select = jQuery(`.supp-quote`).addClass("active");
        }
    })
})
</script>
