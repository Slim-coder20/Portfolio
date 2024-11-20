
// Ajouter une Animation de Déroulement Fluide (Smooth Scroll)

document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e){
        e.preventDefault(); // empêche le comportement par defaut 

        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
    });
}); 

    //  Gestion des États Actifs en JavaScript // 

    document.addEventListener("DOMContentLoaded", function() {
        // Gestion de l'état actif en fonction de la page visitée
        const navLinks = document.querySelectorAll('.nav-links a');
        const currentLocation = window.location.href;

        navLinks.forEach(link => {
            if (link.href === currentLocation) {
                link.classList.add('active');
            }
        });

        // Gestion du menu hamburger
        const hamburger = document.querySelector('.hamburger');
        const navLinksContainer = document.querySelector('.nav-links');

        hamburger.addEventListener('click', () => {
            navLinksContainer.classList.toggle('active');
        });
    });
   
    // Menu hamburger // 
    document.addEventListener("DOMContentLoaded", function() {
        const hamburger = document.querySelector('.hamburger');
        const navLinks = document.querySelector('.nav-links');

        hamburger.addEventListener('click', () => {
            navLinks.classList.toggle('active');
        });
    });