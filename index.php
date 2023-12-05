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

    <header>
        <nav>
            <div>
                <h1>KEILENZO</h1>
            </div>

            <div class="liens">
                <a href="#about">About</a>
                <a href="#">Skills</a>
                <a href="#">Project</a>
                <a href="#">Contact</a>

                <a href="./src/pages/blog.php">Blog</a>
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

    <main>
        <section id='about'>
            <h2>Web Developer</h2>

            <div>
                <h3>Je suis un développeur web junior, passionné par le développement web et les nouvelles technologies.
                    Je suis à la recherche d'un stage ou d'un emploi dans le domaine du développement web.</h3>

                <img src="./src//style//assets/moi.jpeg" alt="photo de moi">
            </div>

        </section>

    </main>




    <script src="./src/js/index.js"></script>
</body>

</html>