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

<p>Es freut uns, dass Sie unsere Social-Media-Kampagne unterstützen wollen.</p>
<p>Treten Sie jetzt unserer Freiwillige-Gruppe bei:</p>
<div class="buttongrid" style="margin-left:0;margin-bottom:1rem;margin-top:1rem;">
    <a href='<?= $WAchat ?>' target="_blank" class="button" style="font-size:1rem;margin-top:0;">Whatsapp Gruppe</a>
    <?php 
    if ($teleYES == 1) { ?>
        <a href='<?= $Telechat ?>' target="_blank" class="button neg" style="font-size:1rem;margin-top:0;"">Telegram Gruppe</a>
    <?php } ?>
</div>

<?php
} else if ($_GET["type"] == "acti" || $_GET["type"] == "testimonial" && $some == 0) { ?>

<p>Haben Sie noch eine Sekunde Zeit? Laden Sie Freund:innen und Bekannte ein, Teil der Kampagne zu werden!</p>
<div class="buttongrid" style="margin-left:0;margin-bottom:1rem;margin-top:1rem;">
    <a href='https://api.whatsapp.com/send?text=<?=$messagetxt?>' target="_blank" class="button" style="font-size:1rem;margin-top:0;">Auf Whatsapp teilen</a>
    <a href='https://t.me/share/url?url=<?=$mitmachen_link?>&text=<?=$messagetxt?>' target="_blank" class="button neg" style="font-size:1rem;margin-top:0;">Auf Telegram teilen</a>
</div>


<?php
} else {
    die("What the heck, how did you get here?");
}