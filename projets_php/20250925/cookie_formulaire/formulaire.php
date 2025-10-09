<?php
/**
 * @author : Hyacinthe <hyacinthetamo952@gmail.com>
 * @ia 
 */


$expiration = setcookie(mktime(0, 0, 0, 12, 31, 2029));

if (isset($_POST['couleur'])) {
    $couleur = $_POST['couleur']; 
    setcookie('couleurChoisie', $couleur, $expiration);
    $_COOKIE['couleurChoisie'] = $couleur; 
}
$couleur = isset($_COOKIE['couleurChoisie']) ? $_COOKIE['couleurChoisie'] : 'white';
echo 'votre couleur préférée est : ' . $couleur . '<br>';
echo '<body style="background-color:' . $couleur . '">';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Page Index avec Couleur</title>
</head>
<body>
    <br>
    <a href="index.php">Changer de couleur</a>
</body>
</html>
