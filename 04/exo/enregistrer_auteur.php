<?php

require_once 'commun.inc.php';

$file = fopen("authors.json", "w");
fwrite($file, json_encode($authors));
fclose($file);

header('location: accueil.php');