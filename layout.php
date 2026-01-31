<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= ucfirst($page) ?> | Amine Aissyne</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <link rel="stylesheet" href="public/css/style.css?v=<?= time(); ?>">
    <link rel="stylesheet" href="public/css/nav.css?v=<?= time(); ?>">

    <?php 
    // verification si un fichier css existe a la racine du dossier css (ex: home.css)
    if (file_exists("public/css/$page.css")): ?>
        <link rel="stylesheet" href="public/css/<?= $page ?>.css?v=<?= time(); ?>">
    <?php 
    // verification si un fichier css existe dans le sous-dossier projects (ex: mybrickstore.css)
    elseif (file_exists("public/css/projects/$page.css")): ?>
        <link rel="stylesheet" href="public/css/projects/<?= $page ?>.css?v=<?= time(); ?>">
    <?php endif; ?>
</head>
<body>

    <div class="shapes-container" id="background-shapes"></div>

    <?php include 'includes/nav.html'; ?>

    <main>
        <?php 
        // inclusion dynamique des pages
        // on verifie d'abord a la racine de views, puis dans le dossier projects
        if (file_exists("views/$page.html")) {
            include "views/$page.html";
        } elseif (file_exists("views/projects/$page.html")) {
            include "views/projects/$page.html";
        } elseif (file_exists("views/projects/$page.php")) {
            include "views/projects/$page.php";
        } else {
            // page non trouvee
            echo "<div class='container' style='text-align:center; padding: 5rem 0;'>Page introuvable.</div>";
        }
        ?>
    </main>

    <?php include 'includes/footer.html'; ?>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    
    <script src="public/scripts/main.js?v=<?= time(); ?>"></script>
    <?php
        if (file_exists("views/projects/$page.html") || file_exists("views/projects/$page.php")) {
            echo '<script src="public/scripts/galerie.js?v=' . time() . '"></script>';
        }
    ?>
</body>
</html>