<?php
$lang_settings = get_option( 'co2_lang_options' );
$lang = $lang_settings["general"];
?>
<link href="https://unpkg.com/cropperjs/dist/cropper.css" rel="stylesheet"/>
<script src="https://unpkg.com/cropperjs"></script>

<div class="partial">
    <h5>Engagieren Sie sich jetzt für die CO2-Kampagne:</h5>
    <div class="tabset">
        <span class="tab active" data-tab="activist">Freiwillige:r</span>
        <span class="tab" data-tab="testimonial">Testimonial</span>
        <span class="tab" data-tab="donate">Spenden</span>
    </div>
    <div class="tab-panel">

        <div class="panel active" id="activist">
            <form action="<?= get_template_directory_uri()?>/partials/<?=$lang?>/activist-submit.php" method="POST">
                <h5>Ich unterstütze die Kampagne als...</h5>
                <div class="chk-group-block">
                    <input type="checkbox" id="some" name="acti-type[]" value="some">
                    <label for="some">...Freiwillige:r auf Social Media</label>
                </div>
                <div class="chk-group-block">
                    <input type="checkbox" id="briefe" name="acti-type[]" value="briefe">
                    <label for="briefe">...Freiwillige:r für Leser:innenbriefe</label>
                </div>
                <div class="chk-group-block">
                    <input type="checkbox" id="aktionen" name="acti-type[]" value="aktionen">
                    <label for="aktionen">...Freiwillige:r für Aktionen</label>
                </div>
                <div class="text-group-grid">
                    <input type="text" name="fname" placeholder="Vorname" required>
                    <input type="text" name="lname" placeholder="Nachname" required>
                    <input type="email" name="email" placeholder="E-Mail Adresse" required>
                    <input type="number" name="plz" placeholder="PLZ" required>
                    <input type="text" name="ort" placeholder="Ort" required>
                    <input type="text" name="phone" placeholder="Telefonnummer" required>
                    <div class="chk-group">
                        <input type="checkbox" id="privacy" name="privacy" value="1">
                        <label for="privacy"><small>...Ich bin einverstanden, dass die SP mich  auf dem Laufenden hält. Mehr dazu <a href="https://www.sp-ps.ch/de/partei/wir-sind-die-sp/datenschutz-policy" target="_blank">hier.</a></small></label>
                    </div>
                    <input type="hidden" name="source" value="<?= (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";?>" required>
                    <input type="hidden" name="uuid" value="<?= uniqid("activist_"); ?>" required>
                    <button class="button" style="font-size: 1rem;">Ich bin dabei</button>
                </div>
            </form>    
        </div>
        <div class="panel" id="testimonial">
            <form action="<?= get_template_directory_uri()?>/partials/<?=$lang?>/testimonial-submit.php" method="POST">
                <p>Gemeinsam legen wir so den Grundstein für eine ökologische und gerechtere Zukunft.</p>
                <div class="text-group-grid">
                    <input type="text" name="fname" placeholder="Vorname" required>
                    <input type="text" name="lname" placeholder="Nachname" required>
                    <input type="email" name="email" class="fullw" placeholder="E-Mail Adresse" required>
                    <textarea id="quote" name="quote" rows="3" placeholder="Wieso sagen Sie JA zum CO2-Gesetz?" required></textarea>
                    <div class="fullw">
                        <input type="text" style="width: 100%" name="position" placeholder="Beruf, Amt etc." required>
                        <small class="fullw">Geben Sie hier ein Amt, eine Position oder einen Beruf an, welchen Sie teilen möchten (z.B. Nationalrätin, Pfarrer, Lehrperson etc.)</small>
                    </div>
                    <div class="file-group">
                        <input type="file" id="img" name="img" required><br>
                        <label for="img"><small>Laden Sie hier bitte ein Bild hoch</small></label>
                    </div>
                    <div class="chk-group">
                        <input type="checkbox" id="privacy1" name="privacy" value="1">
                        <label for="privacy1"><small>...Ich bin einverstanden, dass die SP mich  auf dem Laufenden hält. Mehr dazu <a href="https://www.sp-ps.ch/de/partei/wir-sind-die-sp/datenschutz-policy" target="_blank">hier.</a></small></label>
                    </div>
                    <input type="hidden" name="source" value="<?= (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";?>" required>
                    <input type="hidden" name="uuid" value="<?= uniqid("testimonial_"); ?>" required>
                    <input type="hidden" name="imgsrc" id="imgname" required>
                    <button class="button" style="font-size: 1rem;">Testimonial abgeben</button>
                </div>
            </form>
        </div>

    </div>
</div>

<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Bitte schneide dein Bild zu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="img-container">
                    <div class="row">
                        <div class="col-md-8">
                            <img src="" id="sample_image" />
                        </div>
                        <div class="col-md-4">
                            <div class="preview"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="crop" class="btn btn-primary">Zuschneiden</button>
            </div>
        </div>
    </div>
</div>

<script>

jQuery(".tab").on("click", function() {
    if (jQuery(this).attr("data-tab") == "donate") {
        window.location.href="/spenden";
    } else {
        jQuery(".active").removeClass("active");
        var newTab = jQuery(this).attr("data-tab");
        window.history.replaceState({}, document.title, '<?=$_SERVER["REQUEST_URI"]?>#' + newTab);
        jQuery("[data-tab="+newTab+"]").addClass("active");
        jQuery(".panel#"+newTab).addClass("active");
    }
})


var request = window.location.href.split("#");
if (request[1]) {
    jQuery(".active").removeClass("active");
    var newTab = request[1];
    console.log(newTab);
    jQuery("[data-tab="+newTab+"]").addClass("active");
    jQuery(".panel#"+newTab).addClass("active");
}
</script>

<script>
jQuery(document).ready(function(){

var modal = jQuery('#modal');

var image = document.getElementById('sample_image');

var cropper;

jQuery('#img').change(function(event){
    var files = event.target.files;

    var done = function(url){
        image.src = url;
        modal.modal('show');
    };

    if(files && files.length > 0)
    {
        reader = new FileReader();
        reader.onload = function(event)
        {
            done(reader.result);
        };
        reader.readAsDataURL(files[0]);
    }
});

modal.on('shown.bs.modal', function() {
    cropper = new Cropper(image, {
        aspectRatio: 1,
        viewMode: 3,
        preview:'.preview'
    });
}).on('hidden.bs.modal', function(){
    cropper.destroy();
       cropper = null;
});

jQuery('#crop').click(function(){
    canvas = cropper.getCroppedCanvas({
        width:250,
        height:250
    });

    canvas.toBlob(function(blob){
        url = URL.createObjectURL(blob);
        var reader = new FileReader();
        reader.readAsDataURL(blob);
        reader.onloadend = function(){
            var base64data = reader.result;
            jQuery.ajax({
                url:'/wp-content/themes/co2/partials/nolang/send-img.php',
                method:'POST',
                data:{image:base64data},
                success:function(data)
                {
                    modal.modal('hide');
                    var imgname = data.split("/")[3];
                    jQuery('#imgname').val(imgname);
                }
            });
        };
    });
});

});

</script>