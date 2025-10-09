<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

function affiche($var1, $var2) {
echo "<tr>
         <td> $var1 </td>
         <td> $var2 </td>
      </tr>";
}

$tableau[0][0] = 2;
$tableau[0][1] = 4;
$tableau[1][0] = 6;
$tableau[1][1] = 8;
$tableau[2][0] = 10;
$tableau[2][1] = 12;

echo "<table border='1' width='33%'>";
affiche ($tableau[0][0], $tableau[0][1]);
affiche ($tableau[1][0], $tableau[1][1]);
affiche ($tableau[2][0], $tableau[2][1]);
echo "</table>";

?>
</body>
</html>