<?php
$lang_settings = get_option( 'co2_lang_options' );
$lang = $lang_settings["general"];
?>

<nav class="lgcont header-nav">
    <a href="/"><img src="<?= get_template_directory_uri() ?>/img/<?= $lang ?>/logo.svg" alt="Logo Ja zum CO2 Gesetz"></a>
    <img src="<?= get_template_directory_uri() ?>/img/menu.svg" alt="Menu" id="opensesame">
</nav>