<?php
session_start();

require_once('../routes/postMail.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Chakra+Petch:ital,wght@0,300;0,400;1,300&family=M+PLUS+Rounded+1c:wght@100;300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../style/style.css">
    <title>Contact</title>
</head>

<body>

    <?php require_once('../layout/header.php'); ?>
    <main class="mail">
        <h2>Contact</h2>

        <form action="mail.php" method="post">

            <div class="inputs">
                <div>
                    <label for="sendMail">Email</label>
                    <input type="email" name="sendMail" id="sendMail" required>
                </div>
                <div>
                    <label for="subject">Object</label>
                    <input type="text" name="subject" id="subject" required>
                </div>
            </div>




            <label for="content">Content</label>
            <textarea name="content" id="content" cols="30" rows="10" required></textarea>

            <?php
            $token = bin2hex(random_bytes(32));
            $_SESSION['csrf_token'] = $token;
            echo '<input type="hidden" name="csrf_token" value="' . $token . '">';
            ?>

            <div class="btnSend"> <input type="submit" class="send" value="Send">
            </div>
        </form>
    </main>


</body>
<script src="../js/index.js"></script>

</html>