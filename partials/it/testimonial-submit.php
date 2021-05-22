<?php
include("../../includes/conn.inc.php");

$uuid = $_POST['uuid'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$origin = $_POST['source'];
if (isset($_POST['position'])) {
    $position = $_POST['position'];
} else {
    $position = 0;
};
if (strlen($_POST['quote']) > 500) {
    $msg = urlencode("Dein Zitat ist zu lang");
    header("location: {$origin}/?status=error&msg=" . $msg);
    exit();
} else {
    $quote = $_POST['quote'];
    $urlquote = urlencode($quote);
}
if (!isset($_POST['imgsrc'])) {
    $msg = urlencode("Image POST VARIABLE error");
    header("location: {$origin}/?status=error&msg=" . $msg);
    exit();
} else if ($_POST['imgsrc'] == ""){
    $msg = urlencode("Image POST VARIABLE error");
    header("location: {$origin}/?status=error&msg=" . $msg);
    exit();
} else if (str_starts_with($_POST['imgsrc'], "img_")) {
    $img = $_POST['imgsrc'];
} else {
    $msg = urlencode("Catch All Error");
    header("location: {$origin}/?status=error&msg=" . $msg);
    exit();
}
if (isset($_POST["privacy"])) {
    $optin = 1;
} else {
    $optin = 0;
}

$query = "INSERT into `pn24_testimonials` (supporter_UUID, supporter_fname, supporter_lname, supporter_position, supporter_quote, supporter_img, supporter_email, supporter_origin, supporter_optin) VALUES (?,?,?,?,?,?,?,?,?);";

$stmt = $conn->prepare($query);
$stmt->bind_param("sssssssss", $uuid,$fname,$lname,$position,$quote,$img,$email,$origin,$optin);

if($stmt->execute()) {
    header("location: /wp-content/themes/co2/partials/it/emails.php?fname={$fname}&lname={$lname}&to={$email}&email=testimonial&origin={$origin}&uuid={$uuid}&quote={$urlquote}");
} else {
    $msg = urlencode($stmt->error);
    header("location: {$origin}/?status=error&msg=" . $msg);
}

$stmt->close();


?>