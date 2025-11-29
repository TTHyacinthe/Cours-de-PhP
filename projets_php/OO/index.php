<?php
require_once 'Barbie.php'; // Inclusion de la classe Barbie

$poupee = new Barbie(nom: 'Clémentine', sexe: 'Féminin');
echo $poupee->definition();
echo "\n";

echo 'Sexe de la poupée : ' . $poupee->sexe;
echo "\n";
echo 'Nom de la poupée : ' . $poupee->getNom(); // Cela générera une erreur car $nom est privé 
                                                    // --> getNom() est la méthode publique pour y accéder.
$poupee->setNom('Sophie'); // Utilisation du setter pour modifier le nom
echo "\n";
echo 'Nouveau nom de la poupée : ' . $poupee->getNom(); // Utilisation du getter pour accéder au nom modifié



?>