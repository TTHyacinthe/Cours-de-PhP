<?php

$nombre = (int)readline("Nombre de livres : ");
$livres = [];
for ($i = 0 ; $i < $nombre ; $i++){
    $livre = [
        "titre" => readline("Titre du livre" . ($i + 1) . " : "),
        "genre" => readline("Genre de livre" . ($i + 1) . " : "),
        "année" => readline("Année de publication du livre" . ($i + 1) . " : ")

    ];
    $livres[] = $livre;
};

foreach ($livres as $clef => $livre) {
    echo "Livre : " . ($clef + 1) . "\n";
    echo "titre : " . $livre['titre'] . "\n";
    echo "Genre : " . $livre['genre'] . "\n";
    echo "Année de publication : " . $livre['année'] . "\n";
};