<?php

    require_once '../vendor/autoload.php';

    use App\Page;
    
    $page = new Page();
    $msg = false;
    if(isset($_POST['send']))
    {
        var_dump($_POST);
        $user = $page-> getUserByEmail([
        'email' => $_POST['email']
        ]);
        var_dump($user);

        if(!$user){
            $msg= "Email ou Mot de Passe incorrect";
        }
        else{
            if(!password_verify($_POST['password'], $user['password'])){
                $msg= "Email ou Mot de Passe incorrect";
            }
            else{
                var_dump("compte ok");
            }
        }
    }

    echo $page->render('index.html.twig', [
        'msg' => $msg 
    ]);