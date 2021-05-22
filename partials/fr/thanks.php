<?php
$lang_settings = get_option( 'co2_lang_options' );
$lang = $lang_settings["general"];
include(get_template_directory() . "/includes/{$lang}/var.inc.php");

if (isset($_GET["type"])) {
    
} else {
    echo("
        <script>
            window.location.href = '/';
        </script>
    ");
}

$curr_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";

if (isset($_GET["some"])) {
    $some = 1;
} else {
    $some = 0;
}

if ($_GET["type"] == "acti" && $some == 1){ ?>

<p>Nous sommes heureux que vous souhaitiez soutenir notre campagne sur les réseaux sociaux.</p>
<p>Rejoignez notre groupe de bénévoles dès maintenant : </p>
<div class="buttongrid" style="margin-left:0;margin-bottom:1rem;margin-top:1rem;">
    <a href='<?= $WAchat ?>' target="_blank" class="button" style="font-size:1rem;margin-top:0;">Groupe WhatsApp</a>
    <?php 
    if ($teleYES == 1) { ?>
        <a href='<?= $Telechat ?>' target="_blank" class="button neg" style="font-size:1rem;margin-top:0;"">Groupe Telegram</a>
    <?php } ?>
</div>

<?php
} else if ($_GET["type"] == "acti" || $_GET["type"] == "testimonial" && $some == 0) { ?>

<p>Vous avez une seconde ? Invitez vos ami-e-s et connaissances à participer à la campagne !</p>
<div class="buttongrid" style="margin-left:0;margin-bottom:1rem;margin-top:1rem;">
    <a href='https://api.whatsapp.com/send?text=<?=$messagetxt?>' target="_blank" class="button" style="font-size:1rem;margin-top:0;">WhatsApp</a>
    <a href='https://t.me/share/url?url=<?=$mitmachen_link?>&text=<?=$messagetxt?>' target="_blank" class="button neg" style="font-size:1rem;margin-top:0;">Telegram</a>
</div>


<?php
} else {
    die("What the heck, how did you get here?");
}