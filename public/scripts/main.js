// // initialisation de la librairie d'animation aos
AOS.init({
    once: true,
    offset: 100,
    duration: 800,
});

// // gestion du menu mobile
const btn = document.getElementById('mobile-menu-btn');
const menu = document.getElementById('mobile-menu');

if (btn && menu) {
    btn.addEventListener('click', () => {
        menu.classList.toggle('hidden');
    });
}

// // logique d'ouverture des modales (version statique)
function openModal(modalId) {
    // // on récupère l'élément par son id (ex: 'modal-mybrickstore')
    const modal = document.getElementById(modalId);
    if (modal) {
        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden'; // // empêche le défilement du fond
    } else {
        console.error("Modale introuvable : " + modalId);
    }
}

// // logique de fermeture des modales
function closeModal(modalId) {
    const modal = document.getElementById(modalId);
    if (modal) {
        modal.classList.add('hidden');
        document.body.style.overflow = 'auto'; // // réactive le défilement
    }
}

// // fermeture de la modale avec la touche echap
document.addEventListener('keydown', function(event) {
    if (event.key === "Escape") {
        // // on cherche toutes les modales qui ne sont pas cachées
        const openModals = document.querySelectorAll('[id^="modal-"]:not(.hidden)');
        openModals.forEach(modal => {
            modal.classList.add('hidden');
            document.body.style.overflow = 'auto';
        });
    }
});