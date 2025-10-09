<?php
$a="b";
$b="bonjour"."\n";
$bb="au revoir"."\n";
echo $b;
echo $$a;
echo ${$a};

echo $bb;

echo ${$a . $a};
