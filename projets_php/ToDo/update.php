<?php

$pdo = new PDO('sqlite:db.sqlite');
$sql = "UPDATE tasks
set title = ?, 
    due_date = ?, 
    description = ?,
    priority = ?,
    category = ?
where id = ?";
$stmt = $pdo->prepare($sql); // stmt = statement
$stmt->execute([
    $_POST['title'],
    $_POST['due_date'],
    $_POST['description'],
    $_POST['priority'],
    $_POST['category'],
    $_POST['id']
]);

header('Location: index.php');