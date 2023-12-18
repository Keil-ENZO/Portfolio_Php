<?php

namespace Main;

require_once(__DIR__ . '/../db/conectDb.php');
require_once(__DIR__ . '/../../env.php');

use Database\DBConnection;
use Exception;

class MainController {
    private $db;

    public function __construct()
    {
        $this->db = new DBConnection($_ENV['DB_HOST'], $_ENV['DB_USER'], $_ENV['DB_PASSWORD'], $_ENV['DB_DATABASE'], $_ENV['DB_PORT']);
    }

    public function getMain()
    {
        $db = $this->db->getPDO();
        $query = $db->query('SELECT * FROM about WHERE id = 1');
        $mainPost = $query->fetch();
        return $mainPost;
    }

    public function updateMain($title, $text, $imgName, $imgData)
    {
        $db = $this->db->getPDO();
        $db->beginTransaction();
    
        try {
            $query = $db->prepare('UPDATE about SET title = ?, text = ?, imgName = ?, imgData = ? WHERE id = 1');
            $query->execute([$title, $text, $imgName, $imgData]);
            
            // Commit de la transaction
            $db->commit();
            } catch (Exception $e) {
            // En cas d'erreur, annule la transaction
            $db->rollBack();
            throw $e;
        }
    }
    
}