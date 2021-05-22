<?php
include("../../includes/conn.inc.php");

$uuid = $_POST["uuid"];
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$email = $_POST["email"];
$plz = $_POST["plz"];
$ort = $_POST["ort"];
$phone = $_POST["phone"];
$type_array = serialize($_POST["acti-type"]);
$type = "";
if (in_array("some", $_POST["acti-type"])) {
    $type = $type . "Social Media, ";
}
if (in_array("briefe", $_POST["acti-type"])) {
    $type = $type . "Leser:innenbriefe, ";
}
if (in_array("aktionen", $_POST["acti-type"])) {
    $type = $type . "Aktionen";
}
if (isset($_POST["privacy"])) {
    $optin = 1;
} else {
    $optin = 0;
}
$source = $_POST["source"];

$query = "INSERT into `pn24_activists` (activist_UUID, activist_fname, activist_lname, activist_email, activist_plz, activist_ort, activist_phone, activist_type, activist_type_array, activist_optin, activist_source) VALUES (?,?,?,?,?,?,?,?,?,?,?) ON DUPLICATE KEY UPDATE activist_UUID = activist_UUID;";
$stmt = $conn->prepare($query);
$stmt->bind_param("sssssssssss", $uuid, $fname, $lname, $email, $plz, $ort, $phone, $type, $type_array, $optin, $source);

if (!$stmt->execute()) {
    header("location: " . $_SERVER['HTTP_REFERER']);
} else {
    if (in_array("some", $_POST["acti-type"])) {
        header("location: /wp-content/themes/co2/partials/it/emails.php?fname={$fname}&lname={$lname}&to={$email}&email=acti-some&origin={$source}");
    } else {
        header("location: /wp-content/themes/co2/partials/it/emails.php?fname={$fname}&lname={$lname}&to={$email}&email=acti&origin={$source}");
    }
}