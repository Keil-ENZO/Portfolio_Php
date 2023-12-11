<?php
namespace Blog;

session_start();

require_once '../db/conectDb.php';
include('../../env.php');

use Database\DBConnection;
use PDO;

class ConnexionAdmin
{
    private $db;

    public function __construct()
    {
        // Utilisation de $_ENV directement pour accéder aux variables d'environnement
        $this->db = new DBConnection($_ENV['DB_HOST'], $_ENV['DB_USER'], $_ENV['DB_PASSWORD'], $_ENV['DB_DATABASE'], $_ENV['DB_PORT']);
    }

    public function connexion($email, $mdp)
    {
        $db = $this->db->getPDO();
        // Utilisez une méthode de hachage sécurisée pour stocker les mots de passe
        $query = $db->prepare('SELECT * FROM user WHERE email = ? AND mdp = ?');
        $query->execute([$email, $mdp]);
        $user = $query->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            // Initialisez la variable de session 'email' ici
            $_SESSION['email'] = $email;
        }

        return $user;
    }
}

$ConnexionAdmin = new ConnexionAdmin();

// Traitement formulaire de connexion 
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['connexion'])) {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    if (!empty($email) && !empty($password)) {
        $user = $ConnexionAdmin->connexion($email, $password);

        if ($user) {
            $_SESSION['email'] = $email; // Assurez-vous que la session est initialisée avec l'email
            header('Location: http://localhost:8888/Portfolio_Php/');
        } else {
            echo "Échec de la connexion. Vérifiez vos informations d'identification.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
</head>

<body>

    <h1>Connexion</h1>

    <form action="" method="post">
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" required>
        </div>
        <div>
            <label for="password">Mot de passe</label>
            <input type="password" name="password" id="password" required>
        </div>
        <button type="submit" name="connexion">Connexion</button>
    </form>



</body>

</html>