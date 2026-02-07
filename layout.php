<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= ucfirst($page) ?> | Amine Aissyne</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- // CSS Globaux -->
    <link rel="stylesheet" href="public/css/style.css?v=<?= time(); ?>">
    <link rel="stylesheet" href="public/css/nav.css?v=<?= time(); ?>">

    <?php 
    // inclusion conditionnelle des CSS
    if (isset($pageType) && $pageType === 'project') {
        // si c'est un projet, on charge le template unique
        echo '<link rel="stylesheet" href="public/css/project_detail.css?v='.time().'">';
    } 
    elseif (file_exists("public/css/$page.css")) {
        // sinon on cherche le css qui porte le nom de la page (ex: home.css)
        echo '<link rel="stylesheet" href="public/css/'.$page.'.css?v='.time().'">';
    }
    ?>
</head>
<body>

    <div class="shapes-container" id="background-shapes"></div>

    <?php include 'includes/nav.html'; ?>

    <main>
        <?php 
        // inclusion de la vue déterminée dans index.php
        if (isset($viewPath) && file_exists($viewPath)) {
            include $viewPath;
        } else {
            echo "<div class='container' style='text-align:center; padding: 5rem 0;'>Erreur de chargement de la vue.</div>";
        }
        ?>
    </main>

    <?php include 'includes/footer.html'; ?>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="public/scripts/main.js?v=<?= time(); ?>"></script>
    
    <?php
    // inclusion de la galerie seulement si on est sur une page projet
    if (isset($pageType) && $pageType === 'project') {
        echo '<script src="public/scripts/galerie.js?v=' . time() . '"></script>';
    }
    ?>
</body>
</html>