<?php

/**
 * récupère la liste complète des compétences et leurs détails.
 * agit comme base de données centrale pour la section compétences.
 *
 * @return array tableau associatif des compétences
 */
function getSkillsData() {
    return [
        'realiser' => [
            'id' => '01',
            'title' => 'Réaliser',
            'subtitle' => 'Partir des exigences et aller jusqu\'à une application complète', 
            'icon' => 'fa-laptop-code',
            'grade' => 15,
            'subjects' => [
                'Élaborer et implémenter les spécifications',
                'Appliquer l\'accessibilité et l\'ergonomie',
                'Adopter de bonnes pratiques de conception',
                'Valider la qualité par les tests'
            ],
            'description' => '
                <p>La compétence <strong>Réaliser</strong> consiste à développer des solutions informatiques complètes. Selon le référentiel, il s\'agit de "concevoir, coder, tester et intégrer une solution informatique pour un client".</p>
                <p>Pour l\'évaluation de mon <strong>Niveau 2</strong>, ma démarche réflexive s\'appuie sur mes réalisations en SAÉ. Je démontre ma capacité à ne plus seulement coder des applications simples, mais à <em>partir des exigences métiers</em> pour livrer un produit finalisé.</p>
                <p>Mes preuves mettent en avant l\'adoption de bonnes pratiques de conception (architectures adaptées), le soin apporté à l\'ergonomie des interfaces, ainsi que la rigueur de mes protocoles de tests pour valider la qualité du code.</p>
            ',
            
            'justification' => 'Je valide cette compétence car j\'adopte une approche méthodique : je conçois systématiquement avant de coder. Je construis une base architecturale solide qui me permet ensuite d\'appliquer une réflexion algorithmique poussée et de structurer proprement mon application.',
            'improvements' => 'Actuellement, le développement mobile natif reste un domaine où je dois acquérir plus d\'expérience. Je compte m\'y investir davantage lors de mes futurs projets personnels ou stages pour être pleinement polyvalent sur l\'ensemble des plateformes.',
            
            'tags' => ['PHP 8', 'Java', 'Python', 'HTML/CSS', 'Tests Unitaires', 'Conception'],
            'projects' => ['mybrickstore', 'img2brick', 'same_game'] 
        ],
        'optimiser' => [
            'id' => '02',
            'title' => 'Optimiser',
            'subtitle' => 'Sélectionner les algorithmes adéquats pour répondre à un problème donné', 
            'icon' => 'fa-rocket',
            'grade' => 15,
            'subjects' => [
                'Choisir des structures de données complexes',
                'Utiliser des techniques algorithmiques adaptées',
                'Comprendre les enjeux de sécurisation',
                'Évaluer l\'impact environnemental'
            ],
            'description' => '
                <p>La compétence <strong>Optimiser</strong> exige de "proposer des applications informatiques optimisées en fonction de critères spécifiques : temps d\'exécution, précision, consommation de ressources".</p>
                <p>L\'atteinte de mon <strong>Niveau 2</strong> se justifie par ma sélection rigoureuse d\'algorithmes face à des problèmes donnés. Au travers de mes traces, j\'analyse la complexité de mon code et justifie l\'utilisation de structures de données avancées.</p>
                <p>Dans ma démarche portfolio, je mets également en évidence ma prise de recul sur l\'impact environnemental de mes solutions (Green IT) et sur les moyens de sécurisation du code.</p>
            ',
            
            'justification' => 'J\'ai acquis une forte aisance avec les différentes structures de données. Que ce soit lors des TP de Qualité de Développement, dans l\'algorithmique avancée de MyBrickStore ou via les algorithmes de parcours de graphes en Java sur Same Game, j\'ai su optimiser les ressources efficacement.',
            'improvements' => 'Bien que je sois très à l\'aise avec cette compétence et que je n\'y trouve pas de manque critique immédiat, l\'optimisation est un apprentissage continu. Je prévois d\'explorer les architectures très hautement distribuées et les principes du Green IT pour anticiper les défis futurs.',
            
            'tags' => ['C', 'Python', 'Structures de données', 'IA', 'Analyse de complexité'],
            'projects' => ['mybrickstore', 'same_game', 'IA']
        ],
        'administrer' => [
            'id' => '03',
            'title' => 'Administrer',
            'subtitle' => 'Déployer des services dans une architecture réseau', 
            'icon' => 'fa-server',
            'grade' => 11,
            'subjects' => [
                'Développer des applications communicantes',
                'Utiliser des services réseaux virtualisés',
                'Sécuriser les services et les données',
                'Maintenir en condition opérationnelle'
            ],
            'description' => '
                <p>La compétence <strong>Administrer</strong> vise à "installer, configurer, mettre à disposition, maintenir en conditions opérationnelles des infrastructures, des services et des réseaux".</p>
                <p>Pour valider le <strong>Niveau 2</strong>, je ne me limite plus à un poste de travail isolé. Mes preuves démontrent mon aptitude à déployer des services entiers dans une architecture réseau virtualisée, tout en assurant leur sécurité.</p>
                <p>Mes expériences en configuration de serveurs témoignent de ma capacité à offrir une continuité de service fiable à une organisation.</p>
            ',
            
            'justification' => 'Je commence à bien maîtriser cette compétence grâce à un investissement personnel fort. Des projets récents et concrets, tels que l\'installation, le déploiement complet et la sécurisation d\'un serveur web public, prouvent ma capacité à administrer des services de bout en bout.',
            'improvements' => 'J\'ai encore quelques lacunes liées à un retard passé sur cette matière, notamment sur les configurations réseaux très complexes. Pour y pallier, je compte me former activement sur les technologies de conteneurisation (Docker) et l\'intégration continue (CI/CD).',
            
            'tags' => ['Linux (Debian/Arch)', 'Bash', 'Virtualisation', 'Protocoles Réseaux', 'SysAdmin'],
            'projects' => ['web', 'server', 'dual_boot']
        ],
        'gerer' => [
            'id' => '04',
            'title' => 'Gérer',
            'subtitle' => 'Optimiser une base, interagir avec une application et mettre en oeuvre la sécurité', 
            'icon' => 'fa-database',
            'grade' => 15,
            'subjects' => [
                'Optimiser les modèles de données',
                'Assurer la sécurité (intégrité/confidentialité)',
                'Organiser la restitution des données',
                'Manipuler des données hétérogènes'
            ],
            'description' => '
                <p>La compétence <strong>Gérer</strong> concerne le cœur de l\'information de l\'entreprise : "Concevoir, gérer, administrer et exploiter les données de l\'entreprise et mettre à disposition toutes les informations".</p>
                <p>Le <strong>Niveau 2</strong> requiert de dépasser la simple création de tables. À travers mon portfolio, je prouve ma capacité à optimiser des modèles complexes, interagir dynamiquement avec des applications et mettre en œuvre une sécurité stricte.</p>
                <p>J\'argumente mes choix de modélisation en m\'appuyant sur les contraintes d\'intégrité et la restitution visuelle claire des données pour le client final.</p>
            ',
            
            'justification' => 'Je valide cette compétence avec grande aisance, étant très familier avec les concepts SQL et NoSQL depuis le lycée. Depuis plus d\'un an, j\'ai systématisé la conception méthodique (MCD, MLD) pour structurer intelligemment la donnée dans tous mes projets de développement.',
            'improvements' => 'Mon axe d\'amélioration principal concerne la sécurisation avancée de la data. Je prévois d\'approfondir mes connaissances en cybersécurité (chiffrement robuste, prévention des failles d\'injection complexes) pour garantir une intégrité et une confidentialité totales.',
            
            'tags' => ['SQL', 'MySQL', 'Modélisation (MCD/MLD)', 'NoSQL', 'Sécurité des données'],
            'projects' => ['series', 'mybrickstore', 'facturation']
        ],
        'conduire' => [
            'id' => '05',
            'title' => 'Conduire',
            'subtitle' => 'Appliquer une démarche de suivi de projet adaptée aux besoins métiers des clients', 
            'icon' => 'fa-project-diagram',
            'grade' => 12,
            'subjects' => [
                'Identifier les processus de l\'organisation',
                'Formaliser les besoins du client',
                'Identifier les critères de faisabilité',
                'Définir et appliquer un suivi de projet'
            ],
            'description' => '
                <p>La compétence <strong>Conduire</strong> nécessite de "satisfaire les besoins des utilisateurs au regard de la chaîne de valeur du client, organiser et piloter un projet informatique".</p>
                <p>Pour mon <strong>Niveau 2</strong>, je démontre à l\'aide de mes livrables que je sais appliquer une véritable démarche de suivi. Je ne suis plus seulement un exécutant : j\'analyse la faisabilité, je formalise les besoins et j\'utilise des méthodes classiques ou Agiles.</p>
                <p>L\'organisation, l\'anticipation des risques et la communication efficace sont les piliers de mes preuves d\'apprentissage.</p>
            ',
            
            'justification' => 'Depuis le début de mon cursus, j\'ai presque toujours endossé le rôle de chef de projet, ce qui a forgé mon leadership. Récemment, j\'ai instauré avec succès la méthodologie Agile (Scrum) sur le projet MyBrickStore, en déployant les bons outils pour un travail d\'équipe optimal.',
            'improvements' => 'Je souhaite me professionnaliser davantage en visant l\'obtention de certifications reconnues en gestion de projet (comme Scrum Master). J\'aimerais aussi améliorer ma gestion des risques et des conflits sur des projets à très grande échelle.',
            
            'tags' => ['Agile Scrum', 'Besoins Métiers', 'Faisabilité', 'Cahier des charges', 'Gestion de projet'],
            'projects' => ['mybrickstore', 'app_bancaire']
        ],
        'collaborer' => [
            'id' => '06',
            'title' => 'Collaborer',
            'subtitle' => 'Situer son rôle et ses missions au sein d\'une équipe informatique', 
            'icon' => 'fa-users',
            'grade' => 12,
            'subjects' => [
                'Comprendre la diversité de l\'informatique',
                'Intégrer une équipe informatique',
                'Mobiliser ses compétences interpersonnelles',
                'Rendre compte de son activité'
            ],
            'description' => '
                <p>La compétence <strong>Collaborer</strong> s\'assure que je possède "les aptitudes nécessaires pour travailler efficacement dans une équipe informatique".</p>
                <p>Mon auto-évaluation pour le <strong>Niveau 2</strong> s\'appuie sur ma compréhension des différents rôles (Scrum Master, Product Owner, Développeur) et ma capacité à situer mes propres missions au sein du groupe.</p>
                <p>Mes preuves illustrent ma communication professionnelle, ma gestion des conflits de versionnement (Git) et mon aptitude à rendre compte fidèlement de l\'avancée de mes activités.</p>
            ',
            
            'justification' => 'J\'ai acquis cette compétence en saisissant rapidement l\'importance de la synergie d\'équipe. Lors de projets majeurs tels que TALK ou l\'Application Bancaire, j\'ai su identifier immédiatement mon rôle, communiquer efficacement et utiliser le versionning pour fluidifier le travail.',
            'improvements' => 'Pour parfaire cette compétence, je souhaite participer davantage à des revues de code croisées (Code Review) et m\'exposer à des environnements de travail professionnels diversifiés afin d\'améliorer ma capacité d\'adaptation.',
            
            'tags' => ['Git / GitHub', 'Soft Skills', 'Communication', 'Travail d\'équipe', 'Méthodologie'],
            'projects' => ['mybrickstore', 'talk', 'app_bancaire']
        ]
    ];
}