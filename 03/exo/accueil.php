<?php

require_once 'commun.inc.php';

$nom = "Olivier";
$firstLetterType = "";
$nameVowelNumber = 0;
$date = date('l d F Y');
asort($auteurs);


if (preg_match("/[AEIOUYaeiouy]/", $nom[0])) $firstLetterType = "Votre nom commence par une voyelle <br>";
if (!preg_match("/[AEIOUYaeiouy]/", $nom[0])) $firstLetterType = "Votre nom commence par une consonne <br>";

$myFavoriteAuthorUnfiltered = $auteurs[rand(0, count($auteurs) - 1)];
$myFavoriteAuthor = preg_replace('/^[a-zA-Z]*\w/', "", $myFavoriteAuthorUnfiltered) . " (" . preg_replace('/[a-zA-Z]*$/', "", $myFavoriteAuthorUnfiltered) . ')';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
</head>
<body>
    <?= "Bonjour $nom<br>";?>
    <?= "Bienvenue sur" . NOM_SITE . "<br>";?>
    <?= "Nous sommes le $date<br>";?>
    <?= "Votre nom comporte " . strlen($nom) . " lettres<br>";?>
    <?= "Votre nom comporte " . preg_match_all("/[AEIOUYaeiouy]/", $nom) . " voyelles<br>";?>
    <?= $firstLetterType?>
    <table>
        <thead>
            <tr><th>Auteurs</th></tr>
        </thead>
        <tbody>
            <?php 
            foreach ($auteurs as $auteur) {
                echo "<tr><td>$auteur</td></tr>";
            }
            ?>
        </tbody>
        <tfooter></tfooter>
        <?= "Il y a " . count($auteurs) . " auteurs dans la liste<br>" ?>
        <?= "$myFavoriteAuthor est mon auteur préféré"?>
    </table>
</body>
</html>