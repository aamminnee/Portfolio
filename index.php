<?php
// load projects and skills data
require_once 'data/projects_data.php';
require_once 'data/skills_data.php';

// initialize data variables
$skillsData = getSkillsData();
$data = getProjectsData();

// get the current page from the url
$page = $_GET['page'] ?? 'home';

// list of static html pages
$staticPages = ['home', 'about', 'projects', 'contact'];

// routing logic to determine the view path
if (in_array($page, $staticPages)) {
    // standard static pages
    $viewPath = "views/$page.html";
    $pageType = 'static';
} 
elseif ($page === 'skills') {
    // dynamic skills list view
    $viewPath = "views/skills.php";
    $pageType = 'skills-list';
}
elseif ($page === 'skill_detail') {
    // detail view for a specific skill
    $currentSkillId = $_GET['id'] ?? null;
    
    if ($currentSkillId && isset($skillsData[$currentSkillId])) {
        $currentSkill = $skillsData[$currentSkillId];
        $viewPath = "views/skills_detail.php";
        $pageType = 'skill-detail';
    } else {
        // fallback to skills list if not found
        $page = 'skills';
        $viewPath = "views/skills.php";
        $pageType = 'skills-list';
    }
}
elseif (array_key_exists($page, $data)) {
    // dynamic project detail view
    $currentProject = $data[$page];
    $viewPath = "views/project_detail.php";
    $pageType = 'project';
} 
else {
    // unknown page defaults to home
    $page = 'home';
    $viewPath = "views/home.html";
    $pageType = 'static';
}

// verify that the view file exists before including the layout
if (!file_exists($viewPath)) {
    die("<div style='text-align:center; padding: 5rem; font-family: sans-serif;'>" .
        "<h2 style='color: #ea580c;'>Erreur : Vue introuvable</h2>" .
        "<p>Le fichier <strong>$viewPath</strong> est manquant.</p>" .
        "</div>");
}

// load the main layout which will include the $viewPath
require 'layout.php';
?>