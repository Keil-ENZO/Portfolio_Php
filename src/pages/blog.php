<?php
session_start();

require_once '../routes/getBlog.php';
use Blog\getBlog;

$getBlog = new getBlog();
$blogPosts = $getBlog->getBlogPosts();
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

    <?php require_once('../layout/header.php');?>


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