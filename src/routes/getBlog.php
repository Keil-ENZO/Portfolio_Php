<?php 
namespace Blog;

require_once '../db/conectDb.php';
include('../../env.php');

use Database\DBConnection;

class getBlog
{
    private $db;

    public function __construct()
    {
        // Utilisation de $_ENV directement pour accéder aux variables d'environnement
        $this->db = new DBConnection($_ENV['DB_HOST'], $_ENV['DB_USER'], $_ENV['DB_PASSWORD'], $_ENV['DB_DATABASE'], $_ENV['DB_PORT']);
    }

    public function getBlogPosts()
    {
        $db = $this->db->getPDO();
        $query = $db->query('SELECT * FROM articles');
        $blogPosts = $query->fetchAll();
        return $blogPosts;
    }

   
}
?>