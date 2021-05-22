<?php

include(__DIR__ . "/../../includes/conn.inc.php");
$challengercount = $conn->query("SELECT * from `pn24_challengers`")->num_rows;

if ($challengercount <= 750) {
    $goal = 1000;
} else if ($challengercount <= 1500) {
    $goal = 2000;
} else {
    $goal = 3000;
}

$difference = $goal - $challengercount;

$percentage = floor($challengercount / $goal * 100);

if ($percentage >= 100) {
    $percentage = 100;
}

if ($percentage < 25) {
    $challengemsg = "Wir haben erst {$challengercount} Challengers zusammen: Tragen Sie sich auch ein und helfen Sie uns, das Ziel zu erreichen!";
} else if ($percentage < 75) {
    $challengemsg = "Schon {$challengercount} Challengers unterstützen unsere Challenge Woche: Tragen Sie sich auch ein, damit wir unser Ziel erreichen können!";
} else if ($percentage <= 75) {
    $challengemsg = "Fast geschafft! Uns fehlen noch {$difference} Challengers um unser Ziel zu erreichen: Zusammen können wir unser Ziel erreichen!";
} else if ($percentage = 100) {
    $challengemsg = "Geschaft! Wir haben unser Ziel erreicht! Dennoch: Je mehr Menschen wir in dieser Woche mobilisieren können, desto besser: Tragen Sie sich deshalb ein, um uns zu helfen, möglichst viele Menschen für ein JA zum CO2 Gesetz zu überzeugen!";
}

$i18n = array(

    // FORM
    "f-title" => "Akzeptieren Sie die Challenge?",
    "f-already-registered" => "Sie sind bereits für die Challenge Woche angemeldet!",
    "f-error" => "Da ist leider etwas schiefgelaufen. Bitte versuchen Sie es später nochmals!",
    "fname" => "Vorname",
    "lname" => "Nachname",
    "email" => "E-Mail Adresse",
    "plz" => "PLZ",
    "phone" => "Telefonnummer (optional)",
    "optin" => 'Ich bin einverstanden, dass die SP mich auf dem Laufenden hält. Mehr dazu <a href="https://www.sp-ps.ch/de/partei/wir-sind-die-sp/datenschutz-policy" target="_blank">hier.</a>',
    "register" => 'Mitmachen',



    // MISC
    "cta" => "So meistern Sie die Challenge:",

    // Challenge 1
    "1-title" => "Video von Jon Pult teilen!",
    "1-text" => "Nationalrat Jon Pult erklärt das CO2 Gesetz und wieso wir uns vor der Angstmacherei der Erdöllobby nicht verunsichern lassen dürfen.",
    "1-fb-link" => "https://fb.watch/5ANwdUn3jR/",
    "1-fb-text" => "Auf Facebook teilen",
    "1-insta-link" => "https://www.instagram.com/p/CPDN5ozARbq/",
    "1-insta-text" => "Auf Instagram liken",
    
    // Challenge 2
    "2-title" => "Nachbarschaftsbrief ausdrucken und verteilen!",
    "2-text" => "<b>Kurz und übersichtlich erklären wir im Nachbarschaftsbrief das CO2-Gesetz.</b> Wir schaffen den ersten, wichtigen Schritt zu mehr Klimagerechtigkeit nur wenn wir alle Stimmberechtigten erreichen.",
    "2-button-text" => "Brief drucken und verteilen",
    "2-button-link" => "https://klimagerechtigkeit-ja.ch/Nachbarschaftsbrief.pdf",
    
    // Challenge 3
    "3-title" => "Lesebriefe schreiben!",
    "3-text" => "Jetzt geht’s um Stift und Papier. Wir tragen mit Lesebriefen unsere Argumente in alle lokalen und regionalen Zeitungen.",
    "3-button-text" => "Lesebrief-Kit herunterladen",
    "3-button-link" => "https://klimagerechtigkeit-ja.ch/lesebriefe_kit.pdf",
    
    // Challenge 4
    "4-title" => "Interview mit Simonetta Sommaruga teilen!",
    "4-text" => "Bundesrätin Simonetta Sommaruga zeigt in diesem Artikel auf, weshalb das CO2-Gesetz so wichtig und nötig ist.",
    "4-button-text" => "Auf Facebook teilen",
    "4-button-link" => "https://www.sp-ps.ch/de/kampagnen/abstimmungen-vom-13-juni-2021/wir-brauchen-dieses-gesetz-jetzt",
    
    // Challenge 5
    "5-title" => "Erdöllobby-Video teilen!",
    "5-text" => "Die Erdöllobby versucht mit Falschmeldungen die Stimmberechtigten zu verunsichern. Das muss aufhören! Wir zeigen die Machenschaften im Video auf.",
    "5-fb-link" => "https://fb.watch/5ANwdUn3jR/",
    "5-fb-text" => "Auf Facebook teilen",
    "5-insta-link" => "https://www.instagram.com/p/CPDN5ozARbq/",
    "5-insta-text" => "Auf Instagram liken",
    
    // Challenge 6
    "6-title" => "Faktencheck teilen!",
    "6-text" => "Irreführende Angstmacherei kursiert auf allen Kanälen. Im Faktencheck nehmen wir die häufigsten Falschaussagen auf und erläutern das komplexe Gesetz einfach und kompakt.",
    "6-button-text" => "Auf Facebook teilen",
    "6-button-link" => "https://klimagerechtigkeit-ja.ch/faq/",

    // Thx
    "thx-title" => "Challenge gemeistert!",
    "thx-text" => "Danke für Ihre Unterstützung! Zusammen können wir es schaffen, am 13. Juni ein JA zum CO2-Gesetz zu erringen! Laden Sie jetzt ihr Umfeld ein, damit es in den nächsten Tagen auch an unserer Challenge teilnimmt:",
    "thx-wa-text" => "Hallo! Ich mache bei einer Challenge für das CO2-Gesetz mit: Eine Woche lang jeden Tag eine digitale Aktion, um so viele Menschen wie möglich von einem klaren JA zum CO2-Gesetz zu überzeugen. Jetzt braucht es uns alle: Bist du auch dabei? Melde dich jetzt an: https://klimagerechtigkeit-ja.ch/challenge-woche/",
    "thx-wa" => "Per WhatsApp teilen",
    "thx-tele-link" => "https://klimagerechtigkeit-ja.ch/challenge-woche/",
    "thx-tele" => "Per Telegram teilen",

)
?>