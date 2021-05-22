<?php
// $servername = "localhost";
// $username = "root_wp_pn24";
// $password = "t&o5Bs08";
// $dbname = "wp_pn24";

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wp_pn24";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$conn -> set_charset("utf8mb4");

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>