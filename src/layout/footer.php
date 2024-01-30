<footer>
    <div class="footer">

        <div class="footer__text">
            <h1>KEILENZO</h1>

            <div class="form_reseau">
                <a href="https://www.linkedin.com/in/enzo-keil-0452a4238/" target="_blank"><img src="./src//style//assets/linkedin.svg" alt="linkedin"></a>
                <a href="https://github.com/Keil-ENZO" target="_blank"><img src="./src//style//assets/square-github.svg" alt="github"></a>

            </div>
            <div class="footer__copyrigth">
                <p>© 2024 Portfolio KEILENZO</p>
            </div>
        </div>






        <div class="footer_liens">
            <div><a href="/Portfolio_Php#about">About</a>
                <a href="/Portfolio_Php#skills">Skills</a>
                <a href="/Portfolio_Php#project">Project</a>
            </div>
            <div><a href="/Portfolio_Php/src/pages/mail.php">Contact</a>
                <a href="/Portfolio_Php/src/pages/blog.php">Blog</a>
                <?php if (isset($_SESSION['email'])) : ?>
                    <a href="/Portfolio_Php/src/pages/editBlog.php">Add Blog</a>
                <?php endif; ?>
            </div>

        </div>


        <!-- <div class="footer__social">
            <a href="https://www.linkedin.com/in/kevin-lenzotti-8b1b3b1b2/" target="_blank"><img src="" alt="linkedin"></a>

        </div> -->



</footer>