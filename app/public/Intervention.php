<? 

require_once '../vendor/autoload.php'; 
use App\Session;
use App\Page;

$page = new Page();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  
    if (isset($_POST['date_intervention'])) {
        $data = [
            'id_user' => $page->session->get('user')['id'], 
            //'id_statut_suivi' => $_POST['id_statut_suivi'],
            'Degre_Urgence' => $_POST['Degre_Urgence'],
            'date_intervention' => $_POST['date_intervention'],
            'Description' => $_POST['Description']
        ];

        $page->addIntervention($data);

        header('Location: /Profil.php');
    }
} 
    echo $page->render('CreationIntervention.html.twig', []);
