<?php

/**
 * retrieves the complete list of skills and their details.
 * acts as a central database for the skills section.
 *
 * @return array associative array of skills
 */
function getSkillsData() {
    return [
        'realiser' => [
            'id' => '01',
            'title' => 'Réaliser',
            'subtitle' => 'Développement d\'application',
            'icon' => 'fa-laptop-code',
            'subjects' => [
                'Développement web & application',
                'Algorithmique & structures',
                'Qualité de développement',
                'Analyse et conception (UML)'
            ],
            'validation' => 'Validation par la création d\'applications complètes et fonctionnelles, du backend au frontend, en respectant les architectures MVC et les principes du Clean Code.',
            'description' => '
                <p>La compétence <strong>Réaliser</strong> constitue le socle technique de mon profil. Elle englobe tout le cycle de vie du développement logiciel, de la conception initiale (UML) jusqu\'au déploiement, en passant par l\'écriture d\'un code propre, documenté et testé.</p>
                <p>Durant ma formation, j\'ai développé une forte appétence pour le développement backend et frontend, en utilisant des langages variés tels que PHP, Java, Python ou encore C. La maîtrise des architectures logicielles (comme le modèle MVC) est au cœur de ma démarche pour concevoir des applications évolutives.</p>
                <p>L\'accent est également mis sur la <em>Qualité de développement</em> : mise en place de tests, refactoring régulier et application stricte des principes du Clean Code.</p>
            ',
            'tags' => ['PHP 8', 'Java', 'Python', 'HTML/CSS', 'MVC', 'Clean Code'],
            'projects' => ['mybrickstore', 'facturation']
        ],
        'optimiser' => [
            'id' => '02',
            'title' => 'Optimiser',
            'subtitle' => 'Applications informatiques',
            'icon' => 'fa-rocket',
            'subjects' => [
                'Optimisation des algorithmes',
                'Mathématiques & probabilités',
                'Programmation bas niveau',
                'Complexité algorithmique'
            ],
            'validation' => 'Analyse de la complexité temporelle et spatiale, choix et optimisation de structures de données pertinentes pour résoudre des problèmes algorithmiques complexes.',
            'description' => '
                <p>La compétence <strong>Optimiser</strong> démontre ma capacité à ne pas me contenter d\'un code qui fonctionne, mais d\'exiger un code qui fonctionne de manière optimale et performante.</p>
                <p>Elle s\'appuie sur de solides bases en mathématiques et en analyse de complexité. J\'ai appris à comparer différentes structures de données et algorithmes afin de choisir les plus adaptés aux contraintes de mémoire et de temps d\'exécution.</p>
                <p>Ce savoir-faire a été mis en pratique sur des projets exigeants, allant du développement de jeux nécessitant des algorithmes réactifs à la création d\'intelligences artificielles avec apprentissage.</p>
            ',
            'tags' => ['C', 'Python', 'Algorithmique', 'Mathématiques', 'Structure de données'],
            'projects' => ['img2brick', 'blocus', 'IA']
        ],
        'administrer' => [
            'id' => '03',
            'title' => 'Administrer',
            'subtitle' => 'Systèmes et réseaux',
            'icon' => 'fa-server',
            'subjects' => [
                'Programmation système (Linux)',
                'Déploiement d\'applications',
                'Administration de réseaux',
                'Services et protocoles'
            ],
            'validation' => 'Installation, configuration complète et sécurisation de services réseaux réels sur des environnements Linux en conditions de production.',
            'description' => '
                <p>La compétence <strong>Administrer</strong> m\'a permis de maîtriser l\'environnement dans lequel s\'exécutent les applications. Elle couvre la gestion des systèmes d\'exploitation, particulièrement les distributions GNU/Linux, et la configuration des infrastructures réseaux.</p>
                <p>J\'ai acquis de l\'expérience dans la mise en place de serveurs web, le paramétrage de services fondamentaux (DNS, DHCP, SSH, Samba) et la compréhension approfondie du modèle OSI et des protocoles TCP/IP.</p>
                <p>Savoir déployer et sécuriser une application est aujourd\'hui indispensable pour garantir sa disponibilité et sa fiabilité en production.</p>
            ',
            'tags' => ['Linux (Debian/Arch)', 'Bash', 'Apache/Nginx', 'DNS/DHCP', 'SysAdmin'],
            'projects' => ['web', 'server', 'dual_boot']
        ],
        'gerer' => [
            'id' => '04',
            'title' => 'Gérer',
            'subtitle' => 'Données de l\'information',
            'icon' => 'fa-database',
            'subjects' => [
                'Modélisation (MCD, MLD)',
                'SQL et programmation BD',
                'Administration SGBD',
                'NoSQL (MongoDB)'
            ],
            'validation' => 'Modélisation complète de bases de données relationnelles et NoSQL, conception de requêtes complexes et maintien de l\'intégrité des données.',
            'description' => '
                <p>La compétence <strong>Gérer</strong> concerne le cycle de vie de la donnée : de son recueil à son stockage sécurisé, en passant par sa modélisation.</p>
                <p>Je suis capable de concevoir des schémas de bases de données relationnelles optimisés via des outils de modélisation (Merise, UML) et d\'interagir avec ces données via des requêtes SQL avancées.</p>
                <p>Cette compétence s\'étend également aux bases de données NoSQL, offrant une flexibilité précieuse pour le traitement de données non structurées ou semi-structurées.</p>
            ',
            'tags' => ['SQL', 'MySQL', 'PostgreSQL', 'Oracle', 'MongoDB (NoSQL)'],
            'projects' => ['series', 'mybrickstore']
        ],
        'conduire' => [
            'id' => '05',
            'title' => 'Conduire',
            'subtitle' => 'Projets informatiques',
            'icon' => 'fa-project-diagram',
            'subjects' => [
                'Méthodes Agiles (Scrum)',
                'Management des SI',
                'Droit et économie du numérique',
                'Communication professionnelle'
            ],
            'validation' => 'Pilotage global de projets techniques en équipe, rédaction de cahiers des charges précis, modélisation UML et suivi des sprints Agile.',
            'description' => '
                <p>La compétence <strong>Conduire</strong> met en avant mes aptitudes organisationnelles et ma compréhension des enjeux métiers qui entourent le développement logiciel.</p>
                <p>J\'ai été formé à la gestion de projet moderne, avec un fort accent sur les méthodologies Agiles (framework Scrum). La rédaction de documentation technique, de cahiers des charges et le respect des normes juridiques du numérique (RGPD) font partie intégrante de mon processus de travail.</p>
                <p>Savoir organiser le travail, estimer les délais et communiquer avec les parties prenantes est crucial pour la réussite de tout projet.</p>
            ',
            'tags' => ['Agile Scrum', 'UML', 'Trello / Jira', 'Gestion de projet', 'RGPD'],
            'projects' => ['app_bancaire']
        ],
        'collaborer' => [
            'id' => '06',
            'title' => 'Collaborer',
            'subtitle' => 'Dans une équipe informatique',
            'icon' => 'fa-users',
            'subjects' => [
                'Travail en équipe (SAE)',
                'Anglais professionnel',
                'Projet Personnel et Pro (PPP)',
                'Git & versioning collaboratif'
            ],
            'validation' => 'Implication active dans des équipes de développement sur des projets longs, résolution de conflits via le versioning et présentations orales structurées.',
            'description' => '
                <p>La compétence <strong>Collaborer</strong> témoigne de mon savoir-être ("soft skills") et de ma capacité à m\'intégrer efficacement au sein d\'une équipe de développeurs.</p>
                <p>La collaboration technique passe par une maîtrise approfondie des outils de versioning tels que Git (gestion des branches, merge requests, résolution de conflits). Elle implique aussi une communication fluide, que ce soit en français ou en anglais technique, pour partager ses idées et effectuer des revues de code constructives.</p>
                <p>La réussite d\'un projet ambitieux repose avant tout sur l\'intelligence collective de l\'équipe.</p>
            ',
            'tags' => ['Git / GitHub', 'Anglais IT', 'Communication', 'Travail d\'équipe', 'Versioning'],
            'projects' => ['mybrickstore', 'talk']
        ]
    ];
}