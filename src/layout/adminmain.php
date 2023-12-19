<?php
require_once(__DIR__ . '/../routes/mainController.php');

use Main\MainController;

$mainController = new MainController();
$mainPost = $mainController->getMain();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['updateMain'])) {
    $title = $_POST['title'];
    $text = $_POST['text'];

    $mainController->updateMain($title, $text, $mainPost['imgName'], $mainPost['imgData']);

    // Assurez-vous de rediriger ou de rafraîchir la page après la mise à jour
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit();
}
?>

<main>
    <section id='about'>
        <h2>Main Admin</h2>

        <!-- <button class="btn"><img class="svg" src="../../src/style/assets/edit.svg" alt="edit"></button> -->

        <div>
            <input class="btn" type="checkbox" id="switch" />
            <label class="btnLabel" for="switch"></label>
        </div>

        <!-- <label for="switch" /> -->

        <div class="content">
            <div>
                <h2><?php echo $mainPost['title'] ?></h2>
                <h3><?php echo $mainPost['text'] ?></h3>
            </div>

            <img src="<?php echo $mainPost['imgName'] ?>" alt="photo de moi">
        </div>

        <div class="content2">

            <form action="" method="post">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" value="<?php echo $mainPost['title']; ?>" required>

                <label for="text">Text</label>
                <textarea name="text" id="text" cols="50" rows="5" required><?php echo $mainPost['text']; ?></textarea>

                <button type="submit" name="updateMain">Update</button>
            </form>

            <img src="<?php echo $mainPost['imgName']; ?>" alt="photo de moi">
        </div>
    </section>

    <section id="skills">

        <div class="contentSkills">

            <div class="circle">
                <img src="./src//style//assets/Tailwin.png" alt="Tailwindcss">
            </div>

            <div class="circle">
                <img src="./src//style//assets/react 2.png" alt="React">
            </div>

            <div class="circle">
                <img src="./src//style//assets/nodejs.png" alt="Node">
            </div>

            <div class="circle">
                <img src="./src//style//assets/Mysql.png" alt="Mysql">
            </div>

        </div>
    </section>
</main>