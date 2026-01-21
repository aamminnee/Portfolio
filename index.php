<?php
$page = $_GET['page'] ?? 'home';
$allowedPages = ['home', 'about', 'projects', 'contact', 'mybrickstore', 'series', 'infra'];
if (!in_array($page, $allowedPages)) {
    $page = 'home';
}
require 'layout.php';
?>