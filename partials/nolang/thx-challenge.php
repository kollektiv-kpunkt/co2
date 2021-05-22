<?php
require(__DIR__ . "/../i18n/{$_GET["lang"]}.php");
?>

<h2 style="margin-bottom: 1rem; margin-top: 0;"><?= $i18n["thx-title"] ?></h2>
<p><?= $i18n["thx-text"] ?></p>
<div class="cta-buttons" style="margin-top: 1.5rem">
    <a class="button cta-button" href="https://api.whatsapp.com/send?text=<?= urlencode($i18n["thx-wa-text"])?>" target="_blank"><?= $i18n["thx-wa"] ?></a>
    <a class="button neg cta-button" href="https://t.me/share/url?url=<?= urlencode($i18n["thx-tele-link"])?>&text=<?= urlencode($i18n["thx-wa-text"])?>" target="_blank"><?= $i18n["thx-tele"] ?></a></p>
</div>