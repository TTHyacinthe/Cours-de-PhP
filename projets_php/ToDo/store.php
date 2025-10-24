<?php

$pdo = new PDO('sqlite:db.sqlite');
$sql = "INSERT INTO tasks (title, due_date, description, priority, category, created_at, completed) 
        VALUES (?,?,?,?,?,?,?)";
$stmt = $pdo->prepare($sql); // stmt = statement
$stmt->execute([
    $_POST['title'],
    $_POST['due_date'],
    $_POST['description'],
    $_POST['priority'],
    $_POST['category'],
    date('Y-m-d H:i:s'), // date et heure actuelles
    0 // par défaut, la tâche n'est pas complétée);
]);

header('Location: index.php');