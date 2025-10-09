<?php

// Quelques erreurs à ne pas commettre

// $1c = "aie";
// PHP Parse error:  syntax error, unexpected integer "1", expecting variable or "{" or "$"
$c1 = "aie";

// $vari-able = "erreur";
// PHP Parse error:  syntax error, unexpected token "="on line 9
$variable = "erreur";

// $email@pourquoi.pas = "catastrophe";
// PHP Parse error:  syntax error, unexpected token "@"
$email_pourquoi_pas = "catastrophe";

// echo $1c . $vari-able . $email@pourquoi.pas ;
echo $c1 . $variable . $email_pourquoi_pas;


/**
 * Conclusion :
 *      - les variables ne peuvent pas commencer par un chiffre
 *      - ne peuvent pas contenir de caractères spéciaux (à l'exception du tiret bas) 
 *      - ne peuvent pas contenir de caractères accentués.
 */
?>




