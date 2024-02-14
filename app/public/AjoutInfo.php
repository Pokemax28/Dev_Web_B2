<?php

require_once '../vendor/autoload.php';

use App\Page;

$page = new Page();

if(!$page->session->isConnected()) {
    header("Location: index.php");
    exit;   
}

if(isset($_POST['send'])) {
   
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $adresse = $_POST['adresse'];
    $telephone = $_POST['telephone'];
    
    $page->insertMore('users', [
        'prenom' => $_POST['prenom'],
        'nom' => $_POST['nom'],
        'adresse' => $_POST['adresse'],
        'Ntel' => $_POST['telephone'],
    ]);
    
    header("Location: Profil.php");
    exit;
}

echo $page->render('Ajout_Info.html.twig', [
    'user' => $page->session->get('user')
]);
?>

