<?php
include("../includes/conn.inc.php");

if (isset($_POST["uuid"]) && isset($_POST["source"])) {

} else {
    die("Error in request");
}

if ($_POST["source"] != "https://klimagerechtigkeit-ja.ch/administration") {
    die("Error in request");
}

$uuid = $_POST["uuid"];

$query = "UPDATE `pn24_testimonials` SET `supporter_status` = 1 WHERE `supporter_UUID` = ?;";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $uuid);

if (!$stmt->execute()) {
    echo ("Error: " . $stmt->error);
} else {
    echo "200";
}