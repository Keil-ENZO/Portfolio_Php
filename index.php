<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Chakra+Petch:wght@300;400;600&family=Roboto+Slab:wght@100;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./src/style/style.css">
    <link rel="shortcut icon" href="./favicon.ico" type="image/x-icon">
    <title>Portfolio</title>
</head>

<body>

    <?php require_once('./src/layout/header.php'); ?>

    <?php if (isset($_SESSION['email'])) : ?>
        <?php require_once('./src/layout/adminMain.php'); ?>
    <?php else : ?>
        <?php require_once('./src/layout/main.php'); ?>
    <?php endif; ?>

    <?php require_once('./src/layout/footer.php'); ?>

    <script src="./src/js/index.js"></script>
</body>

</html>