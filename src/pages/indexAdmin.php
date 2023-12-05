<?php
namespace Blog;

session_start();

if(!isset($_SESSION['email'])){
    header('Location: connexion.php');
    exit(); 

}

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

    // deconnexion de utilisateur 
    public function deconnexion()
    {
        $_SESSION = array();
        session_destroy();
        header('Location: connexion.php');
        exit();
    }    
}

$blogController = new BlogController();

// Traitement du formulaire d'ajout d'article
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create'])) {
    $title = $_POST['title'] ?? '';
    $content = $_POST['content'] ?? '';

    if (!empty($title) && !empty($content)) {
        $blogController->createBlogPost($title, $content);

        header('Location: indexAdmin.php');
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

// deconnexion de utilisateur
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['deconnexion'])) {
    $blogController->deconnexion();
}

//Affichage du nom de l'utilisateur
$email = $_SESSION['email'];
$email = substr($email, 0, -10);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
</head>

<body>

    <h1>Bienvenue <?php echo $email ?></h1>

    <!-- Formulaire de deconnexion -->
    <form action="indexAdmin.php" method="post">
        <button type="submit" name="deconnexion">Deconnexion</button>
    </form>

    <h2>Creation Article</h2>

    <!-- Formulaire d'ajout d'article -->
    <form action="indexAdmin.php" method="post">
        <input type="text" name="title" placeholder="Titre">
        <textarea name="content" placeholder="Contenu"></textarea>
        <button type="submit" name="create">Créer</button>
    </form>

    <!-- Affichage des articles existants -->
    <?php
    foreach ($blogPosts as $post) :
    ?>
    <h2><?php echo $post['title']; ?></h2>
    <p><?php echo $post['content']; ?></p>
    <p><?php echo $post['created_at']; ?></p>

    <!-- Formulaire de modification d'article -->
    <form action="indexAdmin.php" method="post">
        <input type="hidden" name="id" value="<?php echo $post['id']; ?>">
        <input type="text" name="title" placeholder="Titre" value="<?php echo $post['title']; ?>">
        <textarea name="content" placeholder="Contenu"><?php echo $post['content']; ?></textarea>
        <button type="submit" name="update">Modifier</button>
    </form>

    <!-- Formulaire de suppression d'article -->
    <form action="indexAdmin.php" method="get">
        <input type="hidden" name="delete" value="<?php echo $post['id']; ?>">
        <button type="submit">Supprimer</button>
    </form>

    <?php
    endforeach;
    ?>



</body>

</html>