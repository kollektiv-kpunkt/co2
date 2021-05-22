<?php
/**
* Template Name: Admin Page
*
* @package WordPress
* @subpackage Twenty_Fourteen
* @since Twenty Fourteen 1.0
*/

include(get_template_directory() . "/includes/conn.inc.php");

?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <?php wp_head() ?>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jq-3.3.1/jszip-2.5.0/dt-1.10.24/b-1.7.0/b-colvis-1.7.0/b-html5-1.7.0/sb-1.0.1/datatables.min.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jq-3.3.1/jszip-2.5.0/dt-1.10.24/b-1.7.0/b-colvis-1.7.0/b-html5-1.7.0/sb-1.0.1/datatables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
</head>
<body>
<style>
body {
    background-color: white;
}
</style>
<div class="container mt-5 mb-5">
    <h2>Administrationspanel</h2>
    <p class="mt-3 lead">Hier kannst du die verschiedenen Mitmach-Optionen administrieren, Daten exportieren, Testimonials freigeben etc. Bei Fragen, wende dich an <a href="mailto:timothy@kpunkt.ch">Timothy vom Kreativ Kollektiv K.</a></p>
    <div class="btn-group mt-3" role="group">
        <a type="button" href="/administration" class="btn btn-primary" style="text-decoration:none">Samen</a>
        <a type="button" href="/administration/?type=testimonials" class="btn btn-primary" style="text-decoration:none">Testimonials</a>
        <a type="button" href="/administration/?type=activists" class="btn btn-primary" style="text-decoration:none">Aktivist*innen</a>
    </div>
    <hr class="mt-5 mb-3">
    <?php
    if (!isset($_GET["type"])) {
        include(get_template_directory() . "/templates/partials/samen.php");
    } else if ($_GET["type"] == "testimonials") {
        include(get_template_directory() . "/templates/partials/testimonials.php");
    } else if ($_GET["type"] == "activists") {
        include(get_template_directory() . "/templates/partials/activists.php");
    }
    ?>
</div>

<?php
wp_footer()
?>



</body>
</html>