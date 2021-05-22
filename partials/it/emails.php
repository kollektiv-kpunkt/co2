<?php
include("../../includes/it/var.inc.php");
include("../../includes/var.gen.inc.php");

$fname = $_GET["fname"];
$lname = $_GET["lname"];
$origin = $_GET["origin"];
$to = $_GET["to"];

if (isset($_GET["email"]) && $_GET["email"] == "acti-some") {

$subject = "Grazie per il suo sostegno!";

$message = "Buongiorno {$fname} {$lname}<br><br>";
$message .= "Grazie mille per il suo sostegno! La ricontatteremo presto con ulteriori informazioni sulla campagna.<br><br>";
$message .= "Aderisca ora al nostro gruppo di volontari e volontarie per rimanere sempre aggiornato sulla campagna:<br>";
$message .= "<a href='{$WAchat}'>Gruppo WhatsApp</a><br>";
if ($teleYES == 1) {
    $message .= "<a href='{$Telechat}'>Gruppo Telegram</a><br><br>";
}
$message .= "Ha ancora un attimo di tempo? Inviti amici e amiche e conoscenti a far parte anche loro della campagna!<br>";
$message .= "<a href='https://api.whatsapp.com/send?text={$messagetxt}'>WhatsApp</a><br>";
$message .= "<a href='https://t.me/share/url?url={$mitmachen_link}&text={$messagetxt}'>Telegram</a><br><br>";
$message .= "La facoltosa lobby del petrolio e dell'automobile combatte la nuova legge sul CO2 a fianco dell'UDC. Per questo motivo ci aspetta una campagna di voto molto impegnativa. Solo insieme possiamo portare la nuova legge sulla CO2 oltre il traguardo.<br><br>";
$message .= "Grazie di cuore per il suo aiuto!<br><br>";
$message .= "Cordiali saluti<br>Il team campagne del PS Svizzero";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: Team campagne del PS Svizzero <communication@pssuisse.ch>' . "\r\n";

mail($to,$subject,$message,$headers);

header("location: /grazie?type=acti");


} elseif (isset($_GET["email"]) && $_GET["email"] == "acti") {
    
$subject = "Grazie per il suo sostegno!";

$message = "Buongiorno {$fname} {$lname}<br><br>";
$message .= "Grazie mille per il suo sostegno! La ricontatteremo presto con ulteriori informazioni sulla campagna.<br><br>";
$message .= "Ha ancora un attimo di tempo? Inviti amici e amiche e conoscenti a far parte anche loro della campagna!<br>";
$message .= "<a href='https://api.whatsapp.com/send?text={$messagetxt}'>WhatsApp</a><br>";
$message .= "<a href='https://t.me/share/url?url={$mitmachen_link}&text={$messagetxt}'>Telegram</a><br><br>";
$message .= "La facoltosa lobby del petrolio e dell'automobile combatte la nuova legge sul CO2 a fianco dell'UDC. Per questo motivo ci aspetta una campagna di voto molto impegnativa. Solo insieme possiamo portare la nuova legge sulla CO2 oltre il traguardo.<br><br>";
$message .= "Grazie di cuore per il suo aiuto!<br><br>";
$message .= "Cordiali saluti<br>Il team campagne del PS Svizzero";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: Team campagne del PS Svizzero <communication@pssuisse.ch>' . "\r\n";

mail($to,$subject,$message,$headers);

header("location: /grazie?type=acti&some=1");

} elseif (isset($_GET["email"]) && $_GET["email"] == "testimonial") {

$subject = "Grazie per la sua testimonianza!";

$message = "Buongiorno {$fname} {$lname}<br><br>";
$message .= "Grazie mille per la sua testimonianza, che sarà pubblicata presto.<br><br>";
$message .= "La facoltosa lobby del petrolio e dell'automobile combatte la nuova legge sul CO2 a fianco dell'UDC. Per questo motivo ci aspetta una campagna di voto molto impegnativa. Insieme a una larga alleanza, stiamo compiendo un importante lavoro di informazione su questa complessa proposta di legge. Per poter uscire vincitori dalle urne, abbiamo bisogno della sua generosità. Insieme poseremo la prima pietra per un futuro ecologico.<br><br>";
$message .= "<a href='". $curr_link . "/donare'>Sostengo la campagna con una donazione</a><br><br>";
$message .= "Grazie di cuore per il suo aiuto!<br><br>";
$message .= "Cordiali saluti<br>Il team campagne del PS Svizzero";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: Team campagne del PS Svizzero <communication@pssuisse.ch>' . "\r\n";

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
$headers .= 'From: Team campagne del PS Svizzero <communication@pssuisse.ch>' . "\r\n";

mail($testimonial_email,$subject,$message,$headers);

header("location: /grazie?type=testimonial");


} elseif (isset($_GET["email"]) && $_GET["email"] == "seeds"){

$subject = "Grazie per il suo ordine!";

$message = "Buongiorno {$fname} {$lname}<br><br>";
$message .= "Grazie mille per il suo ordine. Il sacchetto sarà spedito al più presto.<br><br>";
$message .= "Vogliamo far sì che il nostro messaggio raggiunga il maggior numero di persone possibili. Ci aiuta condividendo il nostro appello?<br>";
$message .= "<a href='{$fbvid}'>Video su Facebook</a><br>";
$message .= "<a href='{$ytvid}'>Video su YouTube</a><br><br>";
$message .= "Ha ancora un attimo di tempo? Inviti amici e amiche e conoscenti a far parte anche loro della campagna!<br>";
$message .= "<a href='https://api.whatsapp.com/send?text={$messagetxt_bestellen}'>WhatsApp</a><br>";
$message .= "<a href='https://t.me/share/url?url={$bestellen_link}&text={$messagetxt_bestellen}'>Telegram</a><br><br>";
$message .= "Grazie di cuore per il suo aiuto!<br><br>";
$message .= "Cordiali saluti<br>Il team campagne del PS Svizzero";


// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: Team campagne del PS Svizzero <communication@pssuisse.ch>' . "\r\n";

mail($to,$subject,$message,$headers);

header("location: /grazie-ordine");

}
else {
    die("Error");
    // header("location: /");
}