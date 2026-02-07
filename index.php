<?php
// chargement des données des projets
require 'data/projects_data.php';

// INITIALISATION DE LA VARIABLE $data (Correction de l'erreur 500)
$data = getProjectsData();

// recuperation de la page courante
$page = $_GET['page'] ?? 'home';

// liste des pages statiques (qui ont leur propre fichier .html dans views/)
$staticPages = ['home', 'about', 'projects', 'contact'];

// logique de routage
if (in_array($page, $staticPages)) {
    // c'est une page standard (ex: accueil, contact)
    $viewPath = "views/$page.html";
} 
elseif (array_key_exists($page, $data)) {
    // c'est un projet qui existe dans notre fichier de données
    $currentProject = $data[$page];
    $viewPath = "views/project_detail.php";
    $pageType = 'project'; // marqueur pour charger le css spécifique plus tard
} 
else {
    // page inconnue -> retour accueil
    $page = 'home';
    $viewPath = "views/home.html";
}

require 'layout.php';
?>