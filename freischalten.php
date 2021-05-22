<?php
include("./includes/conn.inc.php");

if (!isset($_GET["uuid"])) {
    die("Nope");
}

$uuid = $_GET["uuid"];

$query = "UPDATE `pn24_testimonials` SET `supporter_status`=1 WHERE `supporter_UUID` = ?;";

$stmt = $conn->prepare($query);
$stmt->bind_param("s", $uuid);
if (!$stmt->execute()) {
    die("Nope");
} else {
    echo ("Successfully changed status of Testimonial to <em>active</em>!");
}