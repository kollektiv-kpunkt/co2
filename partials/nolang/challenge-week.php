<?php
include(__DIR__ . "/../../includes/conn.inc.php");
$lang_settings = get_option( 'co2_lang_options' );
$lang = $lang_settings["general"];

require(__DIR__ . "/../i18n/{$lang}.php");

?>

<?php

if (date("d.m.Y", strtotime("+2 hour")) == "24.05.2021") {
    include(__DIR__ . "/../challenges/1.php");
}

if (date("d.m.Y", strtotime("+2 hour")) == "25.05.2021") {
    include(__DIR__ . "/../challenges/2.php");
}

if (date("d.m.Y", strtotime("+2 hour")) == "26.05.2021") {
    include(__DIR__ . "/../challenges/3.php");
}

if (date("d.m.Y", strtotime("+2 hour")) == "27.05.2021") {
    include(__DIR__ . "/../challenges/4.php");
}

if (date("d.m.Y", strtotime("+2 hour")) == "28.05.2021") {
    include(__DIR__ . "/../challenges/6.php");
}

if (date("d.m.Y", strtotime("+2 hour")) == "29.05.2021") {
    include(__DIR__ . "/../challenges/5.php");
}

if (date("d.m.Y", strtotime("+2 hour")) == "30.05.2021") {
    include(__DIR__ . "/../challenges/7.php");
}

?>



<div class="partial" id="challenge-week">
    <h4 style="margin-bottom: 0"><?= $i18n["f-title"] ?></h4>
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
        <small id="e403" style="color: green; padding-bottom: 0.5rem; display: none; text-align: center"><?= $i18n["f-already-registered"] ?></small>
        <small id="e500" style="color: red; padding-bottom: 0.5rem; display: none; text-align: center"><?= $i18n["f-error"] ?></small>
        <form action="/" id="challenge-form">
            <div class="form-cell">
                <input type="text" name="fname" placeholder="<?= $i18n["fname"] ?>" required>
            </div>
            <div class="form-cell">
                <input type="text" name="lname" placeholder="<?= $i18n["lname"] ?>" required>
            </div>
            <div class="form-cell">
                <input type="email" name="email" placeholder="<?= $i18n["email"] ?>" required>
            </div>
            <div class="form-cell">
                <input type="number" name="plz" placeholder="<?= $i18n["plz"] ?>" required>
            </div>
            <div class="form-cell">
                <input type="text" name="phone" placeholder="<?= $i18n["phone"] ?>">
            </div>
            <div class="form-cell full check">
                <input type="checkbox" id="optin" name="optin" checked>
                <label for="optin"><?= $i18n["optin"] ?></a></label>
            </div>
            <input type="hidden" name="lang" value="<?= $lang ?>">
            <input type="hidden" name="uuid" value="<?= uniqid("challenger_") ?>">
            <div class="form-cell end">
                <button type="submit" id="submit-form" class="button"><?= $i18n["register"] ?></button>
            </div>
        </form>
    </div>
</div>



<?php
wp_enqueue_style( 'challenge-week', get_stylesheet_directory_uri() . "/style/elements/challenge-week.css" );
wp_enqueue_script( 'challenge-week-js', get_template_directory_uri() . '/js/challenge-week.js', array ( 'jquery' ), 1.1, true);
wp_enqueue_style( 'challenges', get_stylesheet_directory_uri() . "/style/elements/challenges.css" );
wp_enqueue_script( 'challenges', get_template_directory_uri() . '/js/challenges.js', array ( 'jquery' ), 1.1, true);
?>

<script src="<?=get_template_directory_uri()?>/vendor/jquery.countTo.js"></script>
<script>
    setTimeout(() => {
        jQuery('#arrow-percentage').countTo({from: 0, to: <?= $percentage ?>});
        jQuery('#arrow-container').css('margin-left', '<?= $percentage ?>%')
        jQuery('#progress-inner').css('width', '<?= $percentage ?>%')
    }, 250);
</script>