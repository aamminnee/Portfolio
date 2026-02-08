<?php

/**
 * retrieves the complete list of projects and their associated data.
 * acts as a central database for the portfolio.
 *
 * @return array array of associative arrays, where each key is a project identifier.
 */
function getProjectsData() {
    return [
        // --- PROJECT 1 : BANKING APPLICATION ---
        'app_bancaire' => [
            'title' => 'Gestion de Remises Bancaires',
            'category' => 'Développement Web',
            'date' => '2025',
            'duration' => '1 Mois',
            'style_color' => 'primary',
            
            'description' => '
                <h2 style="margin-top: 2rem;">Le Concept</h2>
                <p>
                    Une plateforme web sécurisée de gestion de trésorerie conçue selon les principes de la méthodologie Agile. Elle permet de suivre les remises de chèques et de cartes bancaires avec une distinction claire des rôles utilisateurs.
                </p>
                <p>
                    Ce projet universitaire (BUT 2) met l\'accent sur la qualité de développement. L\'application offre trois interfaces distinctes : un tableau de bord <strong>Client</strong> pour le suivi des transactions et des impayés, une vue <strong>Product Owner</strong> pour l\'analyse globale avec graphiques statistiques, et une interface <strong>Admin</strong> pour la gestion des comptes.
                </p>
                <p>
                    En tant que <strong>Développeur Fullstack</strong> au sein d\'une équipe Agile, j\'ai contribué à l\'architecture MVC native en PHP, à la mise en place du système d\'authentification sécurisé et à l\'intégration des fonctionnalités d\'export de données.
                </p>
                <h2 style="margin-top: 2rem;">Challenge Technique</h2>
                <p>
                    Le défi principal consistait à implémenter une gestion fine des droits utilisateurs (ACL) sans framework, tout en assurant la sécurité (blocage après 3 tentatives de connexion). Il a également fallu intégrer des outils de visualisation de données (graphiques camembert/courbes) et permettre l\'exportation dynamique des transactions en formats CSV, XLS et PDF.
                </p>',

            'tags' => [
                'PHP',
                'JavaScript (Charts)',
                'CSS3 / HTML5',
                'Méthode Agile'
            ],

            'video' => 'public/images/Banque/app_bancaire_video.mp4',
            'gallery' => [], 

            'links' => [
                'github' => 'https://github.com/tayoken/qualitededevbut2',
                'download' => 'https://github.com/tayoken/qualitededevbut2/archive/refs/heads/main.zip',
                'doc' => '#', 
                'access' => '' 
            ]
        ],

        // --- PROJECT 2 : BLOCUS.IO ---
        'blocus' => [
            'title' => 'Blocus.io',
            'category' => 'Logiciel & Jeux',
            'date' => '2024',
            'duration' => '2 semaines',
            'style_color' => 'secondary',
            
            'description' => '
                <h2 style="margin-top: 2rem;">Le Concept</h2>
                <p>
                    Un jeu de stratégie au tour par tour inspiré d\'Isola. L\'objectif est de coincer l\'adversaire en déplaçant son pion et en condamnant des cases du plateau pour restreindre l\'espace de jeu.
                </p>
                <p>
                    Développé entièrement en <strong>C (norme C89)</strong>, ce projet implémente une interface graphique complète via la bibliothèque <code>libgraph</code>. Il gère des parties sur des grilles de taille variable (3x3 à 9x9), incluant des thèmes graphiques (clair/sombre) et des animations de sprites.
                </p>
                <p>
                    En tant que développeur, j\'ai structuré l\'application autour de modules distincts (moteur de jeu, gestionnaire de menus, logique d\'IA) pour assurer la maintenabilité et la fluidité des interactions souris.
                </p>
                <h2 style="margin-top: 2rem;">Challenge Technique</h2>
                <p>
                    La principale difficulté a été de concevoir une boucle de jeu réactive en C pur, gérant à la fois la logique des tours (déplacement puis condamnation), la détection de victoire par blocage, et l\'intégration d\'une IA ("Robot") capable de jouer des coups valides aléatoires.
                </p>',

            'tags' => [
                'Langage C89',
                'Libgraph',
                'Makefile'
            ],

            'video' => 'public/videos/votre-video.mp4', 

            'gallery' => [
                'public/images/Blocus/game.png',
                'public/images/Blocus/map.png',
                'public/images/Blocus/menu_sombre.png',
                'public/images/Blocus/menu.png',
                'public/images/Blocus/partie.png',
                'public/images/Blocus/podium.png',
                'public/images/Blocus/reglage.png',
                'public/images/Blocus/regle.png'
            ],

            'links' => [
                'github' => 'https://github.com/aamminnee/Blocus.io',
                'download' => 'https://github.com/aamminnee/Blocus.io/archive/refs/heads/main.zip',
                'doc' => 'public/divers/rapport_blocus.pdf',
                'access' => '' 
            ]
        ],

        // --- PROJECT 3 : BUCKSHOT ROULETTE ---
        'buckshot_roulette' => [
            'title' => 'Buckshot Roulette',
            'category' => 'Jeu Stratégie',
            'date' => '2023',
            'duration' => '2 mois',
            'style_color' => 'primary', 

            'description' => '
                <h2 style="margin-top: 2rem;">Le Concept</h2>
                <p>
                    Une adaptation fidèle en 2D du célèbre jeu de roulette russe stratégique. Deux joueurs s\'affrontent dans un duel psychologique où chaque décision peut être fatale. Le jeu se déroule en 3 manches, avec un système de santé visuel et une gestion de chargeur aléatoire.
                </p>
                <p>
                    Développé entièrement en <strong>Python</strong>, ce projet utilise la bibliothèque <strong>Pygame</strong> pour le rendu graphique et sonore. Le moteur gère la physique simplifiée des tirs, les animations de fumée, et une interface utilisateur interactive incluant la saisie de pseudonymes sur un "contrat".
                </p>
                <h2 style="margin-top: 2rem;">Challenge Technique</h2>
                <p>
                    Le défi majeur a été la création d\'un système de recharge dynamique et équitable : l\'algorithme génère aléatoirement un nombre de munitions (entre 2 et 8) et répartit les balles réelles et à blanc de manière stratégique avant de mélanger le chargeur. La synchronisation des animations de tir avec les effets sonores et la mise à jour en temps réel de l\'état des joueurs a également nécessité une gestion précise des timers.
                </p>',

            'tags' => [
                'Python 3',
                'Pygame',
                'Pygame Mixer',
                'VS Code'
            ],

            'video' => 'public/images/Buckshot_Roulette/BuckShotRoulette.webm',

            'gallery' => [
                'public/images/Buckshot_Roulette/menu.png',
                'public/images/Buckshot_Roulette/regle.png',
                'public/images/Buckshot_Roulette/pseudo.png',
                'public/images/Buckshot_Roulette/manche1.png',
                'public/images/Buckshot_Roulette/manche_fini.png',
                'public/images/Buckshot_Roulette/partie.png',
                'public/images/Buckshot_Roulette/classement.png'
            ],

            'links' => [
                'github' => 'https://github.com/aamminnee/Buckshot-Roulette-2D',
                'download' => 'https://github.com/aamminnee/Buckshot-Roulette-2D/archive/refs/heads/master.zip',
                'doc' => 'public/divers/rapport_buckshot_roulette.pdf',
                'access' => ''
            ]
        ],

        // --- PROJECT 4 : HORSE RACING CLI ---
        'chevaux' => [
            'title' => 'Course de Chevaux CLI',
            'category' => 'Jeu CLI & Multithreading',
            'date' => '2026',
            'duration' => '2 mois',
            'style_color' => 'secondary',

            'description' => '
                <h2 style="margin-top: 2rem;">Le Concept</h2>
                <p>
                    Un jeu multijoueur dynamique en ligne de commande (CLI) simulant une course hippique. Deux joueurs s\'affrontent en temps réel sur le même clavier, devant marteler leur touche assignée pour faire avancer leur cheval vers la ligne d\'arrivée.
                </p>
                <p>
                    Développé en <strong>Python</strong>, le projet utilise la programmation parallèle pour gérer les joueurs simultanément. Le jeu propose plusieurs environnements (de "Plaine" à "Route Arc-en-ciel") et intègre une interface colorée grâce à la bibliothèque <strong>Colorama</strong> pour une expérience visuelle immersive dans le terminal.
                </p>
                <p>
                    Le système gère la configuration des joueurs (validation des pseudos, attribution des touches), un compte à rebours synchronisé et l\'affichage en temps réel de la progression (en mètres) jusqu\'à la victoire.
                </p>
                <h2 style="margin-top: 2rem;">Challenge Technique</h2>
                <p>
                    Le défi majeur a été l\'implémentation du <strong>Multithreading</strong> (via la classe `Thread`) pour permettre aux deux joueurs d\'agir exactement en même temps sans bloquer le programme. La gestion des événements clavier via la bibliothèque `keyboard` a également nécessité une logique précise pour détecter les frappes sans latence.
                </p>',

            'tags' => [
                'Python 3',
                'Multithreading',
                'Keyboard Events'
            ],

            'video' => 'public/videos/votre-video.mp4',

            'gallery' => [
                'public/images/Course/menu.png',
                'public/images/Course/regle.png',
                'public/images/Course/j1.png',
                'public/images/Course/j2.png',
                'public/images/Course/parcours.png',
                'public/images/Course/course.png',
                'public/images/Course/podium.png'
            ],

            'links' => [
                'github' => 'https://github.com/aamminnee/course-chevaux',
                'download' => 'https://github.com/aamminnee/course-chevaux/archive/refs/heads/master.zip',
                'doc' => '#',
                'access' => ''
            ]
        ],

        // --- PROJECT 5 : DUAL BOOT INSTALLATION ---
        'dual_boot' => [
            'title' => 'Installation Dual Boot',
            'category' => 'Système & Réseau',
            'date' => '2024',
            'duration' => '1 semaines',
            'style_color' => 'primary',

            'description' => '
                <h2 style="margin-top: 2rem;">Le Concept</h2>
                <p>
                    Le déploiement complet d\'un poste de travail polyvalent hébergeant deux systèmes d\'exploitation distincts, Windows 7 Entreprise et ArchLinux, sur une même infrastructure virtualisée (QEMU).
                </p>
                <p>
                    Ce projet technique (SAE S1.03) visait à maîtriser les couches basses du système. Il a impliqué le partitionnement manuel des disques (GPT), l\'installation d\'un chargeur d\'amorçage unifié (GRUB) et la configuration réseau avancée pour garantir la cohabitation stable des deux environnements.
                </p>
                <p>
                    En tant que <strong>Administrateur Système</strong> (en binôme), j\'ai réalisé l\'installation "from scratch" d\'ArchLinux en ligne de commande, la gestion des pilotes virtuels (Red Hat VirtIO) et la sécurisation des comptes utilisateurs.
                </p>
                <h2 style="margin-top: 2rem;">Challenge Technique</h2>
                <p>
                    La principale difficulté a été de configurer le <strong>Dual Boot en mode UEFI</strong>. Il a fallu manipuler manuellement les partitions avec <code>cgdisk</code> pour éviter la perte de données et paramétrer finement GRUB (avec <code>os-prober</code>) pour qu\'il détecte correctement le gestionnaire de démarrage Windows. L\'installation de périphériques comme une imprimante réseau via le protocole TCP/IP a également demandé une configuration précise.
                </p>',

            'tags' => [
                'ArchLinux (Bash)',
                'Windows 7 Ent.',
                'Partitionnement',
                'GRUB / UEFI',
                'QEMU / KVM',
                'CUPS (Impression)'
            ],

            'video' => '', 
            'gallery' => [], 

            'links' => [
                'github' => '', 
                'download' => 'public/divers/rapport_dual_boot.pdf',
                'doc' => 'public/divers/rapport_dual_boot.pdf',
                'access' => ''
            ]
        ],

        // --- PROJECT 6 : NIM GAME AI ---
        'IA' => [
            'title' => 'IA Jeu de NIM',
            'category' => 'Intelligence Artificielle',
            'date' => '2023',
            'duration' => '2 semaines',
            'style_color' => 'secondary',

            'description' => '
                <h2 style="margin-top: 2rem;">Le Concept</h2>
                <p>
                    Une Intelligence Artificielle conçue pour apprendre les règles et les stratégies gagnantes du Jeu de NIM (version 8 bâtons) grâce à l\'<strong>apprentissage par renforcement</strong>. L\'IA commence sans aucune connaissance et s\'améliore en s\'affrontant elle-même.
                </p>
                <p>
                    Développé en <strong>Python</strong>, le projet simule des milliers de parties. À chaque fin de tour, les décisions menant à une victoire sont récompensées (augmentation du poids de l\'action), tandis que les erreurs sont punies (diminution du poids), permettant à l\'IA de "résoudre" mathématiquement le jeu.
                </p>
                <p>
                    Le système repose sur un moteur d\'apprentissage pondéré où chaque état du plateau (nombre de bâtons restants) possède ses propres probabilités de décision, évoluant dynamiquement au fil des simulations.
                </p>
                <h2 style="margin-top: 2rem;">Challenge Technique</h2>
                <p>
                    Le défi majeur a été de mettre en place une logique de pondération robuste pour éviter que les probabilités ne tombent à zéro (sécurité des poids minimaux) et d\'assurer que l\'IA puisse explorer toutes les combinaisons possibles avant de converger vers la stratégie optimale de retrait des bâtons.
                </p>',

            'tags' => [
                'Python 3',
                'Reinforcement Learning',
                'CLI Simulation'
            ],

            'video' => '', 

            'gallery' => [
                'public/images/IA/simulation.png',
                'public/images/IA/resultat.png'
            ],

            'links' => [
                'github' => 'https://github.com/aamminnee/ia_nim',
                'download' => 'https://github.com/aamminnee/ia_nim/archive/refs/heads/master.zip',
                'doc' => '#',
                'access' => ''
            ]
        ],

        // --- PROJECT 7 : IMG2BRICK ---
        'img2brick' => [
            'title' => 'Img2Brick',
            'category' => 'Développement Web',
            'date' => '2024 - 2025',
            'duration' => '2 Mois',
            'style_color' => 'primary', 

            'description' => '
                <h2 style="margin-top: 2rem;">Le Concept</h2>
                <p>
                    Offrir une plateforme web intuitive permettant aux utilisateurs de transformer leurs photos personnelles en modèles de mosaïques composés de briques de type LEGO®.
                </p>
                <p>
                    Img2Brick repose sur une architecture MVC robuste. Le système gère l\'ensemble du tunnel de conversion : du téléchargement de l\'image originale au recadrage personnalisé, jusqu\'à la génération d\'un aperçu fidèle utilisant une palette de couleurs spécifique.
                </p>
                <p>
                    En tant que <strong>Développeur Principal</strong>, j\'ai conçu l\'intégralité de la logique backend en PHP, incluant la gestion sécurisée des utilisateurs, le traitement des images via GD et l\'intégration de services tiers comme l\'envoi de mails transactionnels.
                </p>
                <h2 style="margin-top: 2rem;">Challenge Technique</h2>
                <p>
                    Le défi majeur a été de synchroniser le traitement d\'image côté serveur avec une interface utilisateur fluide. L\'implémentation d\'outils de manipulation d\'images (crop, filtres) et la gestion d\'une base de données complexe pour le suivi des commandes ont nécessité une optimisation précise du code PHP et SQL.
                </p>',

            'tags' => [
                'PHP 8.2 (MVC)',
                'JavaScript (Ajax)',
                'MySQL',
                'PHPMailer',
                'CSS3 (Responsive)'
            ],

            'video' => 'public/images/Img2brick/img2brick.webm',

            'gallery' => [], 

            'links' => [
                'github' => 'https://github.com/aamminnee/img2brick/',
                'download' => 'https://github.com/aamminnee/img2brick/archive/refs/heads/master.zip',
                'doc' => 'public/divers/rapport_img2brick.pdf', 
                'access' => 'https://aissyne.alwaysdata.net/img2brick/views/images_views.php/'
            ]
        ],

        // --- PROJECT 8 : TIC-TAC-TOE ---
        'morpion' => [
            'title' => 'Morpion',
            'category' => 'Jeu CLI',
            'date' => '2024',
            'duration' => '1 jour',
            'style_color' => 'secondary', 

            'description' => '
                <h2 style="margin-top: 2rem;">Le Concept</h2>
                <p>
                    Une implémentation classique du jeu de Morpion (Tic-Tac-Toe) jouable en ligne de commande. Le jeu oppose deux joueurs qui s\'affrontent sur une grille de 3x3 pour aligner trois symboles identiques.
                </p>
                <p>
                    Développé entièrement en <strong>Python</strong>, ce projet met en œuvre une logique de jeu robuste incluant la gestion des tours, la vérification des conditions de victoire (lignes, colonnes et diagonales) et la gestion des matchs nuls.
                </p>
                <p>
                    En tant que développeur, j\'ai structuré l\'application de manière fonctionnelle avec des procédures dédiées pour le dessin de la grille, la validation des coordonnées saisies par les utilisateurs et la réinitialisation de la partie.
                </p>
                <h2 style="margin-top: 2rem;">Challenge Technique</h2>
                <p>
                    La principale difficulté a été de concevoir un système de vérification efficace capable de scanner la grille après chaque coup pour détecter instantanément un gagnant ou une égalité, tout en assurant une interface utilisateur claire via le terminal.
                </p>',

            'tags' => [
                'Python 3',
                'CLI (Interface Ligne de Commande)',
                'Scripting'
            ],

            'video' => 'public/images/Morpion/Morpion.webm',

            'gallery' => [
                'public/images/Morpion/map.png',
                'public/images/Morpion/partie.png',
                'public/images/Morpion/exes.png',
                'public/images/Morpion/fin.png'
            ],

            'links' => [
                'github' => 'https://github.com/aamminnee/morpion',
                'download' => 'https://github.com/aamminnee/morpion/archive/refs/heads/main.zip',
                'doc' => 'public/divers/rapport_morpion.pdf',
                'access' => '' 
            ]
        ],

        // --- PROJECT 9 : SAME-GAME ---
        'same_game' => [
            'title' => 'Same-Game (Color Crush)',
            'category' => 'Logiciel & Jeux',
            'date' => '2025',
            'duration' => '3 semaines',
            'style_color' => 'primary', 

            'description' => '
                <h2 style="margin-top: 2rem;">Le Concept</h2>
                <p>
                    jeu de réflexion et d\'élimination de blocs colorés inspiré du "SameGame" classique. L\'objectif est de vider le plateau en cliquant sur des groupes de blocs adjacents de même couleur pour accumuler le maximum de points.
                </p>
                <p>
                    Développé en <strong>Java</strong>, ce projet repose sur l\'utilisation intensive de la bibliothèque <strong>Swing</strong> pour l\'interface graphique. Il propose plusieurs modes de jeu, dont une génération de grille aléatoire et le chargement de niveaux spécifiques à partir de fichiers.
                </p>
                <p>
                    L\'application suit une architecture <strong>MVC (Modèle-Vue-Contrôleur)</strong> rigoureuse pour séparer la logique métier (gestion de la grille et des scores) de l\'affichage graphique. J\'ai implémenté des fonctionnalités de navigation complètes incluant un menu principal, un écran de règles et une gestion de fin de partie.
                </p>
                <h2 style="margin-top: 2rem;">Challenge Technique</h2>
                <p>
                    Le défi principal a résidé dans l\'implémentation de l\'algorithme de détection de groupes et la gestion de la gravité des blocs. Lorsqu\'un groupe est supprimé, les blocs restants doivent tomber pour combler les vides, et les colonnes vides doivent se décaler, ce qui nécessite une manipulation précise de tableaux à deux dimensions. La gestion des événements souris pour assurer une interaction fluide sur des grilles dynamiques a également été un point clé du développement.
                </p>',

            'tags' => [
                'Java (JDK)',
                'Java Swing / AWT',
                'Makefile'
            ],

            'video' => 'public/videos/votre-video.mp4',

            'gallery' => [
                'public/images/Same_Game/menu.png',
                'public/images/Same_Game/menu2.png',
                'public/images/Same_Game/regle.png',
                'public/images/Same_Game/map.png',
                'public/images/Same_Game/partie.png',
                'public/images/Same_Game/charger.png',
                'public/images/Same_Game/fin.png'
            ],

            'links' => [
                'github' => 'https://github.com/aamminnee/Same-Game',
                'download' => 'https://github.com/aamminnee/Same-Game/archive/refs/heads/main.zip',
                'doc' => 'public/divers/Raport_SAE21_2024.pdf',
                'access' => '' 
            ]
        ],

        // --- PROJECT 10 : SERIES FORUM ---
        'series' => [
            'title' => 'Forum Critique Séries',
            'category' => 'Développement Web',
            'date' => '2025',
            'duration' => '2 semaines',
            'style_color' => 'secondary', 

            'description' => '
                <h2 style="margin-top: 2rem;">Le Concept</h2>
                <p>
                    Une plateforme communautaire interactive permettant aux passionnés de séries TV de consulter des fiches détaillées, de noter les œuvres et de partager leurs critiques saison par saison.
                </p>
                <p>
                    Ce projet universitaire (SAE S2.02) repose sur une architecture MVC stricte utilisant le framework CodeIgniter 3. Il gère un système complet d\'utilisateurs (inscription, connexion) ainsi qu\'une base de données relationnelle complexe liant séries, saisons, notes et commentaires.
                </p>
                <p>
                    En tant que <strong>Développeur Fullstack</strong>, j\'ai participé à la modélisation de la base de données MySQL et à l\'implémentation des contrôleurs PHP pour la gestion dynamique du contenu et des interactions utilisateurs.
                </p>
                <h2 style="margin-top: 2rem;">Challenge Technique</h2>
                <p>
                    Le principal défi technique résidait dans la maîtrise du framework CodeIgniter et l\'optimisation des requêtes SQL. Il fallait calculer efficacement les moyennes des notes pour chaque série et saison à partir des avis utilisateurs, tout en assurant la sécurité des données (protection CSRF, échappement des entrées).
                </p>',

            'tags' => [
                'PHP (CodeIgniter 3)',
                'MySQL',
                'HTML5',
                'Pico CSS',
                'UML / Merise'
            ],

            'video' => 'public/videos/votre-video.mp4', 

            'gallery' => [], 

            'links' => [
                'github' => 'https://github.com/aamminnee/projet_forum_critique_series',
                'download' => 'https://github.com/aamminnee/projet_forum_critique_series/archive/refs/heads/main.zip',
                'doc' => '', 
                'access' => 'https://dwarves.iut-fbleau.fr/~goncalvl/'
            ]
        ],

        // --- PROJECT 11 : SERVER CONFIGURATION ---
        'server' => [
            'title' => 'Configuration Serveurs',
            'category' => 'Système & Réseau',
            'date' => '2025',
            'duration' => '1 semaine',
            'style_color' => 'primary', // Alternance avec le précédent (secondary)

            'description' => '
                <h2 style="margin-top: 2rem;">Le Concept</h2>
                <p>
                    La mise en place d\'une infrastructure réseau sécurisée et hybride, interconnectant des environnements Windows Server et Linux (ArchLinux) pour simuler un réseau d\'entreprise fonctionnel.
                </p>
                <p>
                    Ce projet (SAÉ SCR) m\'a permis de configurer les services essentiels d\'un réseau local : contrôleur de domaine <strong>Active Directory</strong>, distribution d\'adresses via <strong>DHCP</strong> et résolution de noms <strong>DNS</strong>.
                </p>
                <p>
                    En tant qu\'<strong>Administrateur Système</strong>, j\'ai assuré la gestion des utilisateurs, la mise en place de partages de fichiers inter-OS (SMB) et la sécurisation des accès distants via le protocole SSH avec authentification par clés asymétriques.
                </p>
                <h2 style="margin-top: 2rem;">Challenge Technique</h2>
                <p>
                    La complexité résidait dans l\'interopérabilité entre Windows et Linux. J\'ai dû générer et convertir des paires de clés (via PuTTYgen), transférer les clés publiques via SFTP (PSFTP) et configurer manuellement les fichiers <code>authorized_keys</code> sur les serveurs Linux pour permettre une connexion sans mot de passe sécurisée depuis des postes clients Windows.
                </p>',

            'tags' => [
                'Windows Server (AD DS)',
                'ArchLinux (Pacman)',
                'SSH / PuTTYgen',
                'DNS / DHCP',
                'Partage SMB/CIFS',
                'Terminal / CLI'
            ],

            'video' => '', 
            'gallery' => [], 

            'links' => [
                'github' => '', 
                'download' => 'public/divers/rapport_servers.pdf',
                'doc' => 'public/divers/rapport_servers.pdf',
                'access' => ''
            ]
        ],

        // --- PROJECT 12 : TALK ---
        'talk' => [
            'title' => 'TALK',
            'category' => 'Développement Web',
            'date' => '2025',
            'duration' => '1 semaine',
            'style_color' => 'secondary', // Alternance

            'description' => '
                <h2 style="margin-top: 2rem;">Le Concept</h2>
                <p>
                    Une marketplace locale innovante dédiée aux produits technologiques, mettant en relation les acheteurs et les commerçants du département de la Seine-et-Marne (77).
                </p>
                <p>
                    TALK (Technologie Amine Lucas Kouami) se distingue par sa volonté de favoriser le commerce de proximité via le numérique. La plateforme propose un catalogue complet (ordinateurs, périphériques, gadgets), un espace dédié à la gestion des stocks pour les vendeurs, et intègre des options de livraison ou de Click & Collect.
                </p>
                <p>
                    En tant que <strong>Chef de Projet et Développeur Frontend</strong>, j\'ai travaillé au sein d\'une équipe de 3 étudiants sur la conception de l\'identité visuelle, l\'élaboration de la charte graphique et le développement de l\'interface utilisateur responsive.
                </p>
                <h2 style="margin-top: 2rem;">Challenge Technique</h2>
                <p>
                    L\'enjeu principal était de concevoir une expérience utilisateur (UX) fluide et rassurante pour deux types de profils très différents : les acheteurs tech exigeants et les commerçants locaux nécessitant un outil de gestion simple. L\'intégration d\'un système de navigation intuitif et le design "Mobile First" ont été au cœur de nos priorités.
                </p>',

            'tags' => [
                'HTML5',
                'CSS3 (Flexbox/Grid)',
                'JavaScript',
                'UI/UX Design',
                'Gestion de Projet'
            ],

            'video' => 'public/images/TALK/TALK.webm',

            'gallery' => [], 

            'links' => [
                'github' => 'https://github.com/aamminnee/talk',
                'download' => 'https://github.com/aamminnee/talk/archive/refs/heads/main.zip',
                'doc' => 'https://github.com/aamminnee/talk/blob/main/README.md',
                'access' => '' // Le JS gérera l'alerte
            ]
        ],

        // --- PROJECT 13 : MYBRICKSTORE (SPECIAL DUAL VIDEO CONFIGURATION) ---
        'mybrickstore' => [
            'title' => 'MyBrickStore',
            'category' => 'Développement Web',
            'date' => '2026',
            'duration' => '5 semaines',
            'style_color' => 'primary',

            'description' => '
                <h2 style="margin-top: 2rem;">Le Concept</h2>
                <p>
                    Transformer n\'importe quelle image utilisateur en une véritable mosaïque de briques LEGO®, prête à être assemblée.
                </p>
                <p>
                    MyBrickStore n\'est pas qu\'un site e-commerce classique. C\'est une usine logicielle complète qui relie une interface web (pour la commande), un moteur algorithmique puissant (pour le traitement d\'image pixel-art) et un outil de gestion logistique.
                </p>
                <p>
                    En tant que <strong>Chef de Projet</strong>, j\'ai coordonné une équipe de 4 développeurs tout en assurant le développement du cœur algorithmique en C et l\'intégration de l\'API web.
                </p>
                <h2 style="margin-top: 2rem;">Challenge Technique</h2>
                <p>
                    La principale difficulté était d\'optimiser le temps de traitement de l\'image. Nous avons dû créer un exécutable C compilé, appelé par le serveur PHP, pour réduire une image HD à une palette de 40 couleurs LEGO® officielles en moins de 2 secondes.
                </p>',

            'tags' => [
                'PHP ',
                'C',
                'Java',
                'JavaScript',
                'HTML5 / CSS3',
                'Script Shell',
                'MySQL',
            ],

            // SPECIAL FIELD: Array of videos instead of standard video/gallery
            'videos' => [
                [
                    'title' => 'Vue Client',
                    'src' => 'public/images/Mybrickstore/Client.mp4',
                    'poster' => 'public/images/Mybrickstore/client_miniature.png'
                ],
                [
                    'title' => 'Vue Admin',
                    'src' => 'public/images/Mybrickstore/Admin.mp4',
                    'poster' => 'public/images/Mybrickstore/admin_miniature.png'
                ]
            ],

            'video' => '',
            'gallery' => [], 

            'links' => [
                'github' => 'https://github.com/aamminnee/SAE_S3_BUT2_INFO',
                'download' => 'https://github.com/aamminnee/SAE_S3_BUT2_INFO/archive/refs/heads/Zhabrail.zip',
                'doc' => 'https://github.com/aamminnee/SAE_S3_BUT2_INFO/tree/Zhabrail/Documentation', 
                'access' => 'https://MyBrickStore.sytes.net/' 
            ]
        ],

        // --- PROJECT 14 : BILLING SYSTEM ---
        'facturation' => [
            'title' => 'Site de Facturation',
            'category' => 'Développement Web',
            'date' => '2025',
            'duration' => '1 Semaine',
            'style_color' => 'secondary',

            'description' => '
                <h2 style="margin-top: 2rem;">Le Concept</h2>
                <p>
                    Une application web de gestion commerciale conçue pour faciliter l\'administration des clients et l\'édition de documents comptables. Elle permet aux utilisateurs de gérer leur base de données clients et de générer des factures professionnelles au format PDF.
                </p>
                <p>
                    Ce projet (SAE) met l\'accent sur l\'interaction avec une base de données relationnelle via <strong>PHP</strong> et <strong>MySQL</strong>. Il intègre un système de gestion des dépendances avec <strong>Composer</strong> (notamment pour <code>phpdotenv</code>) afin de sécuriser les configurations.
                </p>
                <p>
                    En tant que <strong>Développeur Backend</strong>, j\'ai structuré la base de données, implémenté les opérations CRUD pour les clients (création, modification, suppression) et développé la logique de génération de factures.
                </p>
                <h2 style="margin-top: 2rem;">Challenge Technique</h2>
                <p>
                    Le principal défi a été d\'assurer l\'intégrité des données lors des transactions (création de client et facture associée) et de générer des documents PDF dynamiques respectant une mise en page stricte. La sécurisation des entrées utilisateurs et la gestion des variables d\'environnement pour la connexion à la base de données ont également été des points cruciaux.
                </p>',

            'tags' => [
                'PHP',
                'MySQL',
                'Composer',
                'HTML5 / CSS3',
                'PDF Generation'
            ],

            'video' => 'public/videos/votre-video.mp4', 

            'gallery' => [], 

            'links' => [
                'github' => 'https://github.com/yevhen-kefa/sae_facture',
                'download' => 'https://github.com/yevhen-kefa/sae_facture/archive/refs/heads/main.zip',
                'doc' => 'public/divers/rapport_facturation.pdf',
                'access' => ''
            ]
        ]
    ];
}