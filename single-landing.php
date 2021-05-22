<?php 
get_header();
$lang_settings = get_option( 'co2_lang_options' );
$lang = $lang_settings["general"];
include(get_template_directory() . "/includes/{$lang}/var.inc.php");

if ($lang == "de") {
    $actual_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $cta_title = "Jede Stimme zählt!";
    $cta_sub = "Das CO2-Gesetz ist ein erster, wichtiger Schritt für den Klimaschutz. Wird das Gesetz am 13. Juni abgelehnt, verlieren wir entscheidende Jahre im Kampf gegen die Klimakrise. Das können wir uns nicht leisten! <b>Jetzt abstimmen und Bekannten und Freund:innen an die Abstimmung zu erinnern:</b>";
    $cta_wa_button = "Über WhatsApp teilen";
    $cta_wa_text = "Das CO2-Gesetz ist ein erster, wichtiger Schritt für den Klimaschutz. Wird das Gesetz am 13. Juni abgelehnt, verlieren wir entscheidende Jahre im Kampf gegen die Klimakrise. Das können wir uns nicht leisten! *Jetzt abstimmen und Bekannten und Freund:innen an die Abstimmung zu erinnern:* {$actual_url}";
    $cta_tele_button = "Über Telegram teilen";
    $cta_tele_text = "Das CO2-Gesetz ist ein erster, wichtiger Schritt für den Klimaschutz. Wird das Gesetz am 13. Juni abgelehnt, verlieren wir entscheidende Jahre im Kampf gegen die Klimakrise. Das können wir uns nicht leisten! **Jetzt abstimmen und Bekannten und Freund:innen an die Abstimmung zu erinnern:** {$actual_url}";
    $cta_share_link = $actual_url;
    $cta_more_button = "Mehr erfahren";
    $cta_more_link = "/#reasons";
} else if ($lang == "fr") {
    $actual_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $cta_title = "Chaque vote compte !";
    $cta_sub = "La loi sur le CO2 représente un premier pas important pour la protection du climat. Si le 13 juin la loi est rejetée, nous perdrons des années cruciales dans la lutte contre la catastrophe climatique. Nous ne pouvons pas nous le permettre ! <b>N'oublie pas de voter et demande à tes ami-e-s et connaissances de faire de même :</b>";
    $cta_wa_button = "Partager via WhatsApp";
    $cta_wa_text = "La loi sur le CO2 représente un premier pas important pour la protection du climat. Si le 13 juin la loi est rejetée, nous perdrons des années cruciales dans la lutte contre la catastrophe climatique. Nous ne pouvons pas nous le permettre ! *N'oublie pas de voter et demande à tes ami-e-s et connaissances de faire de même :* {$actual_url}";
    $cta_tele_button = "Partager via Telegram";
    $cta_tele_text = "La loi sur le CO2 représente un premier pas important pour la protection du climat. Si le 13 juin la loi est rejetée, nous perdrons des années cruciales dans la lutte contre la catastrophe climatique. Nous ne pouvons pas nous le permettre ! **N'oublie pas de voter et demande à tes ami-e-s et connaissances de faire de même :** {$actual_url}";
    $cta_share_link = $actual_url;
    $cta_more_button = "En savoir plus";
    $cta_more_link = "/#reasons";
} else if ($lang == "it") {
    $actual_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $cta_title = "OGNI VOTO CONTA!";
    $cta_sub = "La Legge sul CO2 è un primo, importante passo per la protezione del clima. Se la legge sarà bocciata il 13 giugno, perderemo anni cruciali nella lotta contro la crisi climatica. <b>Non possiamo permettercelo! Vota ora e ricorda ad amici, amiche e familiari di votare:</b>";
    $cta_wa_button = "Condividere su WhatsApp";
    $cta_wa_text = "La Legge sul CO2 è un primo, importante passo per la protezione del clima. Se la legge sarà bocciata il 13 giugno, perderemo anni cruciali nella lotta contro la crisi climatica. *Non possiamo permettercelo! Vota ora e ricorda ad amici, amiche e familiari di votare:* {$actual_url} ";
    $cta_tele_button = "Condividere su Telegram";
    $cta_tele_text = "La Legge sul CO2 è un primo, importante passo per la protezione del clima. Se la legge sarà bocciata il 13 giugno, perderemo anni cruciali nella lotta contro la crisi climatica. **Non possiamo permettercelo! Vota ora e ricorda ad amici, amiche e familiari di votare:** {$actual_url}";
    $cta_share_link = $actual_url;
    $cta_more_button = "Maggiori informazioni ";
    $cta_more_link = "/#reasons";
}

?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<div id="landing-hero-bg">
</div>
<div id="landing-hero">
</div>

<div id="landing-logo-container">
    <div id="landing-logo"><a href="/"><img src="<?= get_template_directory_uri() ?>/img/<?= $lang ?>/land-logo.svg" alt="Logo Ja zum CO2 Gesetz"></a></div>
</div>

<div class="land-cont">
    <div id="letter" style="transform: translateY(100vh)">
        <div id="letterhead-desk">
            <div id="letterhead-left">
                <div class="quote-cont">
                    <p class="quote">«<?php print ($lang == "fr") ? " " : ""; ?><?= the_field("quote")?><?php print ($lang == "fr") ? " " : ""; ?>»</p>
                    <img src="<?= get_template_directory_uri() ?>/img/quote.svg" class="quote-mark start" alt="lkjbsdfvlj">
                    <img src="<?= get_template_directory_uri() ?>/img/quote.svg" class="quote-mark end" alt="lkjbsdfvlj">
                </div>
                <?php
                if (get_field("signature")) { ?>
                    <img class="signature" src="<?= the_field("signature") ?>" alt="Unterschrift <?= the_title() ?>">
                <?php } ?>
                <p class="name-position"><b><?= the_title() ?></b><br>
                <?= the_field("function")?></p>
            </div>
            <div id="letterhead-right">
                <img class="personimg" src="<?= the_field("img") ?>" alt="<?= the_title() ?>">
            </div>
        </div>

        <div id="letter-content"><?= the_content() ?></div>
        
        <div id="cta" style="text-align: center">
            <h1 style="margin-top: 0; margin-bottom: 0.5rem; color: var(--red)"><?= $cta_title ?></h1>
            <p><?= $cta_sub ?></p>
            <a href="https://api.whatsapp.com/send?text=<?= urlencode($cta_wa_text)?>" target="_blank" class="button line"><?= $cta_wa_button ?></a>
            <a href="https://t.me/share/url?url=<?=urlencode($cta_share_link)?>&text=<?= urlencode($cta_tele_text) ?>" target="_blank" class="button line"><?= $cta_tele_button ?></a>
            <a href="<?= $cta_more_link ?>" class="button line"><?= $cta_more_button ?></a>
        </div>

    </div>
</div>


<?php endwhile; else: ?>

<h2><?php esc_html_e( '404 Error', 'phpforwp' ); ?></h2>
<p><?php esc_html_e( 'Sorry, content not found.', 'phpforwp' ); ?></p>

<?php endif; ?>





<?php 
wp_enqueue_style( 'landing', get_stylesheet_directory_uri() . "/style/elements/landing.css" );
wp_enqueue_script( 'landing', get_template_directory_uri() . '/js/landing.js', array ( 'jquery' ), 1.1, true);
get_footer($lang); 
?>