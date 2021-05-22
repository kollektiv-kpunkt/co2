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
                <option selected disabled><em>Titolo...</em></option>
                <option value="frau">Signora</option>
                <option value="herr">Signor</option>
                <option value="neutral">Forma neutra</option>
            </select>
            <input type="text" name="fname" placeholder="Nome" required>
            <input type="text" name="lname" placeholder="Cognome" required>
            <input type="text" name="street" placeholder="Via/Numero" class="fullw" required>
            <input type="number" name="plz" placeholder="NPA" required>
            <input type="text" name="ort" placeholder="Località" required>
            <input type="email" name="email" placeholder="E-mail" required>
            <input type="text" name="phone" placeholder="Telefono (opzionale)">
            <textarea name="comments" id="comments" rows="3" placeholder="Commento (opzionale)"class="fullw"></textarea>
            <small class="fullw"><em>L’invio sarà gestito attraverso la nostra banca dati. Inviando l‘ordine, acconsente al trattamento dei suoi dati personali per l’elaborazione dell’ordine e ad essere informato/a su questa e altre campagne del PS. Il consenso può essere revocato in qualsiasi momento. Maggiori informazioni <a href="http://ps-ticino.ch/informativa-sulla-protezione-dei-dati/" target="_blank">qui.</a></em></small>
            <input type="hidden" name="source" value="<?= (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";?>" required>
            <input type="hidden" name="uuid" value="<?= $uuid ?>" required>
            <button class="button" style="font-size: 1rem;">Ordinare</button>
        </div>
    </form>
</div>