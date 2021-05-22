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

$query = "UPDATE `pn24_seeds` SET `seed_status` = 1 WHERE `seed_UUID` = ?;";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $uuid);

if (!$stmt->execute()) {
    echo ("Error: " . $stmt->error);
} else {
    echo "200";
}