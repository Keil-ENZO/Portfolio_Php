<?php

namespace Main;

require_once(__DIR__ . '/../db/conectDb.php');
require_once(__DIR__ . '/../../env.php');


use Database\DBConnection;

class MainController {
    private $db;

    public function __construct()
    {
        $this->db = new DBConnection($_ENV['DB_HOST'], $_ENV['DB_USER'], $_ENV['DB_PASSWORD'], $_ENV['DB_DATABASE'], $_ENV['DB_PORT']);
    }

   
    public function getMain()
    {
        $db = $this->db->getPDO();
        $query = $db->query('SELECT * FROM about');
        $mainPost = $query->fetch();
        return $mainPost;
    }

    // public function updateMain($title, $text, $imgName)
    // {
    //     $db = $this->db->getPDO();
    //     $query = $db->prepare('UPDATE about SET title = :title, text = :text, imgName = :imgName WHERE id = 1');
    //     $query->execute([
    //         'title' => $title,
    //         'text' => $text,
    //         'imgName' => $imgName
    //     ]);
    // }

    

    
}