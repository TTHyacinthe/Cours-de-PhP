<?php
// Lit le fichier "mot.txt" ligne par ligne (tout en supprimant les sauts de ligne et ignorer les lignes vides) et retourne un tableau de chaînes
$mots = file('mots.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
$titre = "
  _____               _       
 |  __ \             | |      
 | |__) |__ _ __   __| |_   _ 
 |  ___/ _ \ '_ \ / _` | | | |
 | |  |  __/ | | | (_| | |_| |
 |_|   \___|_| |_|\__,_|\__,_|
";

function dessinPendu($l)
{
    switch ($l) {
        case 7:
            return " 
    ____
   |    |      
   |    o      
   |   /|\     
   |    |
   |   / \
  _|_
 |   |______
 |          |
 |__________|
		";
            break;

        case 6:
            return "
    ____
   |    |      
   |    o      
   |   /|\     
   |    |
   |    
  _|_
 |   |______
 |          |
 |__________|
		";
            break;
        case 5:
            return "
    ____
   |    |      
   |    o      
   |    |
   |    |
   |     
  _|_
 |   |______
 |          |
 |__________|
		";
            break;
        case 4:
            return "
    ____
   |    |      
   |    o      
   |        
   |   
   |   
  _|_
 |   |______
 |          |
 |__________|
		";
            break;
        case 3:
            return "
    ____
   |    |      
   |      
   |      
   |  
   |  
  _|_
 |   |______
 |          |
 |__________|
		";
            break;
        case 2:
            return "
    ____
   |        
   |        
   |        
   |   
   |   
  _|_
 |   |______
 |          |
 |__________|
		";
            break;
        case 1:
            return "
    
   |     
   |     
   |     
   |
   |
  _|_
 |   |______
 |          |
 |__________|
		";
            break;
        case 0:
            return "
  _ _
 |   |______
 |          |
 |__________|
		";
            break;
        case 8:
            return " ";
    }

}

function jouerPendu() {
    global $mots;
    $motADeviner = $mots[array_rand($mots)];
    $lettresDevinees = [];
    $lettresErronees = [];
    $erreurs = 0;
    $maxErreurs = 8;

    echo $GLOBALS['titre'];
    echo "\n";
    echo "Bienvenue dans le jeu du pendu !\n";
    echo "Le but du jeu est de deviner un mot en proposant des lettres.\n";
    echo "Vous avez 8 essais pour trouver le mot.\n";
    while ($erreurs < $maxErreurs) {
        echo "\n";
        echo "Mot à deviner: ";

        // Affichage du mot en cours
        
        foreach (str_split($motADeviner) as $lettre) { // Divise le mot lettre par lettre en tableau
            if (in_array($lettre, $lettresDevinees)) { // Vérifie si la lettre à déjà été dévinée
                echo $lettre . " ";
            } else {
                echo "_ ";
            }
        }
        echo "\n";
        echo "\nLettres erronées : ";
        foreach ($lettresErronees as $l) { // $1 contient la lettre erronées "parcour toute les lettres erronées qui ont déjà été entrer
            echo $l . " ";
        }

        echo "\n\n";
        $lettre = readline("Devinez une lettre: ");
        $lettre = strtoupper($lettre);

        // Vérification de la validité de l'entrée

        if (strlen($lettre) !== 1 || !ctype_alpha($lettre)) { // Verifie que l'utilisateur n'entre qu'un seul caractère et doit être une lettre valide 
            echo "\n";
            echo "Veuillez entrer une seule lettre valide.\n";
            continue;
        }
        
        if (in_array($lettre, $lettresDevinees)) {
            echo "\n";
            echo "Vous avez déjà deviné cette lettre.\n";
            continue;
        }
        
        $lettresDevinees[] = $lettre;

        // Traitement de la lettre 

        if (strpos($motADeviner, $lettre) === false) { // Cherche la position de la lettre dans le mot à déviner
            $lettresErronees[] = $lettre; 
            echo dessinPendu($erreurs) . "\n";
            $erreurs++;
            echo "\n";
            echo "Désolé, la lettre " . $lettre . " ne fait pas partie du mot !\n";
            echo "\n";
            echo "Nombre d'essais : $erreurs/$maxErreurs\n";
        } else {
            echo "\n";
            echo "Bien joué!\n";
        }

        $lettresUnique = array_unique(str_split($motADeviner)); // Garde chaque lettre unique dans le mot
            // Compare les lettres dévinée avec celle du mot "compte le nombre de fois que cette lettre est présente dans le mot"
        if (count($lettresUnique) === count(array_intersect($lettresUnique, $lettresDevinees))) { 
            echo "\n";
            echo "\n" . "Félicitations! Vous avez deviné le mot: $motADeviner\n";
            return;
        }
        
    }
    echo dessinPendu($maxErreurs) . "\n";
    echo "\n";
    echo "Désolé, vous avez perdu! Le mot était : $motADeviner\n";
}

jouerPendu();
?>