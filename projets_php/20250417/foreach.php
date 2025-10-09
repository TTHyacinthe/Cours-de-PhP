<?php

                                                 // INDEXATION NUMERIQUE

// $tab = array(2, 4, 6, "chien", 'chat', 10);

// foreach ( $tab as $Value ){
//     echo $Value . "\n";
// }


                                                  // ASSOCIATIF

$livre = array(
    "titre" => "Le Banquet",
    "auteur" => 'Platon',
    "origine" => "Grèce",
    "type" => "Philosophie"
);
foreach ($livre as $clef => $valeur) {
    echo $clef . " : " . $valeur . "\n";
}