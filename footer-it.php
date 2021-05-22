<footer class="lgcont">
    <div id="footer-inner">
        <img src="<?= get_template_directory_uri()?>/img/h-bg.png" alt="Ja zum CO2 Gesetz">
        <div id="footer-right">
            <div id="f-cta" class="reveal">
                <p>La lobby del petrolio e delle automobili con l'appoggio dell'UDC hanno lanciato il referendum contro la nuova legge sul CO2 poiché antepongono il loro profitto immediato al bene dei molti e dell’ambiente. Ci impegneremo con tutte le nostre forze a sostegno di questa legge.</p>
                <a href="/sostenere/#testimonial" class="button line">Ci sostenga ora!</a>
            </div>
            <div id="f-lower">
                <div id="f-l-left">
                    <h5>Contatto</h5>
                    <p><a class="neg" href="mailto:communication@pssuisse.ch">communication@pssuisse.ch</a>
                </div>
                <div id="f-l-right">
                    <p><a class="neg" href="http://ps-ticino.ch/informativa-sulla-protezione-dei-dati/" target="_blank">Protezione dei dati</a></p>
                    <p><a class="neg" href="https://klimagerechtigkeit-ja.ch/">DE</a> | <a class="neg" href="https://justice-climatique-oui.ch">FR</a> | <a class="neg" href="https://giustizia-climatica-si.ch">IT</a></p>
                </div>
                <!-- <div id="f-l-some">
                    <a class="neg sm-icon" href="https://www.facebook.com/spschweiz/" target="_blank"><i class="ri-facebook-circle-fill"></i></a>
                    <a class="neg sm-icon" href="https://www.instagram.com/spschweiz/" target="_blank"><i class="ri-instagram-fill"></i></a>
                    <a class="neg sm-icon" href="https://twitter.com/spschweiz" target="_blank"><i class="ri-twitter-fill"></i></a>
                </div> -->
            </div>
        </div>
    </div>
</footer>
<div id="bottom-bar" class="lgcont">
    <span class="text-small" id="copyright">© <?= date("Y") ?>, PS Svizzero</span>
    <span class="text-small">Built with 💜 in Zurich | <a class="neg" href="https://kpunkt.ch/" target="_blank">Webdesign by <b>K.</b></a></span>
</div>

</div>

<?php
get_footer("menu_overlay");
wp_footer();
?>

<script src="https://cdn.jsdelivr.net/gh/manucaralmo/GlowCookies@3.0.1/src/glowCookies.min.js"></script>
<script>
    glowCookies.start('en', {
        hideAfterClick: true,
        border: 'none',
        customScript: [{ type: 'src', position: 'head', content: '<?= get_template_directory_uri() ?>/partials/nolang/matomo.js' }],
        policyLink: "http://ps-ticino.ch/informativa-sulla-protezione-dei-dati/",
        bannerDescription: "Utilizziamo i cookie per analizzare le visite a questo sito web.",
        bannerLinkText: "Per saperne di più",
        bannerBackground: "#f5f5f5",
        bannerColor: "#232323",
        bannerHeading: "<h5>Protezione dei dati</h5>",
        acceptBtnText: "Okay!",
        acceptBtnColor: "#f5f5f5",
        acceptBtnBackground: "#E72B34",
        rejectBtnText: "Nope!",
        rejectBtnColor: "#f5f5f5",
        rejectBtnBackground: "#b5b5b5",
        manageText: "Cookies",
        manageColor: "#f5f5f5",
        manageBackground: "#b5b5b5"
    });
</script>

</body>
</html>