<style>
.container {
  max-width: 80vw;
}

canvas {
  max-width: 1440px;
  margin: auto;
}
</style>
<section class="mb-5">
    <h3 class="h3 mb-4">Offene Samen-Bestellungen</h3>
    <table id="seeds" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Datum</th>
                <th>Anrede</th>
                <th>Vorname</th>
                <th>Nachname</th>
                <th>Strasse / Nr</th>
                <th>Plz</th>
                <th>Ort</th>
                <th>Telefon</th>
                <th>E-Mail</th>
                <th>Kommentare</th>
                <th>Sprache</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $query = "SELECT * FROM pn24_seeds WHERE `seed_status` = 0";

            $result = $conn->query($query);
            $i=0;
            while ($row = $result->fetch_assoc()) { 
              $source_array = explode("/", $row["seed_source"]);
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
            <tr id="<?= $row["seed_UUID"] ?>" class="bestellreihe">
                <td><?= $row["seed_timestamp"] ?></td>
                <td><?= ucfirst($row["seed_anrede"]) ?></td>
                <td><?= ucfirst($row["seed_fname"]) ?></td>
                <td><?= ucfirst($row["seed_lname"]) ?></td>
                <td><?= $row["seed_street"] ?></td>
                <td><?= $row["seed_plz"] ?></td>
                <td><?= $row["seed_ort"] ?></td>
                <td><?= $row["seed_phone"] ?></td>
                <td><?= $row["seed_email"] ?></td>
                <td><?= $row["seed_comments"] ?></td>
                <td><?= $source_lang ?></td>
            </tr>
        <?php $i++; } ?>
        </tbody>
    </table>
</section>
<h3 class="h3 mb-4">Bestellungen über die Zeit</h3>
<canvas id="myChart"></canvas>


<script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>

<script>
$(document).ready( function () {
    $('#seeds').DataTable( {
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


<script>
<?php
$sourceuri = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/administration";
?>
$(".freischalten").click(function() {
    var bestell_uuid = $(this).attr("data-bestellung");
    var source = "<?= $sourceuri ?>";
    $.ajax({
        url: "<?= get_template_directory_uri() ?>/templates/bestell-ajax.php",
        type: "post",
        data: {
            "uuid" : bestell_uuid,
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
                notyf.success('Die Bestellung wurde abgearbeitet!');
                $("#" + bestell_uuid).remove();
            } else {
                notyf.error(response);
            }
    }});
})
</script>

<script>
<?php
$query = "SELECT * FROM pn24_seeds";
$result = $conn->query($query);
$result2 = $conn->query($query);
?>

var ctx = document.getElementById('myChart').getContext("2d");
var data = {
  datasets: [
    {
        label: "Bestellungen im Zeitverlauf",
        backgroundColor: 'rgba(255, 99, 132, 0.4)',
        borderColor: 'rgb(255, 99, 132)',
        data: [
            <?php
            while ($row = $result->fetch_assoc()) { ?>
            { 
                x: moment("<?= strtotime($row["seed_timestamp"]) ?>", "X"),
                y: <?= $row["seed_ID"] ?>
            },
            <?php } ?>
        ]
    }
  ]
};

var myLineChart = new Chart(ctx, {
  type: "line",
  data: data,
  options: {
    scales: {
      xAxes: [
        {
          scaleLabel: {
            display: true
          },
          type: "time",
          time: {
            displayFormats: {
              second: "mm:ss"
            }
          },
          position: "bottom"
        }
      ]
    }
  }
});



</script>