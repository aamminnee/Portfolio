<?php
// on s'assure que les données sont disponibles
if (!isset($skillsData)) {
    $skillsData = getSkillsData();
}

// constantes pour le calcul du radar
$maxGrade = 20;
$maxRadius = 150;
$centerX = 200;
$centerY = 200;

$baseCoords = [];
$texts = [];

// les angles des 6 axes (sens horaire en partant du haut)
$angles = [
    -M_PI / 2,       // haut
    -M_PI / 6,       // haut droite
    M_PI / 6,        // bas droite
    M_PI / 2,        // bas
    5 * M_PI / 6,    // bas gauche
    7 * M_PI / 6     // haut gauche
];

// 1. calcul des coordonnées de base pour le polygone et les points
$index = 0;
foreach($skillsData as $key => $skill) {
    $grade = isset($skill['grade']) ? $skill['grade'] : 10;
    $radius = ($grade / $maxGrade) * $maxRadius;
    $angle = $angles[$index];

    $x = $centerX + $radius * cos($angle);
    $y = $centerY + $radius * sin($angle);

    // on stocke les infos pour générer les états de survol plus tard
    $baseCoords[] = ['x' => $x, 'y' => $y, 'angle' => $angle, 'radius' => $radius];

    // position du texte
    $textRadius = $maxRadius + 25;
    $textX = $centerX + $textRadius * cos($angle);
    $textY = $centerY + $textRadius * sin($angle);
    
    // ajustement vertical pour que les notes du haut/bas soient lisibles
    if ($index === 0 || $index === 3) $textY += 5;

    $texts[] = ['x' => $textX, 'y' => $textY, 'val' => $grade];
    $index++;
}

// 2. préparation des chaînes de caractères pour le svg
$basePointsStr = implode(' ', array_map(function($c) { return $c['x'].','.$c['y']; }, $baseCoords));

// 3. création des tableaux pour gérer l'étirement au survol (javascript)
$hoverPointsStrs = [];
$hoverDotsArrays = [];

for ($i = 0; $i < 6; $i++) {
    $tempPoints = [];
    $tempDots = [];
    for ($j = 0; $j < 6; $j++) {
        $r = $baseCoords[$j]['radius'];
        $a = $baseCoords[$j]['angle'];
        
        // si c'est l'axe survolé, on étire le rayon de 30px !
        if ($i === $j) {
            $r += 30; 
        }
        
        $tx = $centerX + $r * cos($a);
        $ty = $centerY + $r * sin($a);
        
        $tempPoints[] = "$tx,$ty";
        $tempDots[] = ['x' => $tx, 'y' => $ty];
    }
    $hoverPointsStrs[] = implode(' ', $tempPoints);
    $hoverDotsArrays[] = $tempDots;
}
?>

<section class="skills-section">
    <div class="container">
        
        <!-- // en-tête -->
        <header class="skills-header" data-aos="fade-down">
            <h1 class="page-title">Mes Compétences</h1>
            <p class="page-subtitle">
                Aperçu de mes acquis validés lors de mon BUT Informatique, représentés sous forme de statistiques.
            </p>
        </header>

        <!-- // disposition radiale orbitale -->
        <div class="jojo-layout">
            
            <!-- // radar central -->
            <div class="jojo-radar" data-aos="zoom-in">
                <svg viewBox="0 0 400 400" xmlns="http://www.w3.org/2000/svg" class="radar-svg">
                    <!-- // fond du radar -->
                    <circle cx="200" cy="200" r="150" fill="#fff7ed" stroke="#1c1917" stroke-width="4"/>

                    <!-- // lignes d'axes -->
                    <line x1="200" y1="200" x2="200" y2="50" stroke="#1c1917" stroke-width="2"/>
                    <line x1="200" y1="200" x2="330" y2="125" stroke="#1c1917" stroke-width="2"/>
                    <line x1="200" y1="200" x2="330" y2="275" stroke="#1c1917" stroke-width="2"/>
                    <line x1="200" y1="200" x2="200" y2="350" stroke="#1c1917" stroke-width="2"/>
                    <line x1="200" y1="200" x2="70" y2="275" stroke="#1c1917" stroke-width="2"/>
                    <line x1="200" y1="200" x2="70" y2="125" stroke="#1c1917" stroke-width="2"/>

                    <!-- // cercles décoratifs -->
                    <circle cx="200" cy="200" r="100" fill="none" stroke="#e5e5e5" stroke-width="2" stroke-dasharray="6,6"/>
                    <circle cx="200" cy="200" r="50" fill="none" stroke="#e5e5e5" stroke-width="2" stroke-dasharray="6,6"/>

                    <!-- // forme dynamique du polygone (animée par js) -->
                    <polygon id="radar-polygon" points="<?= $basePointsStr ?>" class="radar-polygon"/>

                    <!-- // petits points sur les sommets (animés par js) -->
                    <?php foreach($baseCoords as $i => $dot): ?>
                        <circle id="radar-dot-<?= $i ?>" class="radar-dot radar-dot-<?= $i ?>" cx="<?= $dot['x'] ?>" cy="<?= $dot['y'] ?>" r="6" fill="#eab308" stroke="#1c1917" stroke-width="2"/>
                    <?php endforeach; ?>

                    <!-- // texte des notes (animé par css) -->
                    <?php foreach($texts as $i => $text): ?>
                        <text class="radar-text radar-text-<?= $i ?>" x="<?= $text['x'] ?>" y="<?= $text['y'] ?>" text-anchor="middle" dominant-baseline="middle"><?= $text['val'] ?></text>
                    <?php endforeach; ?>
                </svg>
            </div>

            <!-- // cartes gravitant autour -->
            <?php
            $index = 0;
            foreach($skillsData as $key => $skill):
            ?>
            
            <div class="jojo-node jojo-node-<?= $index ?>" data-aos="fade-up" data-aos-delay="<?= $index * 100 ?>">
                <a href="index.php?page=skill_detail&id=<?= $key ?>" class="jojo-skill-card">
                    <div class="card-icon"><i class="fas <?= $skill['icon'] ?>"></i></div>
                    <div class="card-content">
                        <h2 class="skill-card-title"><?= htmlspecialchars($skill['title']) ?></h2>
                        <h3 class="skill-card-subtitle"><?= htmlspecialchars($skill['subtitle']) ?></h3>
                    </div>
                    
                    <div class="card-action">
                        <span>Voir</span>
                        <i class="fas fa-arrow-right"></i>
                    </div>
                </a>
            </div>

            <?php 
                $index++;
            endforeach; 
            ?>

        </div>
    </div>
</section>

<!-- // script ultra léger pour animer l'étirement du radar au survol -->
<script>
document.addEventListener('DOMContentLoaded', () => {
    const polygon = document.getElementById('radar-polygon');
    
    // on récupère les éléments svg des points
    const dots = [
        document.getElementById('radar-dot-0'),
        document.getElementById('radar-dot-1'),
        document.getElementById('radar-dot-2'),
        document.getElementById('radar-dot-3'),
        document.getElementById('radar-dot-4'),
        document.getElementById('radar-dot-5')
    ];
    
    // on injecte les calculs php directement dans le js
    const basePointsStr = "<?= $basePointsStr ?>";
    const baseDots = <?= json_encode(array_map(function($c) { return ['x'=>$c['x'], 'y'=>$c['y']]; }, $baseCoords)) ?>;
    
    const hoverPointsStrs = <?= json_encode($hoverPointsStrs) ?>;
    const hoverDotsArrays = <?= json_encode($hoverDotsArrays) ?>;

    const nodes = document.querySelectorAll('.jojo-node');
    
    // on applique l'événement sur chaque carte
    nodes.forEach((node, index) => {
        node.addEventListener('mouseenter', () => {
            // on étire la forme orange vers la carte
            polygon.setAttribute('points', hoverPointsStrs[index]);
            
            // on déplace le petit point jaune avec l'étirement et on le grossit
            dots[index].setAttribute('cx', hoverDotsArrays[index][index].x);
            dots[index].setAttribute('cy', hoverDotsArrays[index][index].y);
            dots[index].setAttribute('r', '9'); // devient plus grand
        });
        
        node.addEventListener('mouseleave', () => {
            // retour à la normale
            polygon.setAttribute('points', basePointsStr);
            
            dots[index].setAttribute('cx', baseDots[index].x);
            dots[index].setAttribute('cy', baseDots[index].y);
            dots[index].setAttribute('r', '6'); // taille normale
        });
    });
});
</script>