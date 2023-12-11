<!-- // function connectToDatabase()
// {
// include('./env.php');

// try {
// return new PDO('mysql:host=' . $DB_HOST . ';port=' . $DB_PORT . ';dbname=' . $DB_DATABASE . ';charset=utf8',
$DB_USER, $DB_PASSWORD);

// } catch (Exception $e) {
// die('Erreur : ' . $e->getMessage());
// }
// }

// try {
// $db = connectToDatabase();

// } catch (Exception $e) {
// die('Erreur : ' . $e->getMessage());
// } -->


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
    <link rel="stylesheet" href="./src/style/style.css">
    <title>Portfolio</title>
</head>

<body>

    <?php require_once('./src/layout/header.php');?>
    <?php require_once('./src/layout/main.php');?>
    <?php require_once('./src/layout/footer.php');?>

    <script src="./src/js/index.js"></script>
</body>

</html>