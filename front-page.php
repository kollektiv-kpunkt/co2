<?php get_header();
$lang_settings = get_option( 'co2_lang_options' );
$lang = $lang_settings["general"];
include(get_template_directory() . "/includes/{$lang}/var.inc.php");
?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<div id="heroine">
    <div id="h-content" class="h-fullscreen">
        <div class="smcont" id="h-cont-inner">
            <?= the_content() ?>
            <div class="buttongrid">
                <a href="#reasons" class="button"><?= $h_button1 ?></a>
                <a href="<?=$mitmachen_link?>" class="button neg"><?= $h_button2 ?></a>
            </div>
        </div>
    </div>

    <div id="h-overlay" class="h-fullscreen">
    </div>

    <div id="h-bg" class="h-fullscreen" style="background-image:url('<?= get_template_directory_uri() ?>/img/h-bg.png')">
    </div>

    <img src="<?= get_template_directory_uri()?>/img/<?= $lang ?>/h-text1.svg" alt="Ja zur Klimagerechtigkeit" class="h-text" id="h-text1">
    <img src="<?= get_template_directory_uri()?>/img/<?= $lang ?>/h-text2.svg" alt="Ja zum Co2 Gesetz" class="h-text" id="h-text2">
    <img src="<?= get_template_directory_uri()?>/img/<?= $lang ?>/h-logo.svg" alt="SP Logo" class="h-text" id="h-logo">
    <img src="<?= get_template_directory_uri()?>/img/h-menu.svg" alt="Menu" class="h-text" id="opensesame">
</div>

<div id="reasons" class="lgcont reveal">
    <h1 class="t-21"><?php the_field("reasons_title")?></h1>
    <div id="reason-grid">
    <?php

    // Check value exists.
    if( have_rows('reasons') ):

        // Loop through rows.
        $i = 1;
        while ( have_rows('reasons') ) : the_row();

            // Case: Paragraph layout.
            if( get_row_layout() == 'reason' ):
                ?>
        
        <div class="reason">
            <div class="r-no">
                <h1><?= $i; ?></h1>
            </div>  
            <div class="r-cont">
                <h3><?= get_sub_field("r_title")?></h3>
                <?= get_sub_field("r_content")?>
            </div>
        </div>


                <?php
                

            endif;
        $i++;
        // End loop.
        endwhile;

    // No value.
    else :
        // Do something...
    endif;
    ?>
    </div>
</div>

<?php
if (get_field("bottom_content")): ?>
<div id="bottom_content" class="smcont">
<?= the_field("bottom_content") ?>
</div>
<?php
endif;
?>

<script>
    setTimeout(() => {
       document.getElementById("h-bg").classList.add("show"); 
    }, 1250);
    setTimeout(() => {
       document.getElementById("h-overlay").classList.add("show"); 
    }, 3750);
    setTimeout(() => {
       document.getElementById("h-content").classList.add("show"); 
    }, 4000);
</script>



<?php
if (get_field("home_popup")): ?>
<div id="home_popup">
<div id="popup-inner" class="smcont">
<div id="popup-cont">
<?= the_field("home_popup") ?>
<i class="ri-close-circle-fill" id="close-button"></i>
</div>
</div>
</div>
<?php
endif;
?>

<script>

jQuery('.r-cont h3').highlight('gerechtigkeit');
jQuery('.r-cont h3').highlight('Agir équitablement');

jQuery(".highlight").click(function(){
    var homepopup = document.getElementById("home_popup");
    if (homepopup) {
        jQuery("#home_popup").addClass("show");
        jQuery("html").addClass("noscroll");
    }
})

jQuery("#home_popup").click(function(){
    jQuery("#home_popup").removeClass("show");
    jQuery("html").removeClass("noscroll");
})

jQuery("#popup-cont").click(function(event){
    event.stopPropagation();
})

jQuery("#close-button").click(function(){
    jQuery("#home_popup").removeClass("show");
    jQuery("html").removeClass("noscroll");
})

</script>

<?php endwhile; else: ?>

<h2><?php esc_html_e( '404 Error', 'phpforwp' ); ?></h2>
<p><?php esc_html_e( 'Sorry, content not found.', 'phpforwp' ); ?></p>

<?php endif; ?>

<?php get_footer($lang); ?>