<?php

// require 'nom.txt';

$argument = $argv[1];
$file = file($argument);
$personne = $file;
 

shuffle($file); // Mélange les lignes du fichier
$cacahuete = [];
foreach ($file as $line) {
    $personne = array_filter($personne, function($item) use ($line) {
        return trim($item) !== trim($line);
    });

    shuffle($personne);

    $cacahuete[$line] = $personne[0];
    $personne = array_shift($personne); 
    
}
echo "<pre>";
print_r($cacahuete);

?>
