<?php
if (isset($_COOKIE['compteur'])) {
    $compteur = $_COOKIE['compteur'] + 1;
} else {
    $compteur = 1;
}

setcookie ('compteur', $compteur,  mktime(0, 0, 0, 12, 31, 2029));


$date = date("d-m-Y");
$heure = date("H:i");

$valeurcookie =  $date . ' ' . $heure;
setcookie('dateVisite', $valeurcookie, $expiration);
echo 'Nombre de visites : ' . $compteur . '<br>';
echo 'votre dernière visite était le : ' . $_COOKIE['dateVisite'];
?>


