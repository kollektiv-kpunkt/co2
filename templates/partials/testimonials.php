<section class="mb-5">
    <h3 class="h3 mb-4">Testimonials freischalten</h3>
    <table id="testimonials" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Beruf, Position o.Ä.</th>
                <th>Testimonial</th>
                <th>Email</th>
                <th>Aktionen</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $query = "SELECT * FROM pn24_testimonials WHERE `supporter_status` = 0";

            $result = $conn->query($query);
            $i=1;
            while ($row = $result->fetch_assoc()) { 
            ?>
            <tr id="<?= $row["supporter_UUID"] ?>">
                <td><?= $row["supporter_fname"] ?> <?= $row["supporter_lname"] ?></td>
                <td><?= $row["supporter_position"] ?></td>
                <td><?= $row["supporter_quote"] ?></td>
                <td><a href="mailto:<?= $row["supporter_email"]?>"><?= $row["supporter_email"]?></a></td>
                <td><a href="#" class="freischalten" data-testimonial="<?= $row["supporter_UUID"] ?>">Freischalten</a></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</section>

<script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>

<script>
$(document).ready( function () {
    $('#testimonials').DataTable( {
        "pagingType": "full_numbers",
        buttons: [
            'csv',
            'excel'
        ],
        dom: 
            "<'row'<'col-sm-12 col-md-6 mb-4'B><'col-sm-12 col-md-6'>>" +
            "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>"
    });
} );
</script>


<script>
<?php
$sourceuri = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/administration";
?>
$(".freischalten").click(function() {
    var testimonial_uuid = $(this).attr("data-testimonial");
    var source = "<?= $sourceuri ?>";
    $.ajax({
        url: "<?= get_template_directory_uri() ?>/templates/testimonial-ajax.php",
        type: "post",
        data: {
            "uuid" : testimonial_uuid,
            "source" : source
        },
        success: function(result){
            var notyf = new Notyf({
                duration: 5000,
                position: {
                    x:'left',
                    y:'bottom'
                },
                dismissible: true
            });
            if (result == 200) {
                notyf.success('Das Testimonials wurde freigeschaltet!');
                $("#" + testimonial_uuid).remove();
            } else {
                notyf.error(result);
            }
    }});
})
</script>