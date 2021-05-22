<?php
include(__DIR__ . "/../../includes/conn.inc.php");
$lang_settings = get_option( 'co2_lang_options' );
$lang = $lang_settings["general"];

$challengercount = $conn->query("SELECT * from `pn24_challengers`")->num_rows;

if ($challengercount <= 750) {
    $goal = 1000;
} else if ($challengercount <= 1500) {
    $goal = 2000;
} else {
    $goal = 3000;
}

$difference = $goal - $challengercount;

$percentage = floor($challengercount / $goal * 100);

if ($percentage >= 100) {
    $percentage = 100;
}

if ($percentage < 25) {
    $challengemsg = "Wir haben erst {$challengercount} Challengers zusammen: Tragen Sie sich auch ein und helfen Sie uns, das Ziel zu erreichen!";
} else if ($percentage < 75) {
    $challengemsg = "Schon {$challengercount} Challengers unterstützen unsere Challenge Woche: Tragen Sie sich auch ein, damit wir unser Ziel erreichen können!";
} else if ($percentage <= 75) {
    $challengemsg = "Fast geschafft! Uns fehlen noch {$difference} Challengers um unser Ziel zu erreichen: Zusammen können wir unser Ziel erreichen!";
} else if ($percentage = 100) {
    $challengemsg = "Geschaft! Wir haben unser Ziel erreicht! Dennoch: Je mehr Menschen wir in dieser Woche mobilisieren können, desto besser: Tragen Sie sich deshalb ein, um uns zu helfen, möglichst viele Menschen für ein JA zum CO2 Gesetz zu überzeugen!";
}



?>

<div class="partial" id="challenge-week">
    <h4 style="margin-bottom: 0">Akzeptieren Sie die Challenge?</h4>
    <div id="progress-container">
        <div id="arrow-container" style="margin-left: 0%">
            <div id="arrow-inner">
                <small><span id="arrow-percentage"></span>%</small>
                <i class="ri-arrow-down-line"></i>
            </div>
        </div>
        <div id="amount-container">
            <small style="color: var(--red)">0</small>
            <small style="color: green"><?= number_format($goal, 0, ",", "'") ?></small>
        </div>
        <div id="progress-outer">
            <div id="progress-inner" style="width: 0%">
            </div>
        </div>
        <small><?= $challengemsg ?></small>
    </div>
    <div class="challenge-form-container">
        <small id="e403" style="color: green; padding-bottom: 0.5rem; display: none; text-align: center">Sie sind bereits für die Challenge Woche angemeldet!</small>
        <small id="e500" style="color: red; padding-bottom: 0.5rem; display: none; text-align: center">Da ist leider etwas schiefgelaufen. Bitte versuchen Sie es später nochmals!</small>
        <form action="/" id="challenge-form">
            <div class="form-cell">
                <input type="text" name="fname" placeholder="Vorname" required>
            </div>
            <div class="form-cell">
                <input type="text" name="lname" placeholder="Nachname" required>
            </div>
            <div class="form-cell">
                <input type="email" name="email" placeholder="E-Mail Adresse" required>
            </div>
            <div class="form-cell">
                <input type="number" name="plz" placeholder="PLZ" required>
            </div>
            <div class="form-cell">
                <input type="text" name="phone" placeholder="Telefonnummer (optional)">
            </div>
            <div class="form-cell full check">
                <input type="checkbox" id="optin" name="optin" checked>
                <label for="optin">Ich bin einverstanden, dass die SP mich auf dem Laufenden hält. Mehr dazu <a href="https://www.sp-ps.ch/de/partei/wir-sind-die-sp/datenschutz-policy" target="_blank">hier.</a></label>
            </div>
            <input type="hidden" name="lang" value="<?= $lang ?>">
            <input type="hidden" name="uuid" value="<?= uniqid("challenger_") ?>">
            <div class="form-cell end">
                <button type="submit" id="submit-form" class="button">Mitmachen</button>
            </div>
        </form>
    </div>
</div>



<?php
wp_enqueue_style( 'challenge-week', get_stylesheet_directory_uri() . "/style/elements/challenge-week.css" );
wp_enqueue_script( 'challenge-week-js', get_template_directory_uri() . '/js/challenge-week.js', array ( 'jquery' ), 1.1, true);
?>

<script src="<?=get_template_directory_uri()?>/vendor/jquery.countTo.js"></script>
<script>
    setTimeout(() => {
        jQuery('#arrow-percentage').countTo({from: 0, to: <?= $percentage ?>});
        jQuery('#arrow-container').css('margin-left', '<?= $percentage ?>%')
        jQuery('#progress-inner').css('width', '<?= $percentage ?>%')
    }, 250);
</script>