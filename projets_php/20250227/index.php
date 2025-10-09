<?php
echo "G² est le plus beau";

// Alt+K to Edit
// Alt+L to Chat
/**
 * Dans PHP, tout est tableau ! 
 *      Les tableaux peuvent être indexés par des entiers ou par des chaînes de caractères.
 * 
 * Ne pas utiliser la variable $GLOBALS pour le cours
 */
?>



<!-- 
// Alt+K to Edit
// Alt+L to Chat


```

## 2.2.2. Les variables

Les variables sont des éléments qui permettent de stocker des informations. Elles sont très utiles pour stocker des données qui peuvent être modifiées ou utilisées à plusieurs endroits dans le code.

```php -->
<?php
$nom = "John";
$age = 10;
$taille = 1.80;
$estUnHomme = true;
?>

 <!-- Nommage des variables -->
<?php
$a = "bonjour";
$a_1 = "au revoir";
$_1 = "coucou";
echo $a .  $a_1 .  $_1;
?>
```
<!-- ## 2.2.3. Les tableaux
Les tableaux sont des structures de données qui permettent de stocker plusieurs valeurs dans une seule variable. Les tableaux peuvent être utilisés pour stocker des données de types différents, comme des chaînes de caractères, des nombres, des booléens, etc.

```php -->
<?php
$personnes = array("John", "Jane", "Bob");
$ages = array(30, 25, 40);
$notes = array(10, 12, 8);
?>

<!-- ## 2.2.4. Les conditions
Les conditions permettent de tester si une expression est vraie ou fausse, et d'exécuter du code en fonction du résultat du test.

```php -->
<?php
$age = 18;
if ($age >= 18) {
    echo "Vous êtes majeur.";
} else {
    echo "Vous êtes mineur.";
}
?> 
