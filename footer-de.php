<?php
$lang_settings = get_option( 'co2_lang_options' );
$lang = $lang_settings["general"];
?>
<footer class="lgcont">
    <div id="footer-inner">
        <img src="<?= get_template_directory_uri()?>/img/h-bg.png" alt="Ja zum CO2 Gesetz">
        <div id="footer-right">
            <div id="f-cta" class="reveal">
                <p>Die Öl- und Auto-Lobby mit Unterstützung der SVP Schweiz haben das Referendum gegen das neue CO2-Gesetz ergriffen. Kurzfristiges Profitdenken wird über das Wohl von Mensch und Umwelt gestellt. Wir setzen uns mit aller Kraft für das Gesetz ein.</p>
                <a href="/unterstutzen/#testimonial" class="button line">Unterstützer:in werden</a>
            </div>
            <div id="f-lower">
                <div id="f-l-left">
                    <h5>Kontakt</h5>
                    <p><a class="neg" href="mailto:kommunikation@spschweiz.ch">kommunikation@spschweiz.ch</a>
                </div>
                <div id="f-l-right">
                    <p><a class="neg" href="https://www.sp-ps.ch/de/partei/wir-sind-die-sp/datenschutz-policy" target="_blank">Datenschutz</a></p>
                    <p><a class="neg" href="https://klimagerechtigkeit-ja.ch/">DE</a> | <a class="neg" href="https://justice-climatique-oui.ch">FR</a> | <a class="neg" href="https://giustizia-climatica-si.ch">IT</a></p>
                </div>
                <div id="f-l-some">
                    <a class="neg sm-icon" href="https://www.facebook.com/spschweiz/" target="_blank"><i class="ri-facebook-circle-fill"></i></a>
                    <a class="neg sm-icon" href="https://www.instagram.com/spschweiz/" target="_blank"><i class="ri-instagram-fill"></i></a>
                    <a class="neg sm-icon" href="https://twitter.com/spschweiz" target="_blank"><i class="ri-twitter-fill"></i></a>
                </div>
            </div>
        </div>
    </div>
</footer>
<div id="bottom-bar" class="lgcont">
    <span class="text-small" id="copyright">© <?= date("Y") ?>, SP Schweiz</span>
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
        policyLink: "https://www.sp-ps.ch/de/partei/wir-sind-die-sp/datenschutz-policy",
        bannerDescription: "Wir benutzen Cookies, um die Besuche auf dieser Webseite zu analysieren.",
        bannerLinkText: "Mehr erfahren",
        bannerBackground: "#f5f5f5",
        bannerColor: "#232323",
        bannerHeading: "<h5>Datenschutz</h5>",
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