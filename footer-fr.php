<footer class="lgcont">
    <div id="footer-inner">
        <img src="<?= get_template_directory_uri()?>/img/h-bg.png" alt="Ja zum CO2 Gesetz">
        <div id="footer-right">
            <div id="f-cta" class="reveal">
                <p>Les lobbies du pétrole et de l'automobile, avec le soutien de l'UDC, ont lancé le référendum contre la nouvelle loi sur le CO2. Le profit à court terme est ici placé au-dessus du bien-être des personnes et de l'environnement. Nous nous battrons de toutes nos forces pour que la loi soit mise en place.</p>
                <a href="/soutenir/#testimonial" class="button line">Soutenir maintenant !</a>
            </div>
            <div id="f-lower">
                <div id="f-l-left">
                    <h5>Contact</h5>
                    <p><a class="neg" href="mailto:communication@pssuisse.ch">communication@pssuisse.ch</a>
                </div>
                <div id="f-l-right">
                    <p><a class="neg" href="https://www.sp-ps.ch/fr/politique-de-protection-des-donnees" target="_blank">Protection des données</a></p>
                    <p><a class="neg" href="https://klimagerechtigkeit-ja.ch/">DE</a> | <a class="neg" href="https://justice-climatique-oui.ch">FR</a> | <a class="neg" href="https://giustizia-climatica-si.ch">IT</a></p>
                </div>
                <div id="f-l-some">
                    <a class="neg sm-icon" href="https://www.facebook.com/pssuisse/" target="_blank"><i class="ri-facebook-circle-fill"></i></a>
                    <a class="neg sm-icon" href="https://www.instagram.com/pssuisse/" target="_blank"><i class="ri-instagram-fill"></i></a>
                    <a class="neg sm-icon" href="https://twitter.com/pssuisse" target="_blank"><i class="ri-twitter-fill"></i></a>
                </div>
            </div>
        </div>
    </div>
</footer>
<div id="bottom-bar" class="lgcont">
    <span class="text-small" id="copyright">© <?= date("Y") ?>, PS Suisse</span>
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
        policyLink: "https://www.sp-ps.ch/fr/politique-de-protection-des-donnees",
        bannerDescription: "Nous utilisons des cookies pour analyser les visites sur ce site web.",
        bannerLinkText: "En savoir plus",
        bannerBackground: "#f5f5f5",
        bannerColor: "#232323",
        bannerHeading: "<h5>Protection des données</h5>",
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