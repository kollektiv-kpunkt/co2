<div id="challenge" data-lang="<?= $lang ?>">
    <div id="challenge-cont">
        <div class="challenge-inner">
            <h1 id="challenge-no">Challenge #1</h1>
            <h3 id="challenge-sub" class="nohyphen"><?= $i18n["1-title"] ?></h3>
            <p><?= $i18n["1-text"] ?></p>
            <p class="cta"><b><?= $i18n["cta"] ?></b></p>
            <div class="cta-buttons">
                <a href="#" class="button cta-button nohyphen" id="fbshare" data-cta-type="facebook" data-src="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode($i18n["1-fb-link"]) ?>"><?= $i18n["1-fb-text"] ?></a>
                <a href="#" class="button neg cta-button nohyphen" data-cta-type="instagram" data-src="<?= $i18n["1-insta-link"] ?>"><?= $i18n["1-insta-text"] ?></a>
            </div>
        </div>
    </div>
</div>