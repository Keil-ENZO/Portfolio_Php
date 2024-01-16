<footer>
    <div class="footer">

        <div class="footer__text">
            <h1>KEILENZO</h1>
            <div class="footer__copyrigth">
                <p>© 2024 Portfolio KEILENZO</p>
            </div>


        </div>


        <div class="footer_liens">
            <div><a href="#about">About</a>
                <a href="#skills">Skills</a>
                <a href="#project">Project</a>
            </div>
            <div><a href="#">Contact</a>
                <a href="http://localhost:8888/Portfolio_Php/src/pages/blog.php">Blog</a>
                <?php if (isset($_SESSION['email'])) : ?>
                    <a href="./src/pages/indexAdmin.php">Admin</a>
                <?php endif; ?>
            </div>

        </div>

        <!-- <div class="footer__social">
            <a href="https://www.linkedin.com/in/kevin-lenzotti-8b1b3b1b2/" target="_blank"><img src="" alt="linkedin"></a>

        </div> -->



</footer>