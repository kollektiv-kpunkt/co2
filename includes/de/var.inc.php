<?php
$curr_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
$mitmachen_link = $curr_link . "/unterstutzen";
$bestellen_link = $curr_link . "/samenbeutel";
$messagetxt = urlencode("Hoi 👋\nDie Zeit läuft uns davon! Das CO2-Gesetz, über das wir am 13. Juni abstimmen, stellt einen ersten, wichtigen Schritt in Richtung Netto Null dar. Wird das Gesetz abgelehnt, verlieren wir entscheidende Jahre im Kampf gegen die Klimakrise. Das können wir uns nicht leisten. Engagiere dich jetzt mit mir im Abstimmungskampf!\n👉 {$mitmachen_link}");
$messagetxt_bestellen = urlencode("Hoi 👋\nIm Kampf gegen die Klimakrise läuft uns die Zeit davon. Mit dem CO2-Gesetz, über das wir am 13. Juni abstimmen, können wir aber einen ersten, wichtigen Schritt in eine klimagerechte Zukunft machen. Wird das Gesetz abgelehnt, verlieren wir entscheidende Jahre. Das können wir uns nicht leisten. Es würde mich freuen, würdest du dich gemeinsam mit mir im Abstimmungskampf engagieren! Bestelle doch auch einen Samenbeutel\n👉 {$bestellen_link}");
$WAchat = "https://chat.whatsapp.com/IyDk9zqQUTyLrbdYQF6Z1x";
$teleYES = 1;
$Telechat = "https://t.me/joinchat/yvN-xMatsY4zMzc8";

$h_button1 = "Darum JA";
$h_button2 = "Unterstützen";

$refresh_button = "Mehr laden";

$fbvid = "https://fb.watch/4cBkukiLkI/";
$ytvid = "https://www.youtube.com/watch?v=iFlwEiCRa7Q";