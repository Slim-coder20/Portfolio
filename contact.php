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

<?php
// Charger l'autoloader généré par Composer pour pouvoir utiliser PHPMailer
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Nettoyer les données entrantes
    $nom = htmlspecialchars(trim($_POST['nom']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Vérifier que tous les champs sont remplis
    if (!empty($nom) && !empty($email) && !empty($message)) {
        // Créer une instance de PHPMailer
        $mail = new PHPMailer(true);

        try {
            // Configuration SMTP pour envoyer des emails via un serveur SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; // Remplace par l'adresse de ton serveur SMTP, par exemple smtp.gmail.com
            $mail->SMTPAuth = true;
            $mail->Username = 'slimabida21@gmail.com'; // Remplace par ton adresse email
            $mail->Password = 'nuwq cnnq sbvq wmsp'; // Remplace par ton mot de passe
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Utiliser TLS pour la sécurité
            $mail->Port = 587; // Port SMTP (587 pour TLS, 465 pour SSL)

            // Paramètres de l'email
            $mail->setFrom($email, $nom);
            $mail->addAddress('slimabida21@gmail.com'); // Remplace par l'adresse où tu veux recevoir les messages
            $mail->Subject = 'Nouveau message depuis votre portfolio';
            $mail->Body = "Nom: $nom\nEmail: $email\n\nMessage:\n$message";

            // Envoyer l'email
            $mail->send();
            echo "<p>Merci, votre message a bien été envoyé !</p>";
        } catch (Exception $e) {
            echo "<p>Erreur : Le message n'a pas pu être envoyé. Erreur de PHPMailer : {$mail->ErrorInfo}</p>";
        }
    } else {
        echo "<p>Veuillez remplir tous les champs du formulaire.</p>";
    }
}
?>
<!-- Section Formulaire-->

<body>
    <?php include 'header.php'; ?>

    <main class="contact-container">
        <h1 class="button-title">Contactez-moi</h1>
        <form action="contact.php" method="POST" class="contact-form">
            <label for="name">Nom :</label>
            <input type="text" id="nom" name="nom" required>

            <label for="email">Email :</label>
            <input type="email" id="email" name="email" required>

            <label for="message">Message :</label>
            <textarea id="message" name="message" rows="5" required></textarea>

            <button type="submit" name="submit" class="contact-button">Envoyer</button>
        </form>
    </main>

    <?php include 'footer.php'; ?>
</body>

</html>