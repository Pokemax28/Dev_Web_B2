<?php

require_once '../vendor/autoload.php';

use App\Page;

$page = new Page();
if(isset($_POST['send']))
{
    $Mdp_Crypt = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $page->insert('users',[
        'email'=> $_POST['email'],
        'password'=> $Mdp_Crypt
    ]);
    header('Location: AjoutInfo.php');
    exit;
}

echo $page->render('register.html.twig', []);
?>