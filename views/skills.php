<?php
// make sure skillsData is available
if (!isset($skillsData)) {
    $skillsData = getSkillsData();
}
?>

<section class="skills-section">
    <div class="container">
        
        <!-- header -->
        <header class="skills-header" data-aos="fade-down">
            <h1 class="page-title">Mes Compétences</h1>
            <p class="page-subtitle">
                Aperçu de mes acquis validés lors de mon BUT Informatique, répartis en 6 blocs fondamentaux.
            </p>
        </header>

        <!-- grid container -->
        <div class="skills-grid">
            
            <?php
            $delay = 0;
            // loop through all skills from the data array
            foreach($skillsData as $key => $skill):
            ?>
            
            <article class="skill-card ue-card" data-aos="fade-up" data-aos-delay="<?= $delay ?>">
                <div class="ue-watermark"><?= $skill['id'] ?></div>
                <div class="card-icon"><i class="fas <?= $skill['icon'] ?>"></i></div>
                <h2 class="skill-card-title"><?= htmlspecialchars($skill['title']) ?></h2>
                <h3 class="skill-card-subtitle"><?= htmlspecialchars($skill['subtitle']) ?></h3>
                
                <ul class="skill-subjects">
                    <?php 
                    // display only the first 4 subjects max
                    foreach(array_slice($skill['subjects'], 0, 4) as $subject): 
                    ?>
                        <li><i class="fas fa-check"></i> <?= htmlspecialchars($subject) ?></li>
                    <?php endforeach; ?>
                </ul>
                
                <!-- actions section -->
                <div class="ue-actions" style="margin-top: auto; padding-top: 1.5rem;">
                    <a href="index.php?page=skill_detail&id=<?= $key ?>" class="btn-detail">
                        <span>Voir la compétence en détail</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </article>

            <?php 
                $delay += 100;
            endforeach; 
            ?>

        </div>
    </div>
</section>