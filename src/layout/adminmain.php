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
        <div class="content">
            <h2>main admin</h2>
            <div>
                <h2><?php echo $mainPost['title'] ?></h2>
                <h3><?php echo $mainPost['text'] ?></h3>
            </div>

            <img src="<?php echo $mainPost['imgName'] ?>" alt="photo de moi">
        </div>

        <div class="content">
            <h2>main admin</h2>

            <form action="" method="post">
                <div>
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" value="<?php echo $mainPost['title']; ?>" required>
                </div>
                <div>
                    <label for="text">Text</label>
                    <textarea name="text" id="text" required><?php echo $mainPost['text']; ?></textarea>
                </div>

                <button type="submit" name="updateMain">Update</button>
            </form>

            <img src="<?php echo $mainPost['imgName']; ?>" alt="photo de moi">
        </div>
    </section>

    <section id="skills">
        <div class="contentSkills">
            <!-- Vos autres éléments ici -->
        </div>
    </section>
</main>