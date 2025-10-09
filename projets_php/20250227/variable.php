<?php
// $a = "bonjour";
// $a_1 = "au revoir";
// $_1 = "coucou";
// echo $a . " " .  $a_1 . " " . $_1;
?>


<?php
//  $a = "\$a : bonjour";
//  echo $a;
//  $a = 10;
//  echo "\n\$a + 10 : " . $a + 10;
//  echo "\n\$a : " . $a;
?>


 <?php
/**
 *  Dans PHP, tout est tableau ! 
 *      Les tableaux peuvent être indexés par des entiers ou par des chaînes de caractères.
 */
//  function affiche ($var1, $var2) {

//  	echo $GLOBALS['msg1']. $var1 . $GLOBALS['msg2'] . $var2; 	
	
//  }

// $msg1 = "Affichage de variable ";
// $msg2 = " suite affichage de variable ";

//  affiche ("valeur1", "valeur2");

?>  


<?php

//  function affiche ($var1, $var2) {
	
//  	global $msg1, $msg2;

// 	echo $msg1. $var1 . $msg2 . $var2; 	
//  }

//  $msg1 = "Affichage de variable ";
//  $msg2 = " suite affichage de variable ";

//  affiche ("valeur1", "valeur2");

?>

<?php

function affiche ($var1, $var2) {
	
	global $msg1, $msg2;
	
	echo $msg1. $var1 . $msg2 . $var2; 	
	
	$msg1 = " toto ";  
    // → $msg1 est une variable globale donc elle est réaffectée pour la prochaine utilisation
    
	$var1 = " tata ";   
    // → $var1 est une variable locale donc elle n'est pas réaffectée pour la prochaine utilisation
	
}

$msg1 = " variable 1 ";
$msg2 = " variable 2 ";

affiche ($msg1, $msg2);
echo "\n"; 
affiche ($msg1, $msg2);


?> 