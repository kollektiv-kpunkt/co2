<?php
include(__DIR__ . "/../../includes/conn.inc.php");
require_once(__DIR__ . "/../../vendor/autoload.php");

$uuid = $_POST['uuid'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$plz = $_POST['plz'];
if (isset($_POST["phone"])) {
    $phone = $_POST["phone"];
} else {
    $phone = "";
}
if (isset($_POST["optin"])) {
    $optin = 1;
} else {
    $optin = 0;
}
$lang = $_POST["lang"];

$query = "SELECT * from `pn24_challengers` WHERE challenger_email = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();
$numrows = $stmt->num_rows;

if ($numrows != 0) {
    echo("403");
    exit();
}


$query= "INSERT into `pn24_challengers` (challenger_UUID, challenger_fname, challenger_lname, challenger_email, challenger_plz, challenger_phone, challenger_optin, challenger_lang) VALUES (?,?,?,?,?,?,?,?) ON DUPLICATE KEY UPDATE challenger_UUID = challenger_UUID;";

$stmt = $conn->prepare($query);
$stmt->bind_param("ssssssss",$uuid,$fname,$lname,$email,$plz,$phone,$optin,$lang);
$status = $stmt->execute();

$client = new MailchimpMarketing\ApiClient();
$client->setConfig([
    'apiKey' => '7ecf275c6cc660ea3b6b44baffd9f75f-us4',
    'server' => 'us4'
]);

$response = $client->lists->addListMember("4a03652878", [
    "email_address" => $email,
    "status" => "subscribed",
    'merge_fields' => [
        "FNAME" => $fname,
        "LNAME" => $lname,
        "PHONE" => $phone
    ],
    'tags' => ["CO2_" . $lang]
]);

if ($response->email_address == $email) {
    echo $status;
} else {
    echo "500";
}
?>