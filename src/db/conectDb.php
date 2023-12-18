<?php

namespace Database;

use PDO;
use Exception;

class DBConnection {

    private $DB_HOST;
    private $DB_USER;
    private $DB_PASSWORD;
    private $DB_DATABASE;
    private $DB_PORT;
    private $pdo;

    public function __construct()
    {
        // Utilisation de $_ENV directement pour accéder aux variables d'environnement
        if (
            isset($_ENV['DB_HOST'], $_ENV['DB_USER'], $_ENV['DB_PASSWORD'], $_ENV['DB_DATABASE'], $_ENV['DB_PORT'])
        ) {
            $this->DB_HOST = $_ENV['DB_HOST'];
            $this->DB_USER = $_ENV['DB_USER'];
            $this->DB_PASSWORD = $_ENV['DB_PASSWORD'];
            $this->DB_DATABASE = $_ENV['DB_DATABASE'];
            $this->DB_PORT = $_ENV['DB_PORT'];
    
            // Initialise la connexion lors de la création de l'objet
            $this->initPDO();
        } else {
            throw new Exception('Les variables d\'environnement nécessaires ne sont pas définies.');
        }
    }

    private function initPDO()
    {
        try {
            $this->pdo = new PDO('mysql:host=' . $this->DB_HOST . ';port=' . $this->DB_PORT . ';dbname=' . $this->DB_DATABASE . ';charset=utf8', $this->DB_USER, $this->DB_PASSWORD, 
                array(
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                )
            );
        } catch (Exception $e) {
            // Lève une exception pour indiquer une erreur de connexion à la base de données
            throw new Exception('Erreur de connexion à la base de données : ' . $e->getMessage());
        }
    }

    public function getPDO(): PDO {
        return $this->pdo;
    }
}