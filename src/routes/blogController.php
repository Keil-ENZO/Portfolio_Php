<?php
namespace Blog;

require_once '../db/conectDb.php';
include('../../env.php');

use Database\DBConnection;

class BlogController
{
    private $db;

    public function __construct()
    {
        $this->db = new DBConnection($_ENV['DB_HOST'], $_ENV['DB_USER'], $_ENV['DB_PASSWORD'], $_ENV['DB_DATABASE'], $_ENV['DB_PORT']);
    }

    public function getBlogPosts()
    {
        $db = $this->db->getPDO();
        $query = $db->query('SELECT * FROM articles');
        $blogPosts = $query->fetchAll();
        return $blogPosts;
    }

    public function createBlogPost($title, $content)
    {
        $db = $this->db->getPDO();
        $query = $db->prepare('INSERT INTO articles (title, content, created_at) VALUES (?, ?, NOW())');
        $query->execute([$title, $content]);
    }

    public function updateBlogPost($id, $title, $content)
    {
        $db = $this->db->getPDO();
        $query = $db->prepare('UPDATE articles SET title = ?, content = ? WHERE id = ?');
        $query->execute([$title, $content, $id]);
    }

    public function deleteBlogPost($id)
    {
        $db = $this->db->getPDO();
        $query = $db->prepare('DELETE FROM articles WHERE id = ?');
        $query->execute([$id]);
    }

   
}

$blogController = new BlogController();

// Traitement du formulaire d'ajout d'article
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create'])) {
    $title = $_POST['title'] ?? '';
    $content = $_POST['content'] ?? '';

    if (!empty($title) && !empty($content)) {
        $blogController->createBlogPost($title, $content);

        header('Location: blog.php');
    }
}

// Traitement du formulaire de modification d'article
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
    $id = $_POST['id'] ?? '';
    $title = $_POST['title'] ?? '';
    $content = $_POST['content'] ?? '';
    if (!empty($id) && !empty($title) && !empty($content)) {
        $blogController->updateBlogPost($id, $title, $content);
    }
}

// Traitement de la suppression d'article
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete'])) {
    $id = $_GET['delete'] ?? '';
    if (!empty($id)) {
        $blogController->deleteBlogPost($id);
    }
}

$blogPosts = $blogController->getBlogPosts();