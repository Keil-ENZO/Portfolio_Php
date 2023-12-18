<?php


if(isset($_SESSION['email'])) {
    //Affichage du nom de l'utilisateur
    $email = $_SESSION['email'];
    $email = substr($email, 0, -10);
}

 // deconnexion de utilisateur 
 function deconnexion()
 {
     $_SESSION = array();
     session_destroy();
     header('Location: connexion.php');
     exit();
 }    

 // deconnexion de utilisateur
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['deconnexion'])) {
    deconnexion();
}
?>

<header>
    <nav>
        <div>
            <h1>KEILENZO</h1>
        </div>

        <div class="liens">
            <a href="http://localhost:8888/Portfolio_Php#about">About</a>
            <a href="http://localhost:8888/Portfolio_Php#skills">Skills</a>
            <a href="http://localhost:8888/Portfolio_Php#project">Project</a>
            <a href="http://localhost:8888/Portfolio_Php/src/pages/mail.php">Contact</a>
            <a href="http://localhost:8888/Portfolio_Php/src/pages/blog.php">Blog</a>

            <?php if (isset($_SESSION['email'])): ?>
            <a href="http://localhost:8888/Portfolio_Php/src/pages/editBlog.php">Admin</a>
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