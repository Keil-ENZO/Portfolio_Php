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
        $this->db = new DBConnection($_ENV['DB_HOST'], $_ENV['DB_USER'], $_ENV['DB_PASSWORD'], $_ENV['DB_DATABASE'], $_ENV['DB_PORT']);
    }

    public function connexion($email, $mdp)
    {
        $db = $this->db->getPDO();

        $query = $db->prepare('SELECT * FROM user WHERE email = ?');
        $query->execute([$email]);
        $user = $query->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            // Vérifiez d'abord le mot de passe non haché (si les mots de passe ne sont pas hachés dans la base de données)
            if ($mdp === $user['mdp'] || password_verify($mdp, $user['mdp'])) {
                $_SESSION['email'] = $email;
                return $user;
            }
        }

        return null;
    }
}

$ConnexionAdmin = new ConnexionAdmin();

// Traitement formulaire de connexion 
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['connexion'])) {
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $password = htmlspecialchars($_POST['password'], ENT_QUOTES, 'UTF-8');

    if (!empty($email) && !empty($password)) {
        $user = $ConnexionAdmin->connexion($email, $password);

        if ($user) {
            $_SESSION['email'] = $email;
            header('Location: http://localhost:8888/Portfolio_Php/');
            exit;
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Chakra+Petch:ital,wght@0,300;0,400;1,300&family=M+PLUS+Rounded+1c:wght@100;300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../style/style.css">

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

        <?php
        $token = bin2hex(random_bytes(32));
        $_SESSION['csrf_token'] = $token;
        echo '<input type="hidden" name="csrf_token" value="' . $token . '">';
        ?>

        <button type="submit" name="connexion">Connexion</button>
    </form>

</body>

</html>