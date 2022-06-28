<?php

require_once 'commun.inc.php';

$nom = "Olivier";
$firstLetterType = "";

if (preg_match("/[AEIOUY]/", $nom[0])) $firstLetterType = "Votre nom commence par une voyelle <br>";
if (!preg_match("/[AEIOUY]/", $nom[0])) $firstLetterType = "Votre nom commence par une consonne <br>";

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
    <?= "Votre nom comporte " . strlen($nom) . " lettres<br>";?>
    <?= $firstLetterType?>
    <table>
        <thead>
            <tr><th>Autheurs</th></tr>
        </thead>
        <tbody>
            <?php 
            foreach ($auteurs as $auteur) {
                echo "<tr><td>$auteur</td></tr>";
            }
            ?>
        </tbody>
        <tfooter></tfooter>
    </table>
</body>
</html>