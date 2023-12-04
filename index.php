<?php


require __DIR__ . '/vendor/autoload.php';

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

function connectToDatabase()
{
    try {
        return new PDO('mysql:host=' . $_ENV["DB_HOST"] . ';port=' . $_ENV["DB_PORT"] . ';dbname=' . $_ENV['DB_DATABASE'] . ';charset=utf8', $_ENV['DB_NAME'], $_ENV['DB_PASSWORD']);
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}


try {
    $db = connectToDatabase();

//    echo "Connected successfully";


} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}


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
    <link rel="stylesheet" href="./src//style//style.css">
    <title>Portfolio</title>
</head>

<body>

    <header>
        <nav>
            <div>
                <h1>KEILENZO</h1>
            </div>
            <div class="liens">
                <a href="#">About</a>
                <a href="#">Competence</a>
                <a href="#">Projet</a>
                <a href="#">Blog</a>
                <a href="#">Contact</a>
            </div>
        </nav>

        <div class="header">
            <button type="button" aria-label="toggle curtain navigation" class="nav-toggler">
                <span class="line l1"></span>
                <span class="line l2"></span>
                <span class="line l3"></span>
            </button>

            <h1>Portfolio</h1>
        </div>
    </header>

    <main>

    </main>




    <script src="./src/js/index.js"></script>
</body>

</html>