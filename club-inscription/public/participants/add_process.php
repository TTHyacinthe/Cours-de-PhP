<?php
declare(strict_types=1);

require_once __DIR__ . '/../../include/db.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

/* ============================
   Récupération sécurisée
============================ */

$nom           = trim($_POST['nom'] ?? '');
$prenom        = trim($_POST['prenom'] ?? '');
$genre         = $_POST['genre'] ?? '';
$categorie_id  = $_POST['categorie_id'] ?? null;
$club          = trim($_POST['club'] ?? '');
$nationalite   = $_POST['nationalite'] ?? null;
$date_naissance = $_POST['date_naissance'] ?? null;
$non_partant   = isset($_POST['non_partant']) ? 1 : 0;

/* ============================
   Validation obligatoire
============================ */

if (
    $nom === '' ||
    $prenom === '' ||
    $genre === '' ||
    empty($categorie_id) ||
    empty($date_naissance)
) {
    $_SESSION['flash'] = [
        'type' => 'error',
        'message' => "Veuillez remplir tous les champs obligatoires."
    ];
    header('Location: add.php');
    exit;
}

/* ============================
   Validation date
============================ */

$dt = DateTime::createFromFormat('Y-m-d', $date_naissance);

if (!$dt) {
    $_SESSION['flash'] = [
        'type' => 'error',
        'message' => "Date de naissance invalide."
    ];
    header('Location: add.php');
    exit;
}

$annee_naissance = (int)$dt->format('Y');

/* ============================
   Insertion en base
============================ */

try {
    $stmt = $db->prepare("
        INSERT INTO participants (
            nom,
            prenom,
            genre,
            date_naissance,
            annee_naissance,
            categorie_id,
            club,
            nationalite,
            non_partant
        ) VALUES (
            :nom,
            :prenom,
            :genre,
            :date_naissance,
            :annee_naissance,
            :categorie_id,
            :club,
            :nationalite,
            :non_partant
        )
    ");

    $stmt->execute([
        ':nom'             => $nom,
        ':prenom'          => $prenom,
        ':genre'           => $genre,
        ':date_naissance'  => $date_naissance,
        ':annee_naissance' => $annee_naissance,
        ':categorie_id'    => $categorie_id,
        ':club'            => $club !== '' ? $club : null,
        ':nationalite'     => $nationalite ?: null,
        ':non_partant'     => $non_partant,
    ]);

    $_SESSION['flash'] = [
        'type' => 'success',
        'message' => "Participant ajouté avec succès."
    ];

    header('Location: list.php');
    exit;

} catch (PDOException $e) {

    $_SESSION['flash'] = [
    'type' => 'error',
    'message' => "Ce dossard est déjà attribué à un autre participant."
];
header("Location: add.php");
exit;
}
