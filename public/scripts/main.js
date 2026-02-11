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
   GESTION ANIMÉE DU DECK DE PHOTOS
   ========================================= */
document.addEventListener('DOMContentLoaded', () => {
    
    // sélection de la pile
    const photoStack = document.querySelector('.photo-stack');
    let isAnimating = false; // // verrou pour éviter le spam de clics

    if (photoStack) {
        photoStack.addEventListener('click', () => {
            
            // si une animation est déjà en cours, on ne fait rien
            if (isAnimating) return;
            isAnimating = true;

            // repérage des cartes par leur classe actuelle
            const cardTop = photoStack.querySelector('.card-3'); // celle du dessus
            const cardMid = photoStack.querySelector('.card-2'); // celle du milieu
            const cardBot = photoStack.querySelector('.card-1'); // celle du dessous

            // 1. on lance l'animation de sortie sur la carte du dessus
            if (cardTop) {
                cardTop.classList.add('card-swap-out');
            }

            // 2. immédiatement, on fait monter les autres cartes (grâce à la transition css)
            if (cardMid) {
                cardMid.classList.remove('card-2');
                cardMid.classList.add('card-3'); // devient top
            }

            if (cardBot) {
                cardBot.classList.remove('card-1');
                cardBot.classList.add('card-2'); // devient milieu
            }

            // 3. une fois l'animation terminée (600ms), on nettoie
            setTimeout(() => {
                if (cardTop) {
                    // on retire l'animation de sortie
                    cardTop.classList.remove('card-swap-out');
                    // l'ancienne top devient officiellement la bottom
                    cardTop.classList.remove('card-3');
                    cardTop.classList.add('card-1');
                }
                
                // on libère le verrou
                isAnimating = false;
            }, 600); // // correspond à la durée de l'animation css
        });
    }
});

/* =========================================
   GÉNÉRATION DU FOND ANIMÉ (BLOBS ORGANIQUES)
   ========================================= */
document.addEventListener('DOMContentLoaded', () => {
    const container = document.getElementById('background-shapes');
    
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
    function typeText(element, text, speed, callback) {
        let i = 0;
        element.classList.add('typing-cursor');
        
        function type() {
            if (i < text.length) {
                element.innerHTML += text.charAt(i);
                i++;
                setTimeout(type, speed);
            } else {
                element.classList.remove('typing-cursor');
                if (callback) callback();
            }
        }
        type();
    }

    const roleElement = document.querySelector('.home-role');
    const taglineElement = document.querySelector('.home-tagline');
    const roleText = "Étudiant en 2ème année de BUT Informatique";
    const taglinePart1 = "Passionné par le développement et les solutions innovantes, je suis actuellement à la recherche d'un ";
    const taglinePart2 = "stage pour Avril 2026";
    const taglinePart3 = ".";

    if (roleElement) roleElement.innerHTML = "";
    if (taglineElement) taglineElement.innerHTML = "";

    setTimeout(() => {
        if (roleElement) {
            typeText(roleElement, roleText, 40, () => {});
        }
        if (taglineElement) {
            typeText(taglineElement, taglinePart1, 20, () => {
                const span = document.createElement('span');
                span.classList.add('highlight');
                taglineElement.appendChild(span);
                typeText(span, taglinePart2, 30, () => {
                    const tempSpan = document.createElement('span');
                    taglineElement.appendChild(tempSpan);
                    typeText(tempSpan, taglinePart3, 50, () => {});
                });
            });
        }
    }, 500);
});