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

$dateNaissanceInput = $_POST['date_naissance'] ?? null;

if (!$dateNaissanceInput) {
    $_SESSION['flash'] = [
        'type' => 'error',
        'message' => "La date de naissance est obligatoire."
    ];
    header("Location: add.php");
    exit;
}

$dateNaissance = DateTime::createFromFormat('Y-m-d', $dateNaissanceInput);

if (!$dateNaissance) {
    $_SESSION['flash'] = [
        'type' => 'error',
        'message' => "Format de date invalide."
    ];
    header("Location: add.php");
    exit;
}

// Date limite = aujourd’hui - 5 ans
$limite = new DateTime('-5 years');

if ($dateNaissance > $limite) {
    $_SESSION['flash'] = [
        'type' => 'error',
        'message' => "Le participant doit avoir au moins 5 ans."
    ];
    header("Location: add.php");
    exit;
}


$dt = $dateNaissance->format('Y-m-d');
$annee_naissance = (int)$dateNaissance->format('Y');

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
        ':date_naissance'  => $dt,
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
