<?php
include("../../includes/conn.inc.php");

$uuid = $_POST["uuid"];
$anrede = $_POST["anrede"];
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$street = $_POST["street"];
$plz = $_POST["plz"];
$ort = $_POST["ort"];
$email = $_POST["email"];
if (isset($_POST["phone"])) {
    $phone = $_POST["phone"];
} else {
    $phone = 0;
}
if (isset($_POST["comments"])) {
    $comments = $_POST["comments"];
} else {
    $comments = 0;
}
$source = $_POST["source"];

$query = "INSERT into `pn24_seeds` (seed_UUID, seed_anrede, seed_fname, seed_lname, seed_street, seed_plz, seed_ort, seed_email, seed_phone, seed_comments, seed_source) VALUES (?,?,?,?,?,?,?,?,?,?,?) ON DUPLICATE KEY UPDATE seed_UUID = seed_UUID;";
$stmt = $conn->prepare($query);
$stmt->bind_param("sssssssssss", $uuid,$anrede, $fname, $lname, $street, $plz, $ort, $email, $phone, $comments, $source);

if (!$stmt->execute()) {
    header("location: " . $_SERVER['HTTP_REFERER']);
} else {
    header("location: /wp-content/themes/co2/partials/it/emails.php?fname={$fname}&lname={$lname}&to={$email}&email=seeds&origin={$source}");
}