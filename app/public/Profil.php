<?php

namespace App;

require_once '../vendor/autoload.php';

use App\Page;
use App\Session;

$page = new Page();

if ($page->session->isConnected()) {
    $userId = $page->session->get('user')['id']; 
    $interventions = $page->getAllInterventionsByUserId($userId);

    echo $page->render('Profil.html.twig', [
        'user' => $page->session->get('user'),
        'interventions' => $interventions,
    ]);
} else {
    header('Location: login.php');
    exit;
}
