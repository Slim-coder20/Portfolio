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

<?php include 'header.php'; ?>

<div class="services-section" id="services">
    <h2 class="button-title">Mes Services</h2>
    <div class="services-container">
        <div class="service-card">
            <i class="fas fa-code service-icon"></i>
            <h3>Développement Web</h3>
            <p>Création de sites web modernes et réactifs en utilisant les technologies les plus récentes.</p>
        </div>
        <div class="service-card">
            <i class="fas fa-paint-brush service-icon"></i>
            <h3>Design UI/UX</h3>
            <p>Conception d'interfaces utilisateur élégantes et intuitives pour des expériences mémorables.</p>
        </div>
        <div class="service-card">
            <i class="fas fa-mobile-alt service-icon"></i>
            <h3>Développement Mobile</h3>
            <p>Applications mobiles performantes pour une meilleure expérience sur iOS et Android.</p>
        </div>
    </div>
</div>

<?php include 'footer.php' ?>;