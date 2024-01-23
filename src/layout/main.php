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
                <a href="https://enzo-keil.websr.fr" target="_blank">
                    <img src="./src//style//assets/logo.png" alt="portfolio">
                    <h2>Portfolio</h2>
                    <p>Creation of my Portfolio with Three Js and Tailwindcss</p>
                </a>
            </div>

            <div>
                <a href="https://github.com/Ydays-Zen/Zen/tree/main/Zen-ydays" target="_blank">
                    <img src="./src//style//assets/zen.png" alt="zen">
                    <h2>Zen</h2>
                    <p>Creation of a social network for readers, they will be able to add books and read those of others
                    </p>
                </a>
            </div>

            <div>
                <a href="https://github.com/Keil-ENZO/tailwind-generator" target="_blank">
                    <img src="./src//style//assets/ChatGPT-Logo.jpg" alt="tailwind-generator">
                    <h2>Tailwind-generator</h2>
                    <p>This project aims to use chatgpt to generate simple pages with Tailwindcss for style</p>
                </a>
            </div>
        </div>
    </section>


</main>