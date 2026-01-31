<section class="project-page">
    
    <div class="container">
        
        <div style="margin-bottom: 2rem;">
            <a href="index.php?page=projects" class="back-link">
                <i class="fas fa-arrow-left"></i> Retour aux projets
            </a>
        </div>

        <div class="project-grid-layout">
            
            <div class="layout-main">
                
                <div class="block-header" data-aos="fade-up">
                    <h1 class="header-title">Blocus.io</h1>
                    <div class="header-meta">
                        <span class="meta-pill"><i class="far fa-clock"></i> 2 semaines</span>
                        <span class="meta-pill"><i class="far fa-calendar-alt"></i> 2025</span>
                    </div>
                </div>

                <div class="block-description" data-aos="fade-up" data-aos-delay="100">
                    <h2>Description du Projet</h2>
                    <p>
                        <strong>Le concept :</strong> Un jeu de stratégie au tour par tour inspiré d'Isola. L'objectif est de coincer l'adversaire en déplaçant son pion et en condamnant des cases du plateau pour restreindre l'espace de jeu.
                    </p>
                    <p>
                        Développé entièrement en <strong>C (norme C89)</strong>, ce projet implémente une interface graphique complète via la bibliothèque <code>libgraph</code>. Il gère des parties sur des grilles de taille variable (3x3 à 9x9), incluant des thèmes graphiques (clair/sombre) et des animations de sprites.
                    </p>
                    <p>
                        En tant que développeur, j'ai structuré l'application autour de modules distincts (moteur de jeu, gestionnaire de menus, logique d'IA) pour assurer la maintenabilité et la fluidité des interactions souris.
                    </p>
                    
                    <h2 style="margin-top: 2rem;">Challenge Technique</h2>
                    <p>
                        La principale difficulté a été de concevoir une boucle de jeu réactive en C pur, gérant à la fois la logique des tours (déplacement puis condamnation), la détection de victoire par blocage, et l'intégration d'une IA ("Robot") capable de jouer des coups valides aléatoires.
                    </p>
                </div>

                <div class="bottom-row">
                    
                    <div class="block-tools" data-aos="fade-up" data-aos-delay="200">
                        <h3>Outils & Langages</h3>
                        <ul class="tools-list">
                            <li><i class="fas fa-microchip"></i> Langage C89</li>
                            <li><i class="fas fa-desktop"></i> Libgraph</li>
                            <li><i class="fas fa-file-code"></i> Makefile</li>
                        </ul>
                    </div>

                    <div class="block-images" data-aos="fade-up" data-aos-delay="300">
                        <div class="slider-container">
                            
                            <div class="mySlides fade">
                                <div class="numbertext">1 / 8</div>
                                <img src="public/images/Blocus/game.png" style="width:100%" alt="Plateau de Jeu">
                            </div>

                            <div class="mySlides fade">
                                <div class="numbertext">2 / 8</div>
                                <img src="public/images/Blocus/map.png" style="width:100%" alt="Menu Sombre">
                            </div>

                            <div class="mySlides fade">
                                <div class="numbertext">3 / 8</div>
                                <img src="public/images/Blocus/menu_sombre.png" style="width:100%" alt="Menu Sombre">
                            </div>

                            <div class="mySlides fade">
                                <div class="numbertext">4 / 8</div>
                                <img src="public/images/Blocus/menu.png" style="width:100%" alt="Menu Sombre">
                            </div>

                            <div class="mySlides fade">
                                <div class="numbertext">5 / 8</div>
                                <img src="public/images/Blocus/partie.png" style="width:100%" alt="Menu Sombre">
                            </div>

                            <div class="mySlides fade">
                                <div class="numbertext">6 / 8</div>
                                <img src="public/images/Blocus/podium.png" style="width:100%" alt="Menu Sombre">
                            </div>

                            <div class="mySlides fade">
                                <div class="numbertext">7 / 8</div>
                                <img src="public/images/Blocus/reglage.png" style="width:100%" alt="Menu Sombre">
                            </div>

                            <div class="mySlides fade">
                                <div class="numbertext">8 / 8</div>
                                <img src="public/images/Blocus/regle.png" style="width:100%" alt="Menu Sombre">
                            </div>

                            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                            <a class="next" onclick="plusSlides(1)">&#10095;</a>
                            
                        </div>
                    </div>

                </div>
            </div>

            <div class="layout-sidebar">
                
                <div class="block-video" data-aos="fade-left">
                    <div class="video-placeholder">
                        <i class="fas fa-play-circle"></i>
                        <p>Démonstration du Gameplay</p>
                    </div>
                </div>

                <div class="block-actions" data-aos="fade-left" data-aos-delay="100">
                    
                    <a href="https://github.com/aamminnee/Blocus.io" target="_blank" class="action-btn btn-code">
                        <i class="fab fa-github"></i> Voir le code
                    </a>

                    <a href="https://github.com/aamminnee/Blocus.io/archive/refs/heads/main.zip" class="action-btn btn-download">
                        <i class="fas fa-download"></i> Télécharger le zip
                    </a>

                    <a href="public/divers/rapport_blocus.pdf" target="_blank" class="action-btn btn-doc">
                        <i class="fas fa-book"></i> Lire le Rapport
                    </a>

                    <a href="#" class="action-btn btn-access" onclick="alert('Application de bureau (non web)'); return false;">
                        <i class="fas fa-desktop"></i> Exécutable
                    </a>

                </div>

            </div>

        </div>
    </div>
</section>