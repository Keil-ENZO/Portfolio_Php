<?php
session_start();

require_once '../routes/getBlog.php';

use Blog\getBlog;

$getBlog = new getBlog();

// Pagination
$page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
$limit = 5; // Nombre d'articles par page
$offset = ($page - 1) * $limit;

$blogPosts = $getBlog->getBlogPosts($limit, $offset);
$totalPosts = $getBlog->getPostCount();
$totalPages = ceil($totalPosts / $limit);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Chakra+Petch:ital,wght@0,300;0,400;1,300&family=M+PLUS+Rounded+1c:wght@100;300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../style/style.css">
    <title>Blog</title>
</head>

<body>

    <?php require_once('../layout/header.php'); ?>


    <main class="blog">
        <h2>Blog</h2>

        <!-- Affichage des articles existants -->
        <?php
        foreach ($blogPosts as $post) :
        ?>
            <div class="contentBlog">
                <h2><?php echo $post['title']; ?></h2>
                <p><?php echo $post['content']; ?></p>
                <div>
                    <p><?php echo date('d/m/Y H:i', strtotime($post['created_at'])); ?></p>
                </div>
            </div>
        <?php
        endforeach;
        ?>

        <!-- Pagination -->
        <div class="pagination">
            <?php
            for ($i = 1; $i <= $totalPages; $i++) {
                echo '<a href="?page=' . $i . '">' . $i . '</a>';
            }
            ?>
        </div>
    </main>
    <?php require_once('../layout/footer.php'); ?>


    <script src="../js/index.js"></script>
</body>

</html>