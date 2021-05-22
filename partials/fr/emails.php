<?php
include("../../includes/fr/var.inc.php");
include("../../includes/var.gen.inc.php");

$fname = $_GET["fname"];
$lname = $_GET["lname"];
$origin = $_GET["origin"];
$to = $_GET["to"];

if (isset($_GET["email"]) && $_GET["email"] == "acti-some") {

$subject = "Merci pour votre soutien !";

$message = "Bonjour {$fname} {$lname}<br><br>";
$message .= "Merci beaucoup pour votre soutien. Nous reviendrons bientôt avec plus d’informations.<br><br>";
$message .= "Nous sommes heureux que vous souhaitiez soutenir notre campagne sur les réseaux sociaux. Rejoignez notre groupe de bénévoles dès maintenant : <br>";
$message .= "<a href='{$WAchat}'>Groupe WhatsApp</a><br>";
if ($teleYES == 1) {
    $message .= "<a href='{$Telechat}'>Groupe Telegram</a><br><br>";
}
$message .= "Avez-vous encore une seconde ? Invitez vos ami-e-s et connaissances à prendre part à la campagne :<br>";
$message .= "<a href='https://api.whatsapp.com/send?text={$messagetxt}'>WhatsApp</a><br>";
$message .= "<a href='https://t.me/share/url?url={$mitmachen_link}&text={$messagetxt}'>Telegram</a><br><br>";
$message .= "Les lobbies financièrement puissants du pétrole et de l’automobile luttent avec le soutien de l’UDC contre la nouvelle loi sur le CO2. C’est pourquoi nous nous préparons à une campagne de votations intense. Ce n’est qu’ensemble que nous réussirons à faire passer la ligne d’arrivée à la nouvelle loi sur le CO2.<br><br>";
$message .= "Encore une fois, merci infiniment pour votre aide !<br><br>";
$message .= "Meilleures salutations,<br>Équipe de campagne du PS Suisse";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: Équipe de campagne du PS Suisse <communication@pssuisse.ch>' . "\r\n";

mail($to,$subject,$message,$headers);

header("location: /merci?type=acti");


} elseif (isset($_GET["email"]) && $_GET["email"] == "acti") {
    
$subject = "Merci pour votre soutien !";

$message = "Bonjour {$fname} {$lname}<br><br>";
$message .= "Merci beaucoup pour votre soutien. Nous reviendrons bientôt avec plus d’informations.<br><br>";
$message .= "Avez-vous encore une seconde ? Invitez vos ami-e-s et connaissances à prendre part à la campagne :<br>";
$message .= "<a href='https://api.whatsapp.com/send?text={$messagetxt}'>WhatsApp</a><br>";
$message .= "<a href='https://t.me/share/url?url={$mitmachen_link}&text={$messagetxt}'>Telegram</a><br><br>";
$message .= "Les lobbies financièrement puissants du pétrole et de l’automobile luttent avec le soutien de l’UDC contre la nouvelle loi sur le CO2. C’est pourquoi nous nous préparons à une campagne de votations intense. Ce n’est qu’ensemble que nous réussirons à faire passer la ligne d’arrivée à la nouvelle loi sur le CO2.<br><br>";
$message .= "Encore une fois, merci infiniment pour votre aide !<br><br>";
$message .= "Meilleures salutations,<br>Équipe de campagne du PS Suisse";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: Équipe de campagne du PS Suisse <communication@pssuisse.ch>' . "\r\n";

mail($to,$subject,$message,$headers);

header("location: /merci?type=acti&some=1");

} elseif (isset($_GET["email"]) && $_GET["email"] == "testimonial") {

$subject = "Merci pour votre témoignage !";

$message = "Bonjour {$fname} {$lname}<br><br>";
$message .= "Merci beaucoup pour votre témoignage, qui sera bientôt publié.<br><br>";
$message .= "Les lobbies financièrement puissants du pétrole et de l’automobile luttent avec le soutien de l’UDC contre la nouvelle loi sur le CO2. C’est pourquoi nous nous préparons à une campagne de votations intense. Avec une large alliance, nous réalisons un important travail d’information sur ce projet de loi complexe. Pour gagner dans les urnes, nous comptons sur les dons. Ensemble, nous jetons les bases d’un avenir écologique.<br><br>";
$message .= "<a href='". $curr_link . "/donner'>Je soutiens la campagne avec un don</a><br><br>";
$message .= "Encore une fois, merci infiniment pour votre aide !<br><br>";
$message .= "Meilleures salutations,<br>Équipe de campagne du PS Suisse";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: Équipe de campagne du PS Suisse <communication@pssuisse.ch>' . "\r\n";

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
$headers .= 'From: Équipe de campagne du PS Suisse <communication@pssuisse.ch>' . "\r\n";

mail($testimonial_email,$subject,$message,$headers);

header("location: /merci?type=testimonial");


} elseif (isset($_GET["email"]) && $_GET["email"] == "seeds"){

$subject = "Merci pour votre commande !";

$message = "Bonjour {$fname} {$lname}<br><br>";
$message .= "Merci beaucoup pour votre commande. Le sachet de semences va être bientôt expédié.<br><br>";
$message .= "Pour nous, c’est une évidence : ce n’est qu’ensemble que nous pouvons construire un futur plus durable. Nous aiderez-vous à atteindre plus de personnes et à les mobiliser ? Partegez dès maintenant notre appel vidéo :<br>";
$message .= "<a href='{$fbvid}'>Vidéo sur Facebook</a><br>";
$message .= "<a href='{$ytvid}'>Vidéo sur YouTube</a><br><br>";
$message .= "Avez-vous encore une seconde ? Invitez vos ami-e-s et connaissances à prendre part à la campagne :<br>";
$message .= "<a href='https://api.whatsapp.com/send?text={$messagetxt_bestellen}'>WhatsApp</a><br>";
$message .= "<a href='https://t.me/share/url?url={$bestellen_link}&text={$messagetxt_bestellen}'>Telegram</a><br><br>";
$message .= "Encore une fois, merci infiniment pour votre aide !<br><br>";
$message .= "Meilleures salutations,<br>Équipe de campagne du PS Suisse";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: Équipe de campagne du PS Suisse <communication@pssuisse.ch>' . "\r\n";

mail($to,$subject,$message,$headers);

header("location: /merci-commande");

}
else {
    die("Error");
    // header("location: /");
}