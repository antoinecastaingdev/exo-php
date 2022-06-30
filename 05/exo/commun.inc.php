<?php
const SITE_NAME = "monSite.com";
$authors = ['Victor Hugo', 'Charles Baudelaire', 'Arthur Rimbaud', 'Paul Verlaine'];
asort($authors);

function analyseVowel($name, $number, $beginWith) {
    $beginWith = preg_match("/[AEIOUYaeiouy]/", $name[0]);
    $number = (preg_match_all("/[AEIOUYaeiouy]/", $name));
};