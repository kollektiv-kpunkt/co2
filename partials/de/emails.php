<?php
include("../../includes/de/var.inc.php");
include("../../includes/var.gen.inc.php");

$fname = $_GET["fname"];
$lname = $_GET["lname"];
$origin = $_GET["origin"];
$to = $_GET["to"];

if (isset($_GET["email"]) && $_GET["email"] == "acti-some") {

$subject = "Danke für Ihre Unterstützung!";

$message = "Guten Tag {$fname} {$lname}<br><br>";
$message .= "Herzlichen Dank für Ihre Unterstützung. Wir melden uns bald wieder mit weiteren Informationen zur Kampagne.<br><br>";
$message .= "Treten Sie jetzt unserer Freiwillige-Gruppe bei, um laufend über die Kampagne informiert zu werden:<br>";
$message .= "<a href='{$WAchat}'>Whatsapp Gruppe</a><br>";
if ($teleYES == 1) {
    $message .= "<a href='{$Telechat}'>Telegram Gruppe</a><br><br>";
}
$message .= "Haben Sie noch eine Sekunde Zeit? Laden Sie Freund:innen und Bekannte ein, Teil der Kampagne zu werden:<br>";
$message .= "<a href='https://api.whatsapp.com/send?text={$messagetxt}'>WhatsApp</a><br>";
$message .= "<a href='https://t.me/share/url?url={$mitmachen_link}&text={$messagetxt}'>Telegram</a><br><br>";
$message .= "Die finanzstarke Erdöl- und Autolobby bekämpft zusammen mit der SVP das neue CO2-Gesetz. Wir bereiten uns deshalb auf einen intensiven Abstimmungskampf vor. Nur gemeinsam schaffen wir, das neue CO2-Gesetz über die Ziellinie zu bringen.<br><br>";
$message .= "Nochmals vielen Dank für Ihre Hilfe!<br><br>";
$message .= "Freundliche Grüsse<br>Das Kampagnen-Team der SP Schweiz";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: Kampagnen-Team der SP Schweiz <kommunikation@spschweiz.ch>' . "\r\n";

mail($to,$subject,$message,$headers);

header("location: /danke?type=acti");


} elseif (isset($_GET["email"]) && $_GET["email"] == "acti") {
    
$subject = "Danke für Ihre Unterstützung!";

$message = "Guten Tag {$fname} {$lname}<br><br>";
$message .= "Herzlichen Dank für Ihre Unterstützung. Wir melden uns bald wieder mit weiteren Informationen zur Kampagne.<br><br>";
$message .= "Haben Sie noch eine Sekunde Zeit? Laden Sie Freund:innen und Bekannte ein, Teil der Kampagne zu werden:<br>";
$message .= "<a href='https://api.whatsapp.com/send?text={$messagetxt}'>WhatsApp</a><br>";
$message .= "<a href='https://t.me/share/url?url={$mitmachen_link}&text={$messagetxt}'>Telegram</a><br><br>";
$message .= "Die finanzstarke Erdöl- und Autolobby bekämpft zusammen mit der SVP das neue CO2-Gesetz. Wir bereiten uns deshalb auf einen intensiven Abstimmungskampf vor. Nur gemeinsam schaffen wir, das neue CO2-Gesetz über die Ziellinie zu bringen.<br><br>";
$message .= "Nochmals vielen Dank für Ihre Hilfe!<br><br>";
$message .= "Freundliche Grüsse<br>Das Kampagnen-Team der SP Schweiz";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: Kampagnen-Team der SP Schweiz <kommunikation@spschweiz.ch>' . "\r\n";

mail($to,$subject,$message,$headers);

header("location: /danke?type=acti&some=1");

} elseif (isset($_GET["email"]) && $_GET["email"] == "testimonial") {

$subject = "Danke für Ihr Testimonial!";

$message = "Guten Tag {$fname} {$lname}<br><br>";
$message .= "Herzlichen Dank für Ihr Testimonial, das bald veröffentlicht wird.<br><br>";
$message .= "Die finanzstarke Erdöl- und Autolobby bekämpft zusammen mit der SVP das neue CO2-Gesetz. Wir bereiten uns deshalb auf einen intensiven Abstimmungskampf vor. Gemeinsam mit einer breiten Allianz leisten wir wichtige Aufklärungsarbeit für die komplexe Gesetzesvorlage. Damit wir an der Urne gewinnen, sind wir auf Spenden angewiesen. Gemeinsam legen wir so den Grundstein für eine ökologische Zukunft.<br><br>";
$message .= "<a href='". $curr_link . "/spenden'>Ich unterstütze die Kampagne mit einer Spende</a><br><br>";
$message .= "Nochmals vielen Dank für Ihre Hilfe!<br><br>";
$message .= "Freundliche Grüsse<br>Das Kampagnen-Team der SP Schweiz";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: Kampagnen-Team der SP Schweiz <kommunikation@spschweiz.ch>' . "\r\n";

mail($to,$subject,$message,$headers);

$uuid = $_GET["uuid"];
$quote = urldecode($_GET["quote"]);
$freischalten_link = $curr_link . "/wp-content/themes/co2/freischalten.php?uuid={$uuid}";

$subject = "Neues Testimonial ({$uuid})";

$message = "Ciao!<br><br>";
$message .= "Es gab ein neues Testimonial. Eingetragen hat sich {$fname} {$lname}. Das Testimonial lautet:<br><br>";
$message .= "{$quote}<br><br>";
$message .= "Freischalten kannst du es über diesen Link: <a href='{$freischalten_link}'>{$freischalten_link}</a><br><br>";
$message .= "Wende dich bei Fragen und/oder Problemen bei <a href='mailto:timothy@kpunkt.ch'>Timothy vom Kreativ Kollektiv K.</a><br><br>";
$message .= "Grüessli!";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: Kampagnen-Team der SP Schweiz <kommunikation@spschweiz.ch>' . "\r\n";

mail($testimonial_email,$subject,$message,$headers);

header("location: /danke?type=testimonial");


} elseif (isset($_GET["email"]) && $_GET["email"] == "seeds"){

$subject = "Danke für Ihre Bestellung!";

$message = "Guten Tag {$fname} {$lname}<br><br>";
$message .= "Herzlichen Dank für Ihre Bestellung. Der Versand erfolgt demnächst.<br><br>";
$message .= "Für uns ist klar: Nur gemeinsam können wir eine klimagerechte Zukunft gestalten. Helfen Sie uns noch mehr Menschen zu erreichen und zu mobilisieren? Teilen Sie jetzt unseren Video-Aufruf:<br>";
$message .= "<a href='{$fbvid}'>Facebook Video</a><br>";
$message .= "<a href='{$ytvid}'>Youtube Video</a><br><br>";
$message .= "Haben Sie noch eine Sekunde Zeit? Laden Sie Freund:innen und Bekannte ein, Teil der Kampagne zu werden:<br>";
$message .= "<a href='https://api.whatsapp.com/send?text={$messagetxt_bestellen}'>WhatsApp</a><br>";
$message .= "<a href='https://t.me/share/url?url={$bestellen_link}&text={$messagetxt_bestellen}'>Telegram</a><br><br>";
$message .= "Nochmals vielen Dank für Ihre Hilfe!<br><br>";
$message .= "Freundliche Grüsse<br>Das Kampagnen-Team der SP Schweiz";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: Kampagnen-Team der SP Schweiz <kommunikation@spschweiz.ch>' . "\r\n";

mail($to,$subject,$message,$headers);

header("location: /danke-bestellung");

}
else {
    die("Error");
    // header("location: /");
}