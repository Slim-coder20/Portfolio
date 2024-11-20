<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio - Votre Nom</title>
    <link rel="stylesheet" href="./CSS/root.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&family=Poppins:wght@400&display=swap" rel="stylesheet">
</head>

<body>
    <?php include 'header.php'; ?>

    <!-- Section d'Accueil (Hero Section) -->
    <section id="home" class="hero">
        <div class="container hero-container">
            <div class="hero-content">
                <h1>Slim Abida </h1>
                <h3><span class="highlight">Devellopeur Web <Full-stack></Full-stack></span></h3>
                <p>Développeur passionné, prêt à relever de nouveaux défis et à créer des expériences utilisateur mémorables.</p>
                <div class="hero-buttons">
                    <a href="#" class="btn-download">Download CV</a>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-linkedin"></i></a>
                        <a href="#"><i class="fab fa-github"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>
            </div>
            <div class="hero-image">
                <img src="path/to/your-image.jpg" alt="Votre Image" class="rounded-image">
            </div>
        </div>
    </section>

    <!-- Section Portfolio -->
    <section id="portfolio">
        <div class="container">
            <h2 class="section-title">Mes Projets</h2>
            <div class="portfolio-grid">
                <?php
                // Connexion à la base de données et récupération des projets
                try {
                    $dsn = "mysql:host=localhost;dbname=portfolio;charset=utf8";
                    $username = "root";
                    $password = "root";
                    $pdo = new PDO($dsn, $username, $password);
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    $sql = "SELECT * FROM projets";
                    $stmt = $pdo->query($sql);
                    $projets = $stmt->fetchAll();

                    foreach ($projets as $projet) {
                        echo "<div class='portfolio-card'>";
                        echo "<div class='card-content'>";
                        echo "<h3 class='project-title'>" . htmlspecialchars($projet['titre']) . "</h3>";
                        echo "<p class='project-description'>" . htmlspecialchars($projet['description']) . "</p>";
                        if (!empty($projet['lien'])) {
                            echo "<a href='" . htmlspecialchars($projet['lien']) . "' target='_blank' class='btn-view'>Voir le projet</a>";
                        }
                        echo "</div>";
                        echo "</div>";
                    }
                } catch (PDOException $e) {
                    echo "<p>Erreur : " . $e->getMessage() . "</p>";
                }
                ?>
            </div>
        </div>
    </section>

    <!-- Section Contact -->
    <section id="contact">
        <div class="container">
            <h2 class="section-title">Contactez-moi</h2>
            <form action="contact.php" method="POST" class="contact-form">
                <label for="nom">Nom :</label>
                <input type="text" id="nom" name="nom" required>

                <label for="email">Email :</label>
                <input type="email" id="email" name="email" required>

                <label for="message">Message :</label>
                <textarea id="message" name="message" rows="5" required></textarea>

                <input type="submit" value="Envoyer" class="btn-submit">
            </form>
        </div>
    </section>

    <script src="script.js"></script>
</body>

</html>