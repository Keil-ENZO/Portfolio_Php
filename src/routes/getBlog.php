<?php 
namespace Blog;

require_once(__DIR__ . '/../db/conectDb.php');
require_once(__DIR__ . '/../../env.php');


use Database\DBConnection;
use PDO;

class getBlog
{
    private $db;

    public function __construct()
    {
        $this->db = new DBConnection($_ENV['DB_HOST'], $_ENV['DB_USER'], $_ENV['DB_PASSWORD'], $_ENV['DB_DATABASE'], $_ENV['DB_PORT']);
    }

    public function getBlogPosts($limit, $offset)
    {
        $db = $this->db->getPDO();
        $query = $db->prepare('SELECT * FROM articles ORDER BY created_at DESC LIMIT :limit OFFSET :offset');
        $query->bindParam(':limit', $limit, PDO::PARAM_INT);
        $query->bindParam(':offset', $offset, PDO::PARAM_INT);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPostCount()
    {
        $db = $this->db->getPDO();
        $query = $db->query('SELECT COUNT(*) FROM articles');
        return $query->fetchColumn();
    }
}

?>