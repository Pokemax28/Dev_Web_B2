<?php

require_once '../../vendor/autoload.php';

use App\Page;

$page = new Page();

require_once '../../vendor/autoload.php';

use App\Page;

$page = new Page();

// Assuming 'Choisir' is the name of your submit button
if (isset($_POST['Choisir'])) {
    // Ensure both 'intervenant_id' and 'id_Demande' are set and not empty
    if (isset($_POST['intervenant_id'], $_POST['id_Demande']) && !empty($_POST['intervenant_id']) && !empty($_POST['id_Demande'])) {
        $intervenantId = $_POST['intervenant_id'];
        $idDemande = $_POST['id_Demande'];

        // Process the addition of the intervenant to the demande
        $page->Ajout($intervenantId, $idDemande); // Adjust this line as necessary to match your method's parameters
    }
}

// Redirect at the end
header("Location: /secretaire.php");
exit();
