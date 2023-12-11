<?php 

$sendMail = $_SESSION('email');
$subject = "Emploi du temps";
$content = "Vous avez reçu un message de la part de ";


if(mail($sendMail, $content, $subject)) {
    echo "Votre message a bien été envoyé";
} else {
    echo "Une erreur est survenue lors de l'envoi du message";
}

?>