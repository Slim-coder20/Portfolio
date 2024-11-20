<?php
// connexion à la base de donnée via PDO et la récuparation des projets depuis la base de donnée : portfolio 

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

// Requête pour récupérer tous les projets 
try {


    $sql = "SELECT * FROM projets";
    $stmt = $pdo->query($sql); // Exécuter la requête 

    // Récupérer les résultats 

    $projets = $stmt->fetchAll();
} catch (PDOException $e) {
    die("Erreur lors de la récupération des projets : " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes Projets</title>
    <link rel="stylesheet" href="./style.css">

</head>

<body>
    <?php include 'header.php'; ?>
    <h1>Mes Projets</h1>
    <p>Voici la liste de mes projets.</p>
    <?php
    // On commence par vérifier si des projets sont présent 
    // On créé une condition : 
    if (!empty($projets)) {
        foreach ($projets as $projet) {
            echo "<div class='projet'>";
            echo "<h2>" . htmlspecialchars($projet['titre']) . "</h2>";
            echo "<p>" . htmlspecialchars($projet['description']) . "</p>";
            echo "<a href='" . htmlspecialchars($projet['lien']) . "' target='_blank'>Voir le projet</a>";
            echo "</div><hr>";
        }
    } else {
        echo "<p>Aucun projet trouvé.</p>";
    }
    ?>

</body>

</html>