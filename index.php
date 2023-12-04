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

   echo "Connected successfully";


} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage()); //stop the process and show error message
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Portfolio</h1>

</body>

</html>