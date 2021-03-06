<div id="challenge" data-lang="<?= $lang ?>">
    <div id="challenge-cont">
        <div class="challenge-inner">
            <h1 id="challenge-no">Challenge #6</h1>
            <h3 id="challenge-sub" class="nohyphen"><?= $i18n["5-title"] ?></h3>
            <p><?= $i18n["5-text"] ?></p>
            <p class="cta"><b><?= $i18n["cta"] ?></b></p>
            <div class="cta-buttons">
                <a href="#" class="button cta-button nohyphen" id="fbshare" data-cta-type="facebook" data-src="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode($i18n["5-fb-link"]) ?>"><?= $i18n["5-fb-text"] ?></a>
                <a href="#" class="button neg cta-button nohyphen" data-cta-type="instagram" data-src="<?= $i18n["5-insta-link"] ?>"><?= $i18n["5-insta-text"] ?></a>
            </div>
        </div>
    </div>
</div>