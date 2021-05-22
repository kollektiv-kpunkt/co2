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

<p>Grazie per voler sostenere la nostra campagna come volontario/a per i social media!</p>
<p>Scelga l’applicazione da lei preferita e aderisca ora a uno dei nostri gruppi:</p>
<div class="buttongrid" style="margin-left:0;margin-bottom:1rem;margin-top:1rem;">
    <a href='<?= $WAchat ?>' target="_blank" class="button" style="font-size:1rem;margin-top:0;">Gruppo WhatsApp</a>
    <?php 
    if ($teleYES == 1) { ?>
        <a href='<?= $Telechat ?>' target="_blank" class="button neg" style="font-size:1rem;margin-top:0;"">Gruppo Telegram</a>
    <?php } ?>
</div>

<?php
} else if ($_GET["type"] == "acti" || $_GET["type"] == "testimonial" && $some == 0) { ?>

<p>Ha ancora un attimo di tempo? Inviti amici e amiche e conoscenti a far parte anche loro della campagna!</p>
<div class="buttongrid" style="margin-left:0;margin-bottom:1rem;margin-top:1rem;">
    <a href='https://api.whatsapp.com/send?text=<?=$messagetxt?>' target="_blank" class="button" style="font-size:1rem;margin-top:0;">Via Whatsapp</a>
    <a href='https://t.me/share/url?url=<?=$mitmachen_link?>&text=<?=$messagetxt?>' target="_blank" class="button neg" style="font-size:1rem;margin-top:0;">Via Telegram</a>
</div>


<?php
} else {
    die("What the heck, how did you get here?");
}