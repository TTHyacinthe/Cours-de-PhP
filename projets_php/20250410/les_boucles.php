<?php

                              // WHILE

             // Table de multiplication

//  $nombre = readline("Ecrire un nombre : ");

//  //var_dump($nombre);

//  $i = 1;

//  while ($i <= 10){
//     $a = $nombre * $i;
//     echo $nombre . " * " . $i .  " = "   . $a . "\n";
//     ++$i;
//  }
 

// $nombre = readline("Ecrire un nombre : ");

// $i = 0;

// while ($i <= $nombre) {
      
//         $a = $i%3;
//         $b = $i%5;
//         if ($a == 0 && $b == 0){
//           echo "toptopbotumbotum". "\n";
//         }
//         elseif ($a == 0){
//           echo "top top" . "\n";
//         }elseif ($b = 0){
//           echo "botum botum" . "\n";
//         }else{
//           echo  $i . "\n";
//         }
//         $i++;

// }

                                        // FOR


$tab = [
        0 => "un",
];
$prenom = "Gerard";
// $conteur = strlen($prenom);
$compteur = count($tab); 
for ($i = 0; $i < $compteur; $i++){
        echo $compteur[$i] .  "\n";
       /// echo $conteur[$i] .  "\n";
}