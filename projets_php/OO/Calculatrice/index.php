<?php
// calculatrice_cli.php
require_once 'Calculatrice.php';

$calculatrice = new Calculatrice(10, 12, '-');
echo $calculatrice->calculer();
$calculatrice->setNbr1(20);
$calculatrice->setNbr2(4);
$calculatrice->setOperateur('/');
echo "\n";
echo $calculatrice->calculer();


