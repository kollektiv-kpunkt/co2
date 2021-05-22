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
    $challengemsg = "Nous avons seulement rassemblé {$challengercount} participant-e-s : inscrivez-vous aussi et aidez-nous à faire voter un grand OUI à la Loi sur le CO2 !";
} else if ($percentage < 75) {
    $challengemsg = "Déjà {$challengercount} personnes soutiennent notre « Challenge CO2 » : inscrivez-vous aussi, pour qu’ensemble nous puissions gagner la campagne pour la Loi sur le CO2 !";
} else if ($percentage <= 75) {
    $challengemsg = "Nous y sommes presque ! Nous avons encore besoin de {$difference} participant-e-s pour atteindre notre objectif : ensemble, nous pouvons faire un premier pas important pour la protection du climat !";
} else if ($percentage = 100) {
    $challengemsg = "C’est fait ! Nous avons atteint notre objectif ! Cependant, il nous faut continuer à mobiliser : plus nous réussirons à mobiliser de personnes cette semaine, mieux ce sera. Alors inscrivez-vous pour convaincre le plus grand nombre de personnes possible de voter OUI à la Loi sur le CO2.";
}



?>

<div class="partial" id="challenge-week">
    <h4 style="margin-bottom: 0">Acceptez-vous de relever le défi ?</h4>
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
        <small id="e403" style="color: green; padding-bottom: 0.5rem; display: none; text-align: center">Vous vous êtes déjà annoncé-e pour le « Challenge CO2 » !</small>
        <small id="e500" style="color: red; padding-bottom: 0.5rem; display: none; text-align: center">Oups, il y a eu un problème. Veuillez s’il vous plaît vous inscrire à nouveau !</small>
        <form action="/" id="challenge-form">
            <div class="form-cell">
                <input type="text" name="fname" placeholder="Prénom" required>
            </div>
            <div class="form-cell">
                <input type="text" name="lname" placeholder="Nom" required>
            </div>
            <div class="form-cell">
                <input type="email" name="email" placeholder="Courriel" required>
            </div>
            <div class="form-cell">
                <input type="number" name="plz" placeholder="Code postale" required>
            </div>
            <div class="form-cell">
                <input type="text" name="phone" placeholder="Numéro de portable (facultatif)">
            </div>
            <div class="form-cell full check">
                <input type="checkbox" id="optin" name="optin" checked>
                <label for="optin">Je suis d’accord pour que le PS me tienne informé-e. Plus d’informations à ce sujet <a href="https://www.sp-ps.ch/fr/politique-de-protection-des-donnees" target="_blank">ici.</a></label>
            </div>
            <input type="hidden" name="lang" value="<?= $lang ?>">
            <input type="hidden" name="uuid" value="<?= uniqid("challenger_") ?>">
            <div class="form-cell end">
                <button type="submit" id="submit-form" class="button">Participer</button>
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