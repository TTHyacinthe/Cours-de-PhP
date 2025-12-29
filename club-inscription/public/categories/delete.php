<?php
declare(strict_types=1);

require_once __DIR__ . '/../../include/db.php';
session_start();

$id = $_GET['id'] ?? null;

if (!$id) {
    $_SESSION['flash'] = [
        'type' => 'error',
        'message' => "Catégorie invalide."
    ];
    header('Location: list.php');
    exit;
}

try {
    $stmt = $db->prepare("DELETE FROM categories WHERE id = ?");
    $stmt->execute([$id]);

    if ($stmt->rowCount() === 0) {
        $_SESSION['flash'] = [
            'type' => 'error',
            'message' => "Catégorie introuvable."
        ];
    } else {
        $_SESSION['flash'] = [
            'type' => 'success',
            'message' => "Catégorie supprimée avec succès."
        ];
    }

} catch (PDOException $e) {
    // Cas : catégorie utilisée par des participants
    $_SESSION['flash'] = [
        'type' => 'error',
        'message' => "Impossible de supprimer cette catégorie : des participants y sont encore inscrits."
    ];
}

header('Location: list.php');
exit;
