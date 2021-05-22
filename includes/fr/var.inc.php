<?php
$curr_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
$mitmachen_link = $curr_link . "/soutenir";
$bestellen_link = $curr_link . "/sachet-de-semences";
$messagetxt = urlencode("Salut 👋\nLe temps presse ! La loi sur le CO2 que nous allons voter le 13 juin est un premier pas important vers l’objectif du « zéro émission ». Si la loi est rejetée, nous perdrons des années cruciales dans la lutte contre la catastrophe climatique. Nous ne pouvons pas nous le permettre. Participe à la campagne référendaire avec moi dès maintenant !\n👉 {$mitmachen_link}");
$messagetxt_bestellen = urlencode("Salut 👋\nLe temps nous est compté dans la lutte contre la catastrophe climatique. La loi sur le CO2, sur laquelle nous voterons le 13 juin 2021, représente un premier pas important pour la réduction de nos émissions de CO2. Si la loi est rejetée, nous perdrons des années cruciales dans la lutte contre la catastrophe climatique. Nous ne pouvons pas nous le permettre. Ça me ferait plaisir si tu t’engageais avec moi dans la campagne de votation ! Toi aussi, commande un sachet de graines\n👉 {$bestellen_link}");

$WAchat = "https://chat.whatsapp.com/H57e54EcdW93UGrHWFeqrn";
$teleYES = 1;
$Telechat = "https://t.me/joinchat/bA_AYiNF7xIwNWZk";

$h_button1 = "Pourquoi OUI";
$h_button2 = "Soutenir";

$refresh_button = "Chargez plus";

$fbvid = "https://fb.watch/4cBEGkKfRD/";
$ytvid = "https://www.youtube.com/watch?v=D6S-o4NgEi0";