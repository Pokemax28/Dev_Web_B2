<?php 
namespace App;
use App\Session;

require_once '../vendor/autoload.php';

$page = new Page();

$intervenants = $page->getAllIntervenants();
$interventions = $page->getAllInterventions(); // Assurez-vous que cette méthode existe et fonctionne comme prévu
echo $page->render('Intervenant/Intervenant.html.twig', [
    'interventions' => $interventions,
    'intervenants' => $intervenants,
]);


