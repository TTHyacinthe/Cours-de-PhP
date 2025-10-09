<?php
$mystere = mt_rand(0,4);

switch ($mystere) {
case 4 : 
       echo "$mystere est supérieur à 3" . "\n";
       break;
case 3 :
       echo "$mystere est supérieur à 2" . "\n";
       break;
case 2 :
       echo "$mystere est supérieur à 1" . "\n";
       break;
case 1 : 
       echo "$mystere est supérieur à 0" . "\n";
       break;
default : 
       echo "$mystere est 0 " . "\n";
}

// REMARQUE : Voir l'utilisation de "match"