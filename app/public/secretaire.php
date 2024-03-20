<?php 
namespace App;
use App\Session;

require_once '../../vendor/autoload.php';

$page = new Page();

$intervenants = $page->getAllIntervenants();
$interventions = $page->getAllInterventions(); 


echo $page->render('secretaire/secretaire.html.twig',
 [
    'interventions' => $interventions,
    'intervenants' => $intervenants,
]);



