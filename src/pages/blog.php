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

    public function createBlogPost($title, $content)
    {
        $db = $this->db->getPDO();
        $query = $db->prepare('INSERT INTO articles (title, content, created_at) VALUES (?, ?, NOW())');
        $query->execute([$title, $content]);
        // Pas besoin de rediriger après l'insertion, cela peut créer des problèmes
    }

    public function updateBlogPost($id, $title, $content)
    {
        $db = $this->db->getPDO();
        $query = $db->prepare('UPDATE articles SET title = ?, content = ? WHERE id = ?');
        $query->execute([$title, $content, $id]);
        // Pas besoin de rediriger après la mise à jour
    }

    public function deleteBlogPost($id)
    {
        $db = $this->db->getPDO();
        $query = $db->prepare('DELETE FROM articles WHERE id = ?');
        $query->execute([$id]);
        // Pas besoin de rediriger après la suppression
    }
}

$blogController = new BlogController();

$blogPosts = $blogController->getBlogPosts();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Chakra+Petch:ital,wght@0,300;0,400;1,300&family=M+PLUS+Rounded+1c:wght@100;300;400&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="../style/style.css">
    <title>Blog</title>
</head>

<body>

    <header>
        <nav>
            <div>
                <h1>KEILENZO</h1>
            </div>

            <div class="liens">
                <a href="../../index.php">About</a>
                <a href="../../index.php">Skills</a>
                <a href="../../index.php">Project</a>
                <a href="../../index.php">Contact</a>

                <a href="blog.php">Blog</a>
            </div>
        </nav>

        <div class="header">
            <button type="button" aria-label="toggle curtain navigation" class="nav-toggler">
                <span class="line l1"></span>
                <span class="line l2"></span>
                <span class="line l3"></span>
            </button>
            <div>
                <h1>KEILENZO</h1>
            </div>
        </div>
    </header>

    <h1>Blog</h1>

    <!-- Affichage des articles existants -->
    <?php
    foreach ($blogPosts as $post) :
    ?>
    <h2><?php echo $post['title']; ?></h2>
    <p><?php echo $post['content']; ?></p>
    <p><?php echo $post['created_at']; ?></p>
    <?php
    endforeach;
    ?>

    <script src="../js/index.js"></script>
</body>

</html>