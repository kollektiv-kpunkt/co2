<?php
include("../../includes/conn.inc.php");

$uuid = $_POST["uuid"];
$query = "SELECT * FROM pn24_testimonials WHERE `supporter_UUID` = ?;";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $uuid);
$stmt->execute();
$result = $stmt->get_result();

while ($row = $result->fetch_assoc()) {
    $uuid = $row['supporter_UUID'];
    $fname = $row['supporter_fname'];
    $lname = $row['supporter_lname'];
    $position = $row['supporter_position'];
    $quote = $row['supporter_quote'];

    $return_arr[] = array(
        "uuid" => $uuid,
        "fname" => $fname,
        "lname" => $lname,
        "position" => $position,
        "quote" => $quote);
}

// Encoding array in JSON format
echo json_encode($return_arr);