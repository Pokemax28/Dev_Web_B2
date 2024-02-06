<?

namespace App;
use App\Session;

require_once '../vendor/autoload.php';

class Profil {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getUserData($userId) {
        $query = "SELECT * FROM users WHERE id = :userId";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':userId', $userId);
        $stmt->execute();
        $userData = $stmt->fetch(PDO::FETCH_ASSOC);
        return $userData;
    }
}
?>
