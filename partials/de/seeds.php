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
                <option selected disabled><em>Anrede wählen...</em></option>
                <option value="frau">Frau</option>
                <option value="herr">Herr</option>
                <option value="neutral">Neutrale Anrede</option>
            </select>
            <input type="text" name="fname" placeholder="Vorname" required>
            <input type="text" name="lname" placeholder="Nachname" required>
            <input type="text" name="street" placeholder="Strasse / Nr." class="fullw" required>
            <input type="number" name="plz" placeholder="PLZ" required>
            <input type="text" name="ort" placeholder="Ort" required>
            <input type="email" name="email" placeholder="E-Mail-Adresse" required>
            <input type="text" name="phone" placeholder="Telefonnummer (optional)">
            <textarea name="comments" id="comments" rows="3" placeholder="Kommentare (optional)"class="fullw"></textarea>
            <small class="fullw"><em>Der Versand der Samen wird über unsere Datenbank abgewickelt. Mit dem Absenden erklären Sie sich bereit, dass wir Ihre Personendaten für die Verarbeitung der Bestellung bearbeiten und Sie über diese und andere Kampagnen der SP auf dem Laufenden halten dürfen. Diese Zustimmung können Sie jederzeit widerrufen. Mehr dazu <a href="https://www.sp-ps.ch/de/partei/wir-sind-die-sp/datenschutz-policy" target="_blank">hier.</a></em></small>
            <input type="hidden" name="source" value="<?= (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";?>" required>
            <input type="hidden" name="uuid" value="<?= $uuid ?>" required>
            <button class="button" style="font-size: 1rem;">Absenden</button>
        </div>
    </form>
</div>