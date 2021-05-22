<section class="mb-5">
    <h3 class="h3 mb-4">Aktivist*innen</h3>
    <table id="activists" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Zeit</th>
                <th>Vorname</th>
                <th>Nachname</th>
                <th>E-Mail</th>
                <th>Telefon</th>
                <th>Ort</th>
                <th>Aktivitäten</th>
                <th>Sprache</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $query = "SELECT * FROM pn24_activists";

            $result = $conn->query($query);
            while ($row = $result->fetch_assoc()) { 
                $source_array = explode("/", $row["activist_source"]);
                if ($source_array[2] == "klimagerechtigkeit-ja.ch") {
                    $source_lang = "DE";
                } else if ($source_array[2] == "justice-climatique-oui.ch") {
                    $source_lang = "FR";
                } else if ($source_array[2] == "giustizia-climatica-si.ch")  {
                    $source_lang = "IT";
                } else {
                    $source_lang = "ERROR IN REQUEST";
                }
            ?>
            <tr id="<?= $row["activist_UUID"] ?>">
                <td><?= $row["activist_timestamp"]?></td>
                <td><?= $row["activist_fname"]?></td>
                <td><?= $row["activist_lname"]?></td>
                <td><a href="mailto:<?= $row["activist_email"]?>"><?= $row["activist_email"]?></a></td>
                <td><?= $row["activist_phone"]?></td>
                <td><?= $row["activist_plz"]?> <?= $row["activist_ort"]?></td>
                <td><?= $row["activist_type"]?></td>
                <td><?= $source_lang?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</section>

<script>
$(document).ready( function () {
    $('#activists').DataTable( {
        "pagingType": "full_numbers",
        buttons: [
            'csv',
            'excel'
        ],
        dom: 
            "<'row'<'col-sm-12 col-md-6 mb-4'Q><'col-sm-12 col-md-6'>>" +
            "<'row'<'col-sm-12 col-md-6 mb-4'B><'col-sm-12 col-md-6'>>" +
            "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>"
    });
} );
</script>