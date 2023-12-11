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

            <?php if (isset($_SESSION['email'])): ?>
            <a href="./src/pages/indexAdmin.php">Admin</a>
            <?php endif; ?>
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