<?php

// Inclusion des différents fichiers
require_once 'commun.inc.php';
//


// Déclaration des fonctions
function renderBody(array $variables = []) : void {
    echo "<p>Bonjour " . $variables['username'] . "</p>";
    echo "<p>Votre nom comporte " . preg_match_all("/[AEIOUYaeiouy]/", $variables['username']) . " voyelles</p>";
    echo "<p>Votre nom commence par une " . $variables['user_first_letter_type'] . "</p>";
}

function isLetterVowel(string $char) : int {
    return preg_match("/[AEIOUYaeiouy]/", $char);
}

function formatFirstnameLastname(string $name) : string {
    $nameArray = explode(" ", $name);
    return $nameArray[1] . " (" . $nameArray[0] . ')';
}
//


// Déclaration des variables
$userName = "Olivier";
$userFirstLetterType = str_repeat("voyelle", (isLetterVowel($userName[0]))) . str_repeat("consonne", (!isLetterVowel($userName[0])));
$nameVowelNumber = 0;
$date = date('l d F Y');
$renderTbody = "";
$randomAuthor = $authors[rand(0, count($authors) - 1)];
$myFavoriteAuthor = formatFirstnameLastname($randomAuthor);
$multidimensionAuthors = [];

$variables = [
    "username" => $userName,
    "user_first_letter_type" => $userFirstLetterType,
    "name vowel number" => $nameVowelNumber,
    "date" => $date,
    "render tbody" => $renderTbody,
    "website_name" => SITE_NAME
];
//


// Fin des initialisations
foreach ($authors as $key => $author) {
	$authorArray = explode(" ", $author);
	$multidimensionAuthors[] = [
		"nom" => $authorArray[1],
		"prenom" => $authorArray[0],
	];
}

array_multisort(
	$multidimensionAuthors,
	array_column($multidimensionAuthors, "nom"),
	array_column($multidimensionAuthors, "prenom")
);

foreach ($multidimensionAuthors as $key => $multidimensionAuthor) {
	$renderTbody .= "<tr><td>" . $multidimensionAuthor["nom"] . " (" . $multidimensionAuthor["prenom"] . ")</td></tr>";
}

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

    <?php renderBody($variables);?>

    <table>
        <thead>
            <tr><th>Auteurs</th></tr>
        </thead>
        <tbody>
            <?= $renderTbody ?>
        </tbody>
        <tfooter></tfooter>

        <?php
        echo "<p>Il y a " . count($authors) . " auteurs dans la liste</p>";
        echo "<p>$myFavoriteAuthor est mon auteur préféré</p>";
        ?>

    </table>
</body>
</html>