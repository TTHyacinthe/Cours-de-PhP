<?php

$a = "3" + 1;

echo '"3" + 1 : ' . gettype($a) . "," .$a . "\n";

$a = (string) $a;

echo 'integer -> string : ' .gettype($a) . "," .$a . "\n";

$a = settype($a, 'boolean');

echo 'string -> boolean : ' .gettype($a) ."," .$a . "\n";

$a = intval($a);

echo 'string -> integer : ' . gettype($a) . "," .$a . "\n";

?>