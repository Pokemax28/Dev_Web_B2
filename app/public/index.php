<?php
    namespace App;
    use App\Session;
    require_once '../vendor/autoload.php';

    use App\Page;
    
    $page = new Page();
    $page->session->get('user');
    $msg = false;
    if(isset($_POST['send']))
    {
        $user = $page-> getUserByEmail([
        'email' => $_POST['email']
        ]);

        if(!$user){
            $msg= "Email ou Mot de Passe incorrect";
        }
        else{
            if(!password_verify($_POST['password'], $user['password'])){
                $msg= "Email ou Mot de Passe incorrect";
            }
            else{
                $page->session->add('user', $user);
                header('Location: /Profil.php');
                exit;
            }
        }
    }

    echo $page->render('index.html.twig', [
        'msg' => $msg 
    ]);