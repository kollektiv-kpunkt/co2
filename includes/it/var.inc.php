<?php
$curr_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
$mitmachen_link = $curr_link . "/sostenere";
$bestellen_link = $curr_link . "/sacchetto-di-semi";
$messagetxt = urlencode("Il tempo stringe. La legge sul CO2, sulla quale voteremo il 13 giugno, rappresenta un primo ma importante passo verso la riduzione delle emissioni di anidride carbonica. Se la legge sarà bocciata, perderemo anni decisivi nella lotta contro la crisi climatica. E non possiamo permettercelo! Partecipa alla campagna con me:\n{$mitmachen_link}");
$messagetxt_bestellen = urlencode("Il tempo stringe. La legge sul CO2, sulla quale voteremo il 13 giugno, rappresenta un primo ma importante passo verso la riduzione delle emissioni di anidride carbonica. Se la legge sarà bocciata, perderemo anni decisivi nella lotta contro la crisi climatica. E non possiamo permettercelo! Partecipa alla campagna con me:\n{$bestellen_link}");

$WAchat = "https://chat.whatsapp.com/FTHthWIVbjpGKPOSQkbz5p";
$teleYES = 0;
$Telechat = "https://t.me/joinchat/bA_AYiNF7xIwNWZk";

$h_button1 = "perché diciamo SÌ";
$h_button2 = "Partecipare";

$refresh_button = "Caricare di più";

$fbvid = "https://www.facebook.com/PSTicino/videos/125874409473922";
$ytvid = "https://www.youtube.com/watch?v=rsnZrrq76Mg";