// // aos animation library initialization
AOS.init({
    once: true,
    offset: 1,
    duration: 800,
});

// // mobile menu management
const btn = document.getElementById('mobile-menu-btn');
const menu = document.getElementById('mobile-menu');

if (btn && menu) {
    btn.addEventListener('click', () => {
        menu.classList.toggle('hidden');
    });
}

// // modal opening logic
function openModal(modalId) {
    const modal = document.getElementById(modalId);
    if (modal) {
        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    } else {
        console.error("Modale introuvable : " + modalId);
    }
}

// // modal closing logic
function closeModal(modalId) {
    const modal = document.getElementById(modalId);
    if (modal) {
        modal.classList.add('hidden');
        document.body.style.overflow = 'auto';
    }
}

// // close with escape key
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
   ANIMATED PHOTO DECK MANAGEMENT
   ========================================= */
document.addEventListener('DOMContentLoaded', () => {
    
    // // stack selection
    const photoStack = document.querySelector('.photo-stack');
    let isAnimating = false; // // lock to prevent spam clicking

    if (photoStack) {
        photoStack.addEventListener('click', () => {
            
            // // if animation is already running, do nothing
            if (isAnimating) return;
            isAnimating = true;

            // // identifying cards by their current class
            const cardTop = photoStack.querySelector('.card-3'); // // top one
            const cardMid = photoStack.querySelector('.card-2'); // // middle one
            const cardBot = photoStack.querySelector('.card-1'); // // bottom one

            // // 1. start exit animation on top card
            if (cardTop) {
                cardTop.classList.add('card-swap-out');
            }

            // // 2. immediately move other cards up
            if (cardMid) {
                cardMid.classList.remove('card-2');
                cardMid.classList.add('card-3'); // // becomes top
            }

            if (cardBot) {
                cardBot.classList.remove('card-1');
                cardBot.classList.add('card-2'); // // becomes middle
            }

            // // 3. cleanup after animation ends
            setTimeout(() => {
                if (cardTop) {
                    // // remove exit animation
                    cardTop.classList.remove('card-swap-out');
                    // // old top officially becomes bottom
                    cardTop.classList.remove('card-3');
                    cardTop.classList.add('card-1');
                }
                
                // // release lock
                isAnimating = false;
            }, 600); // // matches css animation duration
        });
    }

    /* =========================================
       CV PDF GENERATION (DYNAMIC HEIGHT - CROP TO CONTENT)
       ========================================= */
    const generatePdfBtn = document.getElementById('btn-generate-pdf');
    
    if (generatePdfBtn) {
        generatePdfBtn.addEventListener('click', function(e) {
            e.preventDefault();
            
            // // change button text during loading
            const originalText = generatePdfBtn.innerHTML;
            generatePdfBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Calcul hauteur...';

            // // fetch html content from about view and original css
            Promise.all([
                fetch('views/about.html').then(response => {
                    if (!response.ok) throw new Error("Erreur chargement HTML (" + response.status + ")");
                    return response.text();
                }),
                fetch('public/css/about.css').then(response => {
                    if (!response.ok) throw new Error("Erreur chargement CSS (" + response.status + ")");
                    return response.text();
                })
            ])
            .then(([html, css]) => {
                // // create temporary invisible container
                const container = document.createElement('div');
                container.id = 'cv-pdf-container';
                
                // // position under everything
                container.style.position = 'fixed';
                container.style.zIndex = '-9999';
                container.style.top = '0';
                container.style.left = '0';
                
                // // CUSTOM WIDTH (Increased from 794px A4 Standard)
                const PDF_WIDTH = 1100; 
                
                container.style.width = `${PDF_WIDTH}px`;
                container.style.height = 'auto'; // // Let content dictate height
                
                // // highly optimized css for dynamic height pdf
                const pdfStyles = `
                    <style>
                        /* // inject original css variables manually */
                        :root {
                            --color-primary: #ea580c;
                            --color-secondary: #eab308;
                            --color-dark: #1c1917;
                            --color-text-muted: #444;
                            --color-bg: #ffffff;
                        }

                        /* // inject fetched css here */
                        ${css}

                        /* =========================================
                           PDF SPECIFIC OVERRIDES
                           ========================================= */
                        
                        /* // main container reset with BACKGROUND IMAGE */
                        #cv-pdf-container {
                            background-image: url('public/images/FOND.png') !important;
                            background-size: 100% 100% !important; /* // stretch to fill container */
                            background-repeat: no-repeat !important;
                            background-position: center top !important;
                            -webkit-print-color-adjust: exact !important;
                            print-color-adjust: exact !important;
                            background-color: white !important;
                            
                            font-family: 'Inter', sans-serif;
                            color: var(--color-dark);
                            
                            /* // Padding adjusted: 40px all around (symmetric) */
                            padding: 40px 40px 40px 40px !important; 
                            box-sizing: border-box;
                            overflow: hidden;
                            display: flex;
                            flex-direction: column;
                            min-height: 0 !important; /* // Disable any min-height forcing */
                        }

                        /* // transparent backgrounds for sections */
                        .about-section { 
                            padding: 0 !important; 
                            margin: 0 !important;
                            min-height: auto !important; 
                            background: transparent !important; 
                            width: 100%;
                            flex-grow: 1;
                        }
                        
                        .container {
                            width: 100% !important;
                            max-width: 100% !important;
                            padding: 0 !important;
                            margin: 0 !important;
                        }

                        /* // HEADER: Clean & Spaced */
                        .cv-header {
                            background: rgba(255, 255, 255, 0.95) !important;
                            padding: 1.5rem !important;
                            margin-bottom: 55px !important;
                            border: 2px solid var(--color-dark) !important;
                            box-shadow: 6px 6px 0px var(--color-dark) !important;
                            display: flex !important;
                            justify-content: space-between !important;
                            border-radius: 12px !important;
                            width: 100% !important;
                            box-sizing: border-box !important;
                        }
                        .page-title { font-size: 1.8rem !important; margin: 0 !important; }
                        .cv-subtitle { font-size: 0.95rem !important; margin: 0.5rem 0 0 0 !important; }
                        .cv-contact-info { gap: 0.5rem !important; }

                        /* // GRID: Standard Layout */
                        .about-grid {
                            display: grid !important;
                            grid-template-columns: 63% 34% !important; 
                            gap: 3% !important;
                            align-items: start !important;
                            width: 100% !important;
                        }

                        /* // CARDS: Big Blocks style */
                        .about-card {
                            background: rgba(255, 255, 255, 0.95) !important;
                            padding: 2rem !important;
                            margin-bottom: 40px !important; 
                            box-shadow: 6px 6px 0px var(--color-dark) !important;
                            border: 2px solid var(--color-dark) !important;
                            border-radius: 12px !important;
                            width: 100% !important;
                            box-sizing: border-box !important;
                        }

                        /* // Remove margin from last cards to avoid bottom space */
                        .about-col-left .about-card:last-child,
                        .about-col-right .about-card:last-child {
                            margin-bottom: 0 !important;
                        }

                        .about-card-title {
                            font-size: 1.3rem !important;
                            margin-bottom: 1.2rem !important;
                            border-bottom: 2px solid #eee;
                            padding-bottom: 8px;
                        }

                        /* // ITEMS: Spaced */
                        .cv-item {
                            margin-bottom: 22px !important; 
                            padding-bottom: 12px !important;
                            border-bottom: 1px dashed #ccc !important;
                        }
                        .cv-item:last-child { margin-bottom: 0 !important; border: 0 !important; padding: 0 !important; }
                        
                        /* // RESTORE DETAILS VISIBILITY */
                        .cv-details { 
                            display: block !important; 
                            font-size: 0.85rem !important;
                            margin-top: 4px !important;
                            line-height: 1.3 !important;
                            color: var(--color-text-muted) !important;
                        }
                        
                        .cv-list { margin-top: 6px !important; padding-left: 1rem !important; }
                        .cv-list li { margin-bottom: 3px !important; font-size: 0.8rem !important; }

                        /* // OBJECTIVE BOX */
                        .objective-box { 
                            padding: 1rem !important; 
                            margin-bottom: 20px !important; 
                            font-size: 0.9rem !important; 
                            background-color: #fff7ed !important;
                            border: 2px solid var(--color-primary) !important;
                        }

                        /* // PHOTO BLOCK */
                        .profile-card-container { 
                            display: flex !important;
                            justify-content: center !important;
                            padding: 1rem !important;
                            margin-bottom: 40px !important;
                            background: white !important; 
                            border: 2px solid var(--color-dark) !important; 
                            box-shadow: 6px 6px 0px var(--color-dark) !important; 
                            border-radius: 16px !important;
                            width: 100% !important;
                            box-sizing: border-box !important;
                        }
                        
                        .profile-img-wrapper { 
                            width: 160px !important; 
                            height: 200px !important; 
                            border: 2px solid var(--color-dark) !important;
                            box-shadow: 4px 4px 0 var(--color-primary) !important; 
                        }
                        
                        /* // SKILLS */
                        .skill-category { margin-bottom: 1.2rem !important; }
                        .tags-group { gap: 6px !important; }
                        .skill-tag { 
                            font-size: 0.75rem !important; 
                            padding: 4px 8px !important;
                            background: #f5f5f4 !important;
                            border: 1px solid var(--color-dark) !important;
                        }

                        /* // SHOW TEXT */
                        .about-text { display: block !important; margin-top: 10px; font-size: 0.9rem !important; } 
                    </style>
                `;

                // // inject content
                container.innerHTML = pdfStyles + html;
                document.body.appendChild(container);

                // // remove aos attributes
                const animatedElements = container.querySelectorAll('[data-aos]');
                animatedElements.forEach(el => {
                    el.removeAttribute('data-aos');
                    el.removeAttribute('data-aos-delay');
                    el.classList.remove('aos-animate');
                    el.style.opacity = '1';
                    el.style.transform = 'none';
                    el.style.transition = 'none';
                });

                /* =========================================
                   EXACT HEIGHT CALCULATION
                   ========================================= */
                // // wait for images to load before measuring
                const images = container.getElementsByTagName('img');
                const promises = [];
                for(let img of images) {
                    if(!img.complete) {
                        promises.push(new Promise(resolve => {
                            img.onload = resolve;
                            img.onerror = resolve;
                        }));
                    }
                }

                Promise.all(promises).then(() => {
                    // // MEASURE THE EXACT RENDERED HEIGHT
                    // // offsetHeight includes padding and borders, which is what we want
                    const exactHeight = container.offsetHeight;
                    
                    console.log("Hauteur calculée du PDF : " + exactHeight + "px");

                    // // html2pdf configuration
                    const opt = {
                        margin:       0,
                        filename:     'CV_Amine_Aissyne.pdf',
                        image:        { type: 'jpeg', quality: 0.98 },
                        html2canvas:  { 
                            scale: 2, 
                            useCORS: true, 
                            scrollY: 0,
                            width: PDF_WIDTH, 
                            height: exactHeight, // // Force canvas height to match content
                            windowWidth: PDF_WIDTH,
                            windowHeight: exactHeight, // // Force window height
                            x: 0,
                            y: 0
                        },
                        // // JS PDF: Set custom format [width, height]
                        jsPDF:        { unit: 'px', format: [PDF_WIDTH, exactHeight], orientation: 'portrait' }
                    };

                    // // generate
                    html2pdf().from(container).set(opt).save().then(() => {
                        // // cleanup
                        document.body.removeChild(container);
                        generatePdfBtn.innerHTML = originalText;
                    });
                });
            })
            .catch(err => {
                console.error('Erreur PDF:', err);
                alert('Erreur génération PDF : ' + err.message);
                generatePdfBtn.innerHTML = originalText;
                const container = document.getElementById('cv-pdf-container');
                if (container) document.body.removeChild(container);
            });
        });
    }

    /* =========================================
       CONTACT FORM SUBMISSION (AJAX)
       ========================================= */
    const contactForm = document.getElementById('contactForm');
    
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            // // prevent default form submission (reload)
            e.preventDefault();
            
            // // visual feedback on button
            const btn = document.getElementById('submitBtn');
            const originalText = btn.innerHTML;
            btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Envoi...';
            btn.disabled = true;

            // // collect form data
            const formData = new FormData(this);

            // // send via fetch api
            fetch('send_mail.php', {
                method: 'POST',
                body: formData
            })
            .then(response => {
                if (response.ok) {
                    return response.text();
                }
                throw new Error('Erreur réseau');
            })
            .then(data => {
                // // success handling
                alert('Merci ! Votre message a bien été envoyé. Je vous répondrai rapidement.');
                contactForm.reset();
            })
            .catch(error => {
                // // error handling
                console.error('Erreur:', error);
                alert('Oups ! Une erreur est survenue lors de l\'envoi. Veuillez réessayer ou m\'envoyer un mail directement.');
            })
            .finally(() => {
                // // restore button state
                btn.innerHTML = originalText;
                btn.disabled = false;
            });
        });
    }

});

/* =========================================
   BACKGROUND SHAPES GENERATION
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
       TYPEWRITER ANIMATION
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