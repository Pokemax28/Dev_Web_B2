<?

namespace App;
use App\Session;

require_once '../vendor/autoload.php';

$page = new Page();



echo $page->render('Profil.html.twig',
 [
    'user' => $page->session->get('user')
 ]);
