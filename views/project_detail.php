<?php
// check if project data exists
if (!isset($currentProject)) {
    echo "<div class='container'>Erreur: Projet introuvable.</div>";
    return;
}
// extract data for simplified variables
$p = $currentProject;
$borderColorClass = ($p['style_color'] === 'secondary') ? 'border-secondary' : 'border-primary';
$toolsBorderClass = ($p['style_color'] === 'secondary') ? 'border-primary' : 'border-secondary';
?>

<section class="project-page">
    <div class="container">
        
        <!-- // Header -->
        <div class="header-wrapper" data-aos="fade-down">
            <a href="index.php?page=projects" class="back-btn-block">
                <i class="fas fa-arrow-left"></i> Retour
            </a>
            
            <div class="title-block-centered">
                <h1 class="header-title"><?= htmlspecialchars($p['title']) ?></h1>
                <div class="header-meta">
                    <span class="meta-pill"><?= htmlspecialchars($p['category']) ?></span>
                    <span class="meta-pill"><?= htmlspecialchars($p['date']) ?></span>
                    <span class="meta-pill"><i class="far fa-clock"></i> <?= htmlspecialchars($p['duration']) ?></span>
                </div>
            </div>
            
            <!-- // empty element for css grid balance -->
            <div></div>
        </div>

        <!-- // Top Section: Description & Sidebar -->
        <div class="top-section-grid">
            
            <div class="block-description <?= $borderColorClass ?>" data-aos="fade-right">
                <?= $p['description'] // displays html description ?>
            </div>

            <div class="sidebar-stack" data-aos="fade-left">
                
                <div class="block-tools <?= $toolsBorderClass ?>">
                    <h3>Langages & Outils</h3>
                    <ul class="tools-list">
                        <?php foreach($p['tags'] as $tag): ?>
                        <li><i class="fas fa-check-circle"></i> <?= htmlspecialchars($tag) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <div class="block-actions <?= $borderColorClass ?>">
                    <h3>Actions</h3>
                    
                    <?php if(!empty($p['links']['github'])): ?>
                    <a href="<?= $p['links']['github'] ?>" class="action-btn btn-code" target="_blank">
                        <i class="fab fa-github"></i> Voir le Code
                    </a>
                    <?php endif; ?>

                    <?php if(!empty($p['links']['download'])): ?>
                    <a href="<?= $p['links']['download'] ?>" class="action-btn btn-download" target="_blank">
                        <i class="fas fa-download"></i> Télécharger (Zip)
                    </a>
                    <?php endif; ?>
                    
                    <?php if(!empty($p['links']['doc'])): ?>
                    <a href="<?= $p['links']['doc'] ?>" class="action-btn btn-doc" target="_blank">
                         <i class="fas fa-book"></i> Documentation
                    </a>
                    <?php endif; ?>

                    <?php if(!empty($p['links']['access'])): ?>
                        <a href="<?= $p['links']['access'] ?>" class="action-btn btn-access" target="_blank">
                            <i class="fas fa-play"></i> Accéder au projet
                        </a>
                    <?php else: ?>
                        <!-- // link disabled if no access -->
                        <a href="#" class="action-btn btn-access" style="opacity:0.5; cursor:not-allowed;" onclick="alert('Lien non disponible ou projet local'); return false;">
                            <i class="fas fa-lock"></i> Accès Restreint
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- // Bottom Section: Video & Gallery (or Dual Video) -->
        <div class="bottom-section-grid">
            
            <?php if (isset($p['videos']) && count($p['videos']) > 0): ?>
                <!-- // Multi-Video Mode (e.g., MyBrickStore) -->
                <?php foreach($p['videos'] as $video): ?>
                    <div class="fixed-height-block <?= $toolsBorderClass ?>" data-aos="fade-up">
                        <div class="block-label"><?= htmlspecialchars($video['title']) ?></div>
                        <div class="video-content">
                            <video controls poster="<?= htmlspecialchars($video['poster']) ?>">
                                <source src="<?= htmlspecialchars($video['src']) ?>" type="video/mp4">
                                Votre navigateur ne supporte pas la balise vidéo.
                            </video>
                        </div>
                    </div>
                <?php endforeach; ?>

            <?php else: ?>
                <!-- // Standard Mode: 1 Video + Gallery -->
                
                <!-- // Video Block (if exists) -->
                <?php if(!empty($p['video'])): ?>
                <div class="fixed-height-block <?= $toolsBorderClass ?>" data-aos="fade-up">
                    <div class="block-label">Vidéo / Démo</div>
                    <div class="video-content">
                        <video controls poster="public/images/votre-miniature.jpg">
                            <source src="<?= $p['video'] ?>" type="video/mp4">
                            Votre navigateur ne supporte pas la balise vidéo.
                        </video>
                    </div>
                </div>
                <?php endif; ?>

                <!-- // Gallery Block (if exists) -->
                <?php if(!empty($p['gallery'])): ?>
                <div class="fixed-height-block <?= $borderColorClass ?> <?php if(empty($p['video'])) echo 'full-width'; ?>" data-aos="fade-up" data-aos-delay="100">
                    <div class="block-label">Galerie</div>
                    <div class="gallery-content">
                        
                        <?php foreach($p['gallery'] as $image): ?>
                        <div class="mySlides fade">
                            <img src="<?= $image ?>" alt="Galerie Projet">
                        </div>
                        <?php endforeach; ?>

                        <?php if(count($p['gallery']) > 1): ?>
                        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                        <a class="next" onclick="plusSlides(1)">&#10095;</a>
                        <?php endif; ?>
                    </div>
                </div>
                <!-- // gallery init script if images present -->
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        if (typeof showSlides === "function") {
                            showSlides(1);
                        }
                    });
                </script>
                <?php endif; ?>

            <?php endif; ?>

        </div>
    </div>
</section>