<?php
require_once(__DIR__ . '/../routes/mainController.php');

use Main\MainController;

$mainController = new MainController();
$mainPost = $mainController->getMain();


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