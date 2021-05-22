<?php
$lang_settings = get_option( 'co2_lang_options' );
$lang = $lang_settings["general"];
$uuid = uniqid("bestellung_")
?>
<div class="partial s-marg">
    <img src="<?= get_template_directory_uri()?>/img/seeds.jpg" alt="Bild der Samen" style="margin-bottom:1.5rem;">
    <form action="<?= get_template_directory_uri()?>/partials/<?=$lang?>/seed-submit.php" method="POST">
        <div class="text-group-grid">
            <select name="anrede" id="anrede" class="fullw" required>
                <option selected disabled><em>Formule d’appel...</em></option>
                <option value="frau">Madame</option>
                <option value="herr">Monsieur</option>
                <option value="neutral">Formule d’appel neutre</option>
            </select>
            <input type="text" name="fname" placeholder="Prénom" required>
            <input type="text" name="lname" placeholder="Nom" required>
            <input type="text" name="street" placeholder="Adresse / numéro" class="fullw" required>
            <input type="number" name="plz" placeholder="NPA" required>
            <input type="text" name="ort" placeholder="Lieu" required>
            <input type="email" name="email" placeholder="Courriel" required>
            <input type="text" name="phone" placeholder="Téléphone (facultatif)">
            <textarea name="comments" id="comments" rows="3" placeholder="Commentaires (facultatif)"class="fullw"></textarea>
            <small class="fullw"><em>L’envoi est géré par notre base de données. En l’envoyant, vous acceptez que nous puissions traiter vos données personnelles pour le traitement de la commande et vous tenir informé de cette campagne et des autres campagnes du PS. Vous pouvez révoquer ce consentement à tout moment. Pour en savoir plus, cliquez <a href="https://www.sp-ps.ch/fr/politique-de-protection-des-donnees" target="_blank">ici.</a></em></small>
            <input type="hidden" name="source" value="<?= (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";?>" required>
            <input type="hidden" name="uuid" value="<?= $uuid ?>" required>
            <button class="button" style="font-size: 1rem;">Envoyer</button>
        </div>
    </form>
</div>