<?php
// recuperation de la page courante
$page = $_GET['page'] ?? 'home';

// liste des pages autorisees, y compris les details des projets
$allowedPages = [
    'home', 
    'about', 
    'projects', 
    'contact', 
    'mybrickstore', 
    'series',
    'app_bancaire',
    'facturation',
    'talk',
    'buckshot_roulette', 
    'blocus', 
    'same_game', 
    'IA', 
    'morpion',
    'chevaux', 
    'server', 
    'dual_boot', 
    'img2brick', 
    'web'
];

// verification si la page est autorisee
if (!in_array($page, $allowedPages)) {
    $page = 'home';
}

require 'layout.php';
?>