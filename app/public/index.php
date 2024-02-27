<?php
namespace App;

require_once '../vendor/autoload.php';

use App\Page;

$page = new Page();
$msg = false;

if (isset($_POST['send'])) {
    $user = $page->getUserByEmail([
        'email' => $_POST['email']
    ]);

    if (!$user || !password_verify($_POST['password'], $user['password'])) {
        $msg = "Email ou Mot de Passe incorrect";
    } else {
        $page->session->add('user', $user);

        // Vérification du type de compte
        if ($user['typeDeCompte'] == 1) {
            // Rediriger vers la page admin
            header('Location: /admin.php');
            exit;
        } else {
            // Rediriger vers la page utilisateur normale
            header('Location: /Profil.php');
            exit;
        }
    }
}

echo $page->render('index.html.twig', [
    'msg' => $msg 
]);
?>
