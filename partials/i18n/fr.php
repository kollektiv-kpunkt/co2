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
    $challengemsg = "Nous avons seulement rassemblé {$challengercount} participant-e-s : inscrivez-vous aussi et aidez-nous à faire voter un grand OUI à la Loi sur le CO2 !";
} else if ($percentage < 75) {
    $challengemsg = "Déjà {$challengercount} personnes soutiennent notre « Challenge CO2 » : inscrivez-vous aussi, pour qu’ensemble nous puissions gagner la campagne pour la Loi sur le CO2 !";
} else if ($percentage <= 75) {
    $challengemsg = "Nous y sommes presque ! Nous avons encore besoin de {$difference} participant-e-s pour atteindre notre objectif : ensemble, nous pouvons faire un premier pas important pour la protection du climat !";
} else if ($percentage = 100) {
    $challengemsg = "C’est fait ! Nous avons atteint notre objectif ! Cependant, il nous faut continuer à mobiliser : plus nous réussirons à mobiliser de personnes cette semaine, mieux ce sera. Alors inscrivez-vous pour convaincre le plus grand nombre de personnes possible de voter OUI à la Loi sur le CO2.";
}

$i18n = array(

    // FORM
    "f-title" => "Acceptez-vous de relever le défi ?",
    "f-already-registered" => "Vous vous êtes déjà annoncé-e pour le « Challenge CO2 » !",
    "f-error" => "Oups, il y a eu un problème. Veuillez s’il vous plaît vous inscrire à nouveau !",
    "fname" => "Prénom",
    "lname" => "Nom",
    "email" => "Courriel",
    "plz" => "Code postale",
    "phone" => "Numéro de portable (facultatif)",
    "optin" => 'Je suis d’accord pour que le PS me tienne informé-e. Plus d’informations à ce sujet <a href="https://www.sp-ps.ch/fr/politique-de-protection-des-donnees" target="_blank">ici.</a>',
    "register" => 'Participer',



    // MISC
    "cta" => "Vous réussirez le défi de cette manière :",

    // Challenge 1
    "1-title" => "Partager la vidéo de Roger Nordmann&nbsp;!",
    "1-text" => "Le conseiller national Roger Nordmann explique la Loi sur le CO2 et pourquoi nous ne devons pas nous laisser impressionner par la campagne de peur menée par le lobby pétrolier.",
    "1-fb-link" => "https://fb.watch/5CbB68tUlE/",
    "1-fb-text" => "Partager sur Facebook",
    "1-insta-link" => "https://www.instagram.com/tv/COu7lQYhXC8/",
    "1-insta-text" => "Liker sur Instagram ",
    
    // Challenge 2
    "2-title" => "Imprimer la lettre de voisinage et la distribuer&nbsp;!",
    "2-text" => "<b>Expliquer de manière concise et claire, à travers une lettre de voisinage, la Loi sur le CO2.</b> Nous ne réussirons ce premier pas important pour plus de justice climatique que si nous atteignons toutes les personnes votantes. Chaque voix compte.",
    "2-button-text" => "Imprimer la lettre la distribuer",
    "2-button-link" => "https://justice-climatique-oui.ch/lettre_de_voisinage.pdf",
    
    // Challenge 3
    "3-title" => "Écrire des courriers de lectrices/teurs&nbsp;!",
    "3-text" => "À vos feuilles et à vos stylos. Nous rendons nos arguments visibles à travers des courriers de lectrice/teurs dans les journaux locaux et régionaux.",
    "3-button-text" => "Télécharger le kit de rédaction",
    "3-button-link" => "https://justice-climatique-oui.ch/kit_de_r%C3%A9daction_de_courriers.pdf",
    
    // Challenge 4
    "4-title" => "Partager l’interview de Simonetta Sommaruga&nbsp;!",
    "4-text" => "Notre conseillère fédérale Simonetta Sommaruga montre, dans une grande interview, pourquoi la Loi sur le CO2 bénéficie d’un si large soutien et est socialement juste.",
    "4-button-text" => "Partager sur Facebook",
    "4-button-link" => "https://www.sp-ps.ch/fr/publications/blog/nous-avons-besoin-de-la-loi-sur-le-co2-maintenant",
    "4-insta-link" => "https://www.instagram.com/p/CPDN5ozARbq/",
    "4-insta-text" => "Liker sur Instagram ",
    
    // Challenge 5
    "5-title" => "partager la vidéo sur le lobby pétrolier&nbsp;!",
    "5-text" => "Le lobby pétrolier tente de faire douter la population votante avec de fausses annonces. Nous devons y mettre un terme ! Nous montrons ces machinations dans une vidéo.",
    "5-fb-link" => "https://fb.watch/5CbB68tUlE/",
    "5-fb-text" => "Partager sur Facebook",
    "5-insta-link" => "https://www.instagram.com/p/CPDN5ozARbq/",
    "5-insta-text" => "Liker sur Instagram ",
    
    // Challenge 6
    "6-title" => "Partager notre fact-checking&nbsp;!",
    "6-text" => "Des propos alarmistes et trompeurs circulent sur tous les canaux. Dans notre fact-checking, nous nous attaquons aux déclarations erronées les plus courantes et expliquons la Loi sur le CO2 de manière simple et concise.",
    "6-button-text" => "Partager sur Facebook",
    "6-button-link" => "https://justice-climatique-oui.ch/faq/",
    "6-insta-link" => "https://www.instagram.com/p/CPDN5ozARbq/",
    "6-insta-text" => "Auf Instagram liken",
    
    // Challenge 7
    "7-title" => "Mobiliser la population votante&nbsp;!",
    "7-text" => "Pour l’instant, peu de personnes ont voté. Afin d’obtenir plus de justice climatique lors de ce vote historique, chaque voix compte.",
    "7-button-text" => "Mobilisez maintenant",
    "7-button-link" => "https://klimagerechtigkeit-ja.ch/img.png",

    // Thx
    "thx-title" => "Défi maîtrisé&nbsp;!",
    "thx-text" => "Merci pour votre soutien ! Ensemble, nous pouvons obtenir un OUI à la loi sur le CO2 le 13 juin ! Invitez votre entourage dès maintenant afin qu'il participe également à notre défi dans les prochains jours :",
    "thx-wa-text" => "Salut ! Je participe au « Challenge CO2 » : durant une semaine, nous réaliserons chaque jour une action en ligne pour mobiliser le plus de personnes possibles pour un OUI clair à la Loi sur le CO2. Nous avons besoin du plus de monde possible : souhaites-tu nous aider ? Inscris-toi au lien suivant : https://justice-climatique-oui.ch/challenge-week/",
    "thx-wa" => "Inviter par Whatsapp",
    "thx-tele-link" => "https://justice-climatique-oui.ch/challenge-week/",
    "thx-tele" => "Inviter par Telegram",

)
?>