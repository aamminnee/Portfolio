<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= ucfirst($page) ?> | Amine Aissyne</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <link rel="stylesheet" href="public/css/style.css">
    
    <link rel="stylesheet" href="public/css/nav.css">

    <?php if (file_exists("public/css/$page.css")): ?>
        <link rel="stylesheet" href="public/css/<?= $page ?>.css">
    <?php endif; ?>
</head>
<body>

    <?php include 'includes/nav.html'; ?>

    <main>
        <?php 
        // // include page content
        if (file_exists("views/$page.html")) {
            include "views/$page.html";
        } else {
            echo "<div class='container' style='text-align:center; padding: 5rem 0;'>Page not found.</div>";
        }
        ?>
    </main>

    <?php include 'includes/footer.html'; ?>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="public/scripts/main.js"></script>
</body>
</html>