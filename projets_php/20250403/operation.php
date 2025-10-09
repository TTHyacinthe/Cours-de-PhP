<?php

$a = 1;

$a = $b = 1;

$a = ($b = 1);

$a = $b;

$b = 3;

echo " a = " . $a ; 
echo " b = " . $b ; 

$a =& $b;

$b = 3;

echo " a = " . $a ; 
echo " b = " . $b ;


?>