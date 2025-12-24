<?php
require_once __DIR__ . '/../../include/db.php';

$id = $_GET['id'] ?? null;

$stmt = $db->prepare("DELETE FROM categories WHERE id = ?");
$stmt->execute([$id]);

$_SESSION['flash'] = ['type' => 'success', 'message' => "Course supprimée !"];
header("Location: list.php");
exit;

