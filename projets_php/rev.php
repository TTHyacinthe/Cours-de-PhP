<?php
$tableau = array(2, 4, 6, 8, "chien", 'chat', 10);

list($a, $b, $c, $d) = $tableau;

echo $a . $b . $c . $d;


reset($tableau);

list($key, $value) = each($tableau);

echo 'clef : ' . $key . ' value : ' . $value;


$value = current($tableau);

echo 'value : ' . $value;

?>