<?php

require "Voiture.php";
require "Moto.php";
$ford = new Voiture();
$ford->marque = "Ford";
$ford->couleur = "Rouge";

echo "Ma voiture est une " . $ford->marque . " de couleur " . $ford->couleur . ".\n";
echo $ford->demarrer() . "\n";
echo $ford->rouler() . "\n";
echo $ford->freiner() . "\n";

echo "Combien de roues a ma voiture ? " . $ford->roues . " roues.\n";
