<?php
// // s'assure que la compétence actuelle est définie
if (!isset($currentSkill)) {
    echo "<div class='container'>Erreur: Compétence introuvable.</div>";
    return;
}

$skill = $currentSkill;
// // récupère tous les projets pour afficher les cartes des projets liés
$allProjects = getProjectsData();
?>

<section class="skill-detail-page">
    <div class="container">
        
        <!-- // section en-tête avec bouton retour -->
        <div class="header-wrapper" data-aos="fade-down">
            <!-- // bouton retour -->
            <a href="index.php?page=skills" class="back-btn-block">
                <i class="fas fa-arrow-left"></i> Retour
            </a>
            
            <!-- // titre centré -->
            <div class="title-block-centered">
                <div class="skill-icon-large"><i class="fas <?= $skill['icon'] ?>"></i></div>
                <h1 class="header-title"><?= htmlspecialchars($skill['title']) ?></h1>
                <p class="skill-subtitle-large"><?= htmlspecialchars($skill['subtitle']) ?></p>
            </div>
            
            <div class="header-spacer"></div>
        </div>

        <!-- // disposition en 2 colonnes -->
        <div class="skill-content-grid">
            
            <!-- // colonne de gauche : description, justification, amélioration et savoir-faire -->
            <div class="skill-main-column" data-aos="fade-right">
                
                <div class="white-block border-top-primary">
                    <h2><i class="fas fa-info-circle"></i> Description de la compétence</h2>
                    <div class="rich-text">
                        <?= $skill['description'] ?>
                    </div>
                </div>

                <!-- // nouveau bloc : pourquoi je valide cette compétence -->
                <?php if(isset($skill['justification'])): ?>
                <div class="white-block border-top-secondary">
                    <h2><i class="fas fa-award"></i> Pourquoi je pense valider cette compétence</h2>
                    <div class="rich-text">
                        <p><?= htmlspecialchars($skill['justification']) ?></p>
                    </div>
                </div>
                <?php endif; ?>

                <!-- // nouveau bloc : axes d'amélioration -->
                <?php if(isset($skill['improvements'])): ?>
                <div class="white-block" style="border-top-color: var(--color-dark) !important;">
                    <h2><i class="fas fa-level-up-alt"></i> Mes axes d'amélioration</h2>
                    <div class="rich-text">
                        <p><?= htmlspecialchars($skill['improvements']) ?></p>
                    </div>
                </div>
                <?php endif; ?>

                <!-- // bloc savoir-faire -->
                <div class="white-block border-top-primary">
                    <h2><i class="fas fa-check-circle"></i> Savoir-faire acquis</h2>
                    <ul class="acquired-skills-list">
                        <?php foreach($skill['subjects'] as $subject): ?>
                            <li><i class="fas fa-check"></i> <?= htmlspecialchars($subject) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>

            </div>

            <!-- // colonne de droite : tags et projets liés -->
            <div class="skill-side-column" data-aos="fade-left">
                
                <div class="white-block">
                    <h2><i class="fas fa-code"></i> Technologies & Outils</h2>
                    <div class="tags-group">
                        <?php foreach($skill['tags'] as $tag): ?>
                            <span class="skill-tag"><?= htmlspecialchars($tag) ?></span>
                        <?php endforeach; ?>
                    </div>
                </div>

                <?php if(!empty($skill['projects'])): ?>
                <div class="white-block">
                    <h2><i class="fas fa-folder-open"></i> Projets d'application</h2>
                    <p class="text-muted mb-3" style="font-size: 0.9rem;">Projets où j'ai pu mettre en œuvre cette compétence :</p>
                    
                    <div class="related-projects-list">
                        <?php 
                        // // tableau associatif pour lier les identifiants de projets à leurs images
                        $projectImages = [
                            'mybrickstore' => 'public/images/Mybrickstore/logo.png',
                            'facturation' => 'public/images/Facture/logo.png',
                            'img2brick' => 'public/images/Img2brick/logo.png',
                            'series' => 'public/images/Series/logo.png',
                            'app_bancaire' => 'public/images/Banque/logo.png',
                            'talk' => 'public/images/TALK/logo.png',
                            'buckshot_roulette' => 'public/images/Buckshot_Roulette/logo.jpg',
                            'blocus' => 'public/images/Blocus/logo.png',
                            'same_game' => 'public/images/Same_Game/logo.png',
                            'IA' => 'public/images/IA/logo.png',
                            'morpion' => 'public/images/Morpion/logo.png',
                            'chevaux' => 'public/images/Course/logo.png',
                            'web' => 'public/images/infra/logo3.png',
                            'server' => 'public/images/infra/logo2.png',
                            'dual_boot' => 'public/images/infra/logo.png'
                        ];

                        foreach($skill['projects'] as $projKey): 
                            if(isset($allProjects[$projKey])):
                                $p = $allProjects[$projKey];
                                // // on récupère l'image ou une image de fallback si elle n'existe pas
                                $thumbnail = $projectImages[$projKey] ?? 'public/images/LOGO.png';
                                // // on récupère la couleur du projet (primary ou secondary)
                                $styleColor = $p['style_color'] ?? 'primary';
                        ?>
                            <a href="index.php?page=<?= $projKey ?>" class="related-project-card card-style-<?= $styleColor ?>">
                                <div class="rp-image">
                                    <img src="<?= $thumbnail ?>" alt="<?= htmlspecialchars($p['title']) ?>">
                                </div>
                                <div class="rp-info">
                                    <h4><?= htmlspecialchars($p['title']) ?></h4>
                                    <span><?= htmlspecialchars($p['category']) ?></span>
                                </div>
                            </a>
                        <?php endif; endforeach; ?>
                    </div>
                </div>
                <?php endif; ?>

            </div>

        </div>
    </div>
</section>