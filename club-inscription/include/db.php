<?php
declare(strict_types=1);

// Chemin vers le fichier sqlite
$dbPath = __DIR__ . '/../data/database.sqlite';

try {
    $db = new PDO('sqlite:' . $dbPath);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    // Activer les foreign keys
    $db->exec('PRAGMA foreign_keys = ON;');

    // Créer les tables si elles n'existent pas (sécurise l'installation)
    $db->exec("
        CREATE TABLE IF NOT EXISTS categories (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            nom TEXT NOT NULL UNIQUE
        );
    ");

    $db->exec("
        CREATE TABLE IF NOT EXISTS participants (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            nom TEXT NOT NULL,
            prenom TEXT NOT NULL,
            genre TEXT NOT NULL,
            date_naissance TEXT NULL,
            annee_naissance INTEGER NULL,
            categorie_id INTEGER NOT NULL,
            dossard INTEGER NULL UNIQUE,
            club TEXT NULL,
            nationalite TEXT NULL,
            uci TEXT NULL,
            non_partant INTEGER DEFAULT 0,
            FOREIGN KEY (categorie_id) REFERENCES categories(id) ON DELETE RESTRICT
        );
    ");

} catch (PDOException $e) {
    die("Erreur de connexion SQLite : " . htmlspecialchars($e->getMessage()));
}
