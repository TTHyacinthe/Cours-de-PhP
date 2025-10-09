<?php
$file = fopen("compteur.txt", "r+");
$compteur= fgets($file, 4096);
if ($compteur == "") {
    $compteur = 0;
} 
$compteur++;
fclose($file);
$file = fopen("compteur.txt", "w+");
fwrite($file, $compteur);

fwrite($file, $compteur);
fclose($file);
// feof : file end of file
fclose($file);
echo "Vous avez visitez mon site : " . $compteur;
