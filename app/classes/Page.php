<?php

namespace App;

use App\Session;

class Page
{
    private \Twig\Environment $twig;
    private $pdo;
    public $session;

    function __construct()
    {
        $prefixe = str_contains(getcwd( ) ,'admin') ? '../' : '';
        $this ->session = new Session();
        try {
            $this->pdo = new \PDO('mysql:host=mysql;dbname=Web_B2', "root", "");
        } catch (\PDOException $e) {
            var_dump($e->getMessage());
            die();
        }
        $loader = new \Twig\Loader\FilesystemLoader($prefixe . '../templates');
        $this->twig = new \Twig\Environment($loader, [
            'cache' => $prefixe . '../var/cache/compilation_cache',
            'debug' => true,
        ]);
    }


public function insert(string $table_name, array $data)
{
    $sql = "INSERT INTO " . $table_name . " (email,password) VALUES (:email,:password) ";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute($data);
}

public function update(string $table_name, array $data)
{
    $sql = "UPDATE " . $table_name . " SET prenom=:prenom, nom=:nom, adresse=:adresse, Ntel=:Ntel WHERE id=:id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute($data);
}

public function getUserByEmail(array $data)
{
    $sql = "SELECT * FROM users WHERE email = :email";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute($data);
    return $stmt->fetch(\PDO::FETCH_ASSOC);

}

public function getAllUsers()
{
    $sql = "SELECT * FROM users";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    $users = $stmt->fetchAll(\PDO::FETCH_ASSOC);
    return $users;     
}

public function Ban($id)
{
    $sql = "UPDATE users SET Active = 0 WHERE id = :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute(['id' => $id]);

}

public function UnBan($id)
{
    $sql = "UPDATE users SET Active = 1 WHERE id = :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
}

function render(string $name, array $data) :string
    {
        return $this->twig->render($name, $data);
    }

    public function addIntervention(array $data)
    {
        $sql = "INSERT INTO intervention (id_user, Degre_Urgence, date_intervention, Description) VALUES (:id_user, :Degre_Urgence, :date_intervention, :Description)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($data);
    }

    public function getAllInterventionsByUserId($userId)
    {
        $sql = "SELECT * FROM intervention WHERE id_user = :id_user";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id_user' => $userId]);
        $interventions = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $interventions;
    }


    public function getAllInterventions()
{
    $sql = "SELECT intervention.*, users.nom, users.prenom, users.typeDeCompte
            FROM intervention 
            JOIN users ON intervention.id_user = users.id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    $interventions = $stmt->fetchAll(\PDO::FETCH_ASSOC);
    return $interventions;     
}

public function getAllIntervenants()
{
    $sql = "SELECT id, nom, prenom FROM users WHERE typeDeCompte = 3";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(\PDO::FETCH_ASSOC);
}

public function Ajout($intervenantId, $idDemande) {
    $sql = "UPDATE Demande SET Id_Intervenant = :intervenantId WHERE Id_Demande = :demandeId";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute([
        ':demandeId' => $idDemande,
        ':intervenantId' => $intervenantId
    ]);
}

}



    

    