<?php
if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
    $image = 'images/';
    $filename = basename($_FILES['image']['name']);
    $targetFile = $image . uniqid() . '_' . $filename;

    $allowed = ['jpg', 'jpeg', 'png', 'gif'];
    $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

    if (in_array($ext, $allowed)) {
        if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
            header("Location: index.php");
            exit();
        } else {
            echo "Erreur lors de l'envoi du fichier.";
        }
    } else {
        echo "Type de fichier non autorisé.";
    }
} else {
    echo "Aucun fichier envoyé.";
}
