<?php
// ensure current skill is set
if (!isset($currentSkill)) {
    echo "<div class='container'>Erreur: Compétence introuvable.</div>";
    return;
}

$skill = $currentSkill;
// get all projects to display related project cards
$allProjects = getProjectsData();
?>

<section class="skill-detail-page">
    <div class="container">
        
        <!-- header section with back button -->
        <div class="header-wrapper" data-aos="fade-down">
            <a href="index.php?page=skills" class="back-btn-block">
                <i class="fas fa-arrow-left"></i> Retour
            </a>
            
            <div class="title-block-centered">
                <div class="skill-icon-large"><i class="fas <?= $skill['icon'] ?>"></i></div>
                <h1 class="header-title"><?= htmlspecialchars($skill['title']) ?></h1>
                <p class="skill-subtitle-large"><?= htmlspecialchars($skill['subtitle']) ?></p>
            </div>
            
            <!-- empty div for flex spacing -->
            <div></div>
        </div>

        <!-- 2 columns layout -->
        <div class="skill-content-grid">
            
            <!-- left column : descriptions and validation -->
            <div class="skill-main-column" data-aos="fade-right">
                
                <div class="white-block border-top-primary">
                    <h2><i class="fas fa-info-circle"></i> Description détaillée</h2>
                    <div class="rich-text">
                        <?= $skill['description'] ?>
                    </div>
                </div>

                <div class="white-block border-top-secondary">
                    <h2><i class="fas fa-check-circle"></i> Modalités de validation</h2>
                    <p class="validation-text"><?= htmlspecialchars($skill['validation']) ?></p>
                    
                    <h3 class="mt-4 mb-2">Savoir-faire acquis :</h3>
                    <ul class="acquired-skills-list">
                        <?php foreach($skill['subjects'] as $subject): ?>
                            <li><i class="fas fa-check"></i> <?= htmlspecialchars($subject) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>

            </div>

            <!-- right column : tags and related projects -->
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
                        foreach($skill['projects'] as $projKey): 
                            if(isset($allProjects[$projKey])):
                                $p = $allProjects[$projKey];
                        ?>
                            <a href="index.php?page=<?= $projKey ?>" class="related-project-card">
                                <div class="rp-icon"><i class="fas fa-link"></i></div>
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