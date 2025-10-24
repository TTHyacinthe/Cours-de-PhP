<?php

$pdo = new PDO('sqlite:db.sqlite');
$sql = "UPDATE tasks SET completed = 1 WHERE id = ?";
$stmt = $pdo->prepare($sql); // stmt = statement
$stmt->execute([
    $_GET['task'],
]);

header('Location: index.php');