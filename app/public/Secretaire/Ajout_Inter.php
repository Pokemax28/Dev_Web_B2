    <?php

    require_once '../../vendor/autoload.php';

    use App\Page;
    use App\Session;

    $page = new Page();

    if (isset($_POST['Choisir'])) {
        if (isset($_POST['intervenant_id'], $_POST['id_Demande']) && !empty($_POST['intervenant_id']) && !empty($_POST['id_Demande'])) {
            $intervenantId = $_POST['intervenant_id'];
            $idDemande = $_POST['id_Demande'];
    
            // Process the addition
            $page->Ajout($intervenantId, $idDemande);
        }
    }
    header("Location: /secretaire.php");
    exit();
