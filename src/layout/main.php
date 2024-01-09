<?php
require_once(__DIR__ . '/../routes/mainController.php');

use Main\MainController;

$mainController = new MainController();
$mainPost = $mainController->getMain();


?>

<main>
    <section id='about'>
        <div class="content">
            <div>
                <h2><?php echo $mainPost['title'] ?></h2>
                <h3><?php echo $mainPost['text'] ?></h3>
            </div>


            <img src="<?php echo $mainPost['imgName'] ?>" alt="photo de moi">
        </div>

    </section>

    <section id="skills">
        <h1>Skills</h1>

        <div class="contentSkills">


            <div>
                <div class="circle">
                    <img src="./src//style//assets/Tailwin.png" alt="Tailwindcss">
                </div>

                <div class="circle">
                    <img src="./src//style//assets/react 2.png" alt="React">
                </div>
            </div>
            <div>
                <div class="circle">
                    <img src="./src//style//assets/nodejs.png" alt="Node">
                </div>

                <div class="circle">
                    <img src="./src//style//assets/Mysql.png" alt="Mysql">
                </div>
            </div>



        </div>
    </section>

    <section id="project">
        <h1>Project</h1>

        <div class="contentProject">

            <div>
                <a href="https://enzo-keil.websr.fr">
                    <img src="./src//style//assets/logo.png" alt="portfolio">
                    <h2>Portfolio</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos natus labore, dignissimos
                        reprehenderit
                        tempora molestias nesciunt </p>
                </a>
            </div>

            <div>
                <a href="https://github.com/Ydays-Zen/Zen/tree/main/Zen-ydays">
                    <img src="./src//style//assets/zen.png" alt="zen">
                    <h2>Zen</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos natus labore, dignissimos
                        reprehenderit
                        tempora molestias nesciunt </p>
                </a>
            </div>

            <div>
                <a href="https://github.com/Keil-ENZO/ForumPhp">
                    <img src="./src//style//assets/forum.png" alt="forum">
                    <h2>Forum Php</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos natus labore, dignissimos
                        reprehenderit
                        tempora molestias nesciunt </p>
                </a>
            </div>
        </div>
    </section>


</main>