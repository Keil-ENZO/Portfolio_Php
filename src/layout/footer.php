<footer>
    <div class="footer">
        <div class="footer__logo">
            <h1>KEILENZO</h1>
        </div>
        <div class="footer__liens">
            <a href="#about">About</a>
            <a href="/">Skills</a>
            <a href="#">Project</a>
            <a href="#">Contact</a>
            <a href="http://localhost:8888/Portfolio_Php/src/pages/blog.php">Blog</a>
            <?php if (isset($_SESSION['email'])): ?>
            <a href="./src/pages/indexAdmin.php">Admin</a>
            <?php endif; ?>
        </div>
        <div class="footer__social">
            <a href="https://www.linkedin.com/in/kevin-lenzotti-8b1b3b1b2/" target="_blank"><img
                    src="" alt="linkedin"></a>

</footer>