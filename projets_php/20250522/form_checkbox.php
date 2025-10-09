<?php
echo '<pre>';
// print_r($_POST);
print_r($_FILES);
echo '</pre>';
$destination = './uploads/' . $_FILES['fichier']['name'];
move_uploaded_file($_FILES['file']['tmp_name'], $destination);

header('Location : index.php');

/*pathinfo(paramètre)
  glob()
  unlink() : supprimer un fichier
   file_exist() : verifier si un fichier existe  formulaire nom, prenom, nbre d'enfant
    nom et prenom en gras, suivant le nombre d'enfant donner le nom, prenom et âge(input)
    afficher le tout*/
?>