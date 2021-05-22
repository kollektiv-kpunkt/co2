<?php
/**
* Template Name: FAQ Page
*
* @package WordPress
* @subpackage Twenty_Fourteen
* @since Twenty Fourteen 1.0
*/

get_header();
get_header("nav"); 
$lang_settings = get_option( 'co2_lang_options' );
$lang = $lang_settings["general"];
?>


<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<div id="page-content" class="smcont reveal">
    <h1><?= the_title() ?></h1>
    <?= the_content() ?>
    <div class="faq-container partial">
    <?php

    // Check rows exists.
    if( have_rows('faq_topics') ):
        
        // Loop through rows.
        while( have_rows('faq_topics') ) : the_row();
        
        ?>
        <div class="topic">
            <h3><?= the_sub_field("title") ?></h3><?php
            // Check rows exists.
            if( have_rows('subtopic') ):
                
                // Loop through rows.
                while( have_rows('subtopic') ) : the_row();
                
                ?>
                <div class="subtopic toggle">
                    <div class="subtopic-head"><h5><?= the_sub_field("subtitle") ?></h5><i class="ri-arrow-drop-down-line"></i></div>
                    <div class="subtopic-content">
                    <?php
                    
                    // Check rows exists.
                    if( have_rows('questions') ):
                        
                        // Loop through rows.
                        while( have_rows('questions') ) : the_row();
                        
                        // Load sub field value.
                        ?>
                        <div class="question toggle">
                            <div class="question-head"><b><?= the_sub_field("question") ?></b><i class="ri-arrow-drop-down-line"></i></div>
                            <div class="question-content">
                                <p><?= the_sub_field("answer") ?></p>
                            </div>
                            <?php
                                
                                // End loop.
                            ?>
                        </div>
                        <?php
                            endwhile;
                            // No value.
                            else :
                                // Do something...
                            endif;
                        
                        // End loop.
                    ?>
                    </div>
                </div>
                <?php
                    endwhile;
                    // No value.
                    else :
                        // Do something...
                    endif;    
                ?>
        </div>
        <hr class="topic-divider">
            <?php
            endwhile;
            // No value.
            else :
                // Do something...
            endif;
        ?>
    </div>
</div>


<?php endwhile; else: ?>

<h2><?php esc_html_e( '404 Error', 'phpforwp' ); ?></h2>
<p><?php esc_html_e( 'Sorry, content not found.', 'phpforwp' ); ?></p>

<?php endif; ?>


<script>

jQuery(".subtopic-head").click(function() {
    if (jQuery(this).parent().hasClass("active")) {
        jQuery(".question.active").removeClass("active")
        jQuery(this).parent().removeClass("active")
    } else {
        jQuery(".subtopic.active").removeClass("active")
        jQuery(".question.active").removeClass("active")
        jQuery(this).parent().addClass("active")
    }
})
jQuery(".question-head").click(function() {
    if (jQuery(this).parent().hasClass("active")) {
        jQuery(this).parent().removeClass("active")
    } else {
        jQuery(".question.active").removeClass("active")
        jQuery(this).parent().addClass("active")
    }
})

jQuery(".subtopic").first().addClass("active");


</script>

<?php get_footer($lang); ?>