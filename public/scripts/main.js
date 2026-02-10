// initialisation de la librairie d'animation aos
AOS.init({
    once: true,
    offset: 1,
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
    
    // on ne lance l'animation des blobs que si le conteneur existe
    if (container) {
        const colors = [
            'rgb(216, 69, 24)', 
            'rgb(255, 251, 32)', 
            '#ff9100', 
            '#ff9100', 
        ];

        const numShapes = 12;

        for (let i = 0; i < numShapes; i++) {
            const shape = document.createElement('div');
            shape.classList.add('shape');

            const size = Math.floor(Math.random() * 200) + 100;
            shape.style.width = `${size}px`;
            shape.style.height = `${size}px`;

            const r1 = Math.floor(Math.random() * 40) + 30;
            const r2 = Math.floor(Math.random() * 40) + 30;
            const r3 = Math.floor(Math.random() * 40) + 30;
            const r4 = Math.floor(Math.random() * 40) + 30;
            shape.style.borderRadius = `${r1}% ${100-r1}% ${r2}% ${100-r2}% / ${r3}% ${r4}% ${100-r4}% ${100-r3}%`;

            shape.style.left = `${Math.random() * 90}%`;
            shape.style.top = `${Math.random() * 90}%`;

            shape.style.backgroundColor = colors[Math.floor(Math.random() * colors.length)];

            const duration = Math.floor(Math.random() * 20) + 20;
            shape.style.animationDuration = `${duration}s`;
            shape.style.animationDelay = `-${Math.random() * 20}s`;

            container.appendChild(shape);
        }
    }

    /* =========================================
       ANIMATION TYPEWRITER (MACHINE À ÉCRIRE)
       ========================================= */
    
    // fonction générique pour écrire du texte
    function typeText(element, text, speed, callback) {
        let i = 0;
        element.classList.add('typing-cursor'); // ajoute le curseur
        
        function type() {
            if (i < text.length) {
                element.innerHTML += text.charAt(i);
                i++;
                setTimeout(type, speed);
            } else {
                element.classList.remove('typing-cursor'); // retire le curseur à la fin
                if (callback) callback();
            }
        }
        type();
    }

    // ciblage des éléments
    const roleElement = document.querySelector('.home-role');
    const taglineElement = document.querySelector('.home-tagline');

    // textes à écrire
    const roleText = "Étudiant en 2ème année de BUT Informatique";
    
    // tagline découpée
    const taglinePart1 = "Passionné par le développement et les solutions innovantes, je suis actuellement à la recherche d'un ";
    const taglinePart2 = "stage pour Avril 2026";
    const taglinePart3 = ".";

    // on vide les contenus avant de commencer
    if (roleElement) roleElement.innerHTML = "";
    if (taglineElement) taglineElement.innerHTML = "";

    // on lance les animations après un court délai
    setTimeout(() => {
        
        // 1. lancement de l'animation du rôle en parallèle
        if (roleElement) {
            typeText(roleElement, roleText, 40, () => {
                // callback fin du rôle si besoin
            });
        }

        // 2. lancement de l'animation de la tagline en parallèle
        if (taglineElement) {
            typeText(taglineElement, taglinePart1, 20, () => {
                
                // création et ajout du span pour le highlight
                const span = document.createElement('span');
                span.classList.add('highlight');
                taglineElement.appendChild(span);

                // écriture à l'intérieur du span
                typeText(span, taglinePart2, 30, () => {
                    
                    // le point final (hors du span)
                    const tempSpan = document.createElement('span');
                    taglineElement.appendChild(tempSpan);
                    
                    typeText(tempSpan, taglinePart3, 50, () => {
                        // fin de l'animation
                    });
                });
            });
        }

    }, 500); // délai de départ commun pour les deux textes
});