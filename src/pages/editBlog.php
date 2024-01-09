<?php

session_start();

require_once '../routes/blogController.php';

use Blog\BlogController;

$BlogController = new BlogController();

// Vérifier si la session 'email' est définie
if (!isset($_SESSION['email'])) {
    header('Location: connexion.php');
    exit();
}

$email = $_SESSION['email']; // Assurez-vous de définir la variable $email

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
    <title>Admin Blog</title>
</head>

<body>

    <?php require_once('../layout/header.php'); ?>

    <h1>Bienvenue <?php echo htmlspecialchars($email, ENT_QUOTES, 'UTF-8'); ?></h1>

    <!-- Formulaire de deconnexion -->
    <form action="editBlog.php" method="post">
        <button type="submit" name="deconnexion">Deconnexion</button>
    </form>

    <h2>Creation Article</h2>

    <!-- Formulaire d'ajout d'article -->
    <form action="editBlog.php" method="post">
        <input type="text" name="title" placeholder="Titre">
        <textarea name="content" placeholder="Contenu"></textarea>
        <button type="submit" name="create">Créer</button>
    </form>

    <!-- Affichage des articles existants -->
    <?php
    foreach ($blogPosts as $post) :
    ?>
    <h2><?php echo htmlspecialchars($post['title'], ENT_QUOTES, 'UTF-8'); ?></h2>
    <p><?php echo htmlspecialchars($post['content'], ENT_QUOTES, 'UTF-8'); ?></p>
    <p><?php echo htmlspecialchars($post['created_at'], ENT_QUOTES, 'UTF-8'); ?></p>

    <!-- Formulaire de modification d'article -->
    <form action="editBlog.php" method="post">
        <input type="hidden" name="id" value="<?php echo $post['id']; ?>">
        <input type="text" name="title" placeholder="Titre"
            value="<?php echo htmlspecialchars($post['title'], ENT_QUOTES, 'UTF-8'); ?>">
        <textarea name="content"
            placeholder="Contenu"><?php echo htmlspecialchars($post['content'], ENT_QUOTES, 'UTF-8'); ?></textarea>
        <button type="submit" name="update">Modifier</button>
    </form>

    <!-- Formulaire de suppression d'article -->
    <form action="editBlog.php" method="get">
        <input type="hidden" name="delete" value="<?php echo $post['id']; ?>">
        <button type="submit">Supprimer</button>
    </form>

    <?php
    endforeach;
    ?>

</body>

</html>