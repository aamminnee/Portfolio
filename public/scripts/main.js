// initialisation de la librairie d'animation aos
AOS.init({
    once: true,
    offset: 100,
    duration: 800,
});

// gestion du menu mobile
const btn = document.getElementById('mobile-menu-btn');
const menu = document.getElementById('mobile-menu');

if (btn && menu) {
    btn.addEventListener('click', () => {
        menu.classList.toggle('hidden');
    });
}

// logique d'ouverture des modales
function openModal(modalId) {
    const modal = document.getElementById(modalId);
    if (modal) {
        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    } else {
        console.error("Modale introuvable : " + modalId);
    }
}

// logique de fermeture des modales
function closeModal(modalId) {
    const modal = document.getElementById(modalId);
    if (modal) {
        modal.classList.add('hidden');
        document.body.style.overflow = 'auto';
    }
}

// fermeture avec echap
document.addEventListener('keydown', function(event) {
    if (event.key === "Escape") {
        const openModals = document.querySelectorAll('[id^="modal-"]:not(.hidden)');
        openModals.forEach(modal => {
            modal.classList.add('hidden');
            document.body.style.overflow = 'auto';
        });
    }
});

/* =========================================
   GÉNÉRATION DU FOND ANIMÉ (BLOBS ORGANIQUES)
   ========================================= */
document.addEventListener('DOMContentLoaded', () => {
    const container = document.getElementById('background-shapes');
    if (!container) return;

    // liste des couleurs (doit correspondre au css)
    // palette : orange, jaune, gris, noir
    const colors = [
        '#ea0c0cff', // var(--color-primary) - orange
        '#d3ea08ff', 
        '#494949', // var(--color-text-muted) - gris
    ];

    const numShapes = 12; // nombre de formes

    for (let i = 0; i < numShapes; i++) {
        const shape = document.createElement('div');
        shape.classList.add('shape');

        // taille aléatoire
        const size = Math.floor(Math.random() * 200) + 100;
        shape.style.width = `${size}px`;
        shape.style.height = `${size}px`;

        // forme "blob" aléatoire
        const r1 = Math.floor(Math.random() * 40) + 30;
        const r2 = Math.floor(Math.random() * 40) + 30;
        const r3 = Math.floor(Math.random() * 40) + 30;
        const r4 = Math.floor(Math.random() * 40) + 30;
        shape.style.borderRadius = `${r1}% ${100-r1}% ${r2}% ${100-r2}% / ${r3}% ${r4}% ${100-r4}% ${100-r3}%`;

        // position aléatoire
        shape.style.left = `${Math.random() * 90}%`;
        shape.style.top = `${Math.random() * 90}%`;

        // couleur aléatoire (c'est ici que la magie opère)
        shape.style.backgroundColor = colors[Math.floor(Math.random() * colors.length)];

        // opacité
        shape.style.opacity = (Math.random() * 0.4 + 0.05).toFixed(2);

        // animation
        const duration = Math.floor(Math.random() * 20) + 20;
        shape.style.animationDuration = `${duration}s`;
        shape.style.animationDelay = `-${Math.random() * 20}s`;

        container.appendChild(shape);
    }
});