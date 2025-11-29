<?php

try {
    /**
     * connect to the database sqlite
     */
$pdo = new PDO('sqlite:db.sqlite');
$sql = "SELECT * from tasks order by id desc, completed asc";
$stmt = $pdo->prepare($sql); // stmt = statement
$stmt->execute();
$tasks = $stmt->fetchAll(PDO::FETCH_ASSOC); // fetchAll = récupérer toutes les lignes
// echo "<pre>";
// var_dump($tasks);
// echo "</pre>";
}catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}