<?php

// Connexion à la base de données via PDO // 
try {
    $dsn = "mysql:host=localhost;dbname=portfolio;charset=utf8";
    $username = "root";
    $password = "root";

    // Option pour PDO 
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Activer le mode Exception pour gérer les erreurs
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // // Retourner les résultats sous forme de tableau associatif

    ];

    // Création de l'objet PDO 
    $pdo = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
    die("Erreur de connexion :" . $e->getMessage());
}

// Ajouter un projet si le formulaire est soumis // 
