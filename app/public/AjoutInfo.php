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
    $adresse = $_POST['addresse'];
    $telephone = $_POST['Ntel'];
    
    $page->update('users', [
        'id' => $page->session->get('user')['id'], // get the user id from the session (the user is connected so we have the id in the session
        'prenom' => $prenom,
        'nom' => $nom,
        'adresse' => $adresse,
        'Ntel' => $telephone,
    ]);

    $page->session->add('user', $page->getUserByEmail([
        'email' => $page->session->get('user')['email'],
    ]));
    
    header("Location: Profil.php");
    exit;
}

echo $page->render('Ajout_Info.html.twig', [
    'user' => $page->session->get('user')
]);
?>

