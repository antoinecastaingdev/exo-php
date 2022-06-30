<?php

// Inclusion des différents fichiers
$authorsFile = file_get_contents("authors.json");
$authors = json_decode($authorsFile);
//
var_dump($authors);

// Déclaration des fonctions
function formatFirstnameLastname(string $name) : string {
    $nameArray = explode(" ", $name);
    return $nameArray[1] . " (" . $nameArray[0] . ')';
}
//
asort($authors);


// Déclaration des variables
$renderTbody = "";
$randomAuthor = $authors[rand(0, count($authors) - 1)];
$myFavoriteAuthor = formatFirstnameLastname($randomAuthor);
$multidimensionAuthors = [];
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
    <table>
        <thead>
            <tr><th>Auteurs</th></tr>
        </thead>
        <tbody>
            <?= $renderTbody ?>
        </tbody>
        <tfooter></tfooter>

    </table>
</body>
</html>
