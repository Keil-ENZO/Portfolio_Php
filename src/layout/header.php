<?php
if (isset($_SESSION['email'])) {
    // Affichage du nom de l'utilisateur
    $email = $_SESSION['email'];
    $email = substr($email, 0, -10);
}

// Déconnexion de l'utilisateur
function deconnexion()
{
    $_SESSION = array();
    session_destroy();
    header('Location: /Portfolio_Php/');
    exit();
}

// Déconnexion de l'utilisateur
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['deconnexion'])) {
    deconnexion();
}
?>

<header>
    <nav>
        <div>
            <h1>
                <a href="/Portfolio_Php">
                    KEILENZO
                </a>
            </h1>
        </div>

        <div class="liens">
            <a href="/Portfolio_Php#about">About</a>
            <a href="/Portfolio_Php#skills">Skills</a>
            <a href="/Portfolio_Php#project">Project</a>
            <a href="/Portfolio_Php/src/pages/mail.php">Contact</a>
            <a href="/Portfolio_Php/src/pages/blog.php">Blog</a>

            <?php if (isset($_SESSION['email'])) : ?>
                <a href="/Portfolio_Php/src/pages/editBlog.php">Add Blog</a>
                <!-- Formulaire de déconnexion -->
                <form action="/Portfolio_Php/" method="post">
                    <button type="submit" name="deconnexion">Deconnexion</button>
                </form>
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