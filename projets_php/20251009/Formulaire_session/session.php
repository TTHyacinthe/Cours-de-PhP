<?php
session_start();
$msg = [];
$error = false;
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];

if($_POST['nom'] === ''){
    $msg[] = "Le nom est obligatoire";
    $error = true;
}
if($_POST['prenom'] === ''){
    $msg[] = "Le prenom est obligatoire";
    $error = true;  
}

if($error === true){
    $_SESSION['msg'] = $msg;
    $_SESSION['nom'] = $_POST['nom'];
    $_SESSION['prenom'] = $_POST['prenom'];
    header('Location: formulaire.php');
    exit();
  
}

echo $_POST['nom'] . ' ' . $_POST['prenom'];


