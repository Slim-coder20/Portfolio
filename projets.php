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
    <link rel="stylesheet" href="./CSS/root.css">

</head>
<!-- Sections Projets -->

<body>
    <?php include 'header.php'; ?>

    <main class="projects-container">
        <h1 class="button-title">Mes Projets</h1>


        <div class="projects-list">
            <?php
            // Vérification s'il y a des projets présents dans la base de données
            if (!empty($projets)) {
                foreach ($projets as $projet) {
                    echo "<div class='projet-card'>";
                    echo "<h2 class='projet-title'>" . htmlspecialchars($projet['titre']) . "</h2>";
                    echo "<p class='projet-description'>" . htmlspecialchars($projet['description']) . "</p>";
                    echo "<a href='" . htmlspecialchars($projet['lien']) . "' class='projet-link' target='_blank'>Voir le projet</a>";
                    echo "</div>";
                }
            } else {
                echo "<p class='no-project'>Aucun projet trouvé.</p>";
            }
            ?>
        </div>
    </main>

    <?php include 'footer.php'; ?>
</body>