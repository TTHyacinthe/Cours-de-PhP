<?php

$pdo = new PDO('sqlite:db.sqlite');
$sql = "delete from tasks where id = ?";
$stmt = $pdo->prepare($sql); // stmt = statement
$stmt->execute([
    $_GET['task'],
]);

header('Location: index.php');