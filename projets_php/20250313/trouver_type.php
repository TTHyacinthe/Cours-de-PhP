<?php
   function aLeTypeDe($var){
        echo $var . " a le type " . gettype($var) . ". "; 

   } 

   $a="bonjour";

   aLeTypeDe($a);
   echo "\n";

   $a=10;
   $a=-12;
   $a=016; // base octale : 14
   $a=0x3A; //base hexadécimale : 58

   aLeTypeDe($a);

   $a=10.3;
   echo "\n";
   aLeTypeDe($a);

   $a=10e28;
   echo "\n";

   aLeTypeDe($a);
?>