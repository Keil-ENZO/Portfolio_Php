<?php
namespace Mail;

require_once '../db/conectDb.php';
include('../../env.php');

require '../routes/phpMailer/src/Exception.php';
require '../routes/phpMailer/src/PHPMailer.php';
require '../routes/phpMailer/src/SMTP.php';

use Database\DBConnection;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Mail
{
    private $db;

    public function __construct()
    {
        // Utilisation de $_ENV directement pour accéder aux variables d'environnement
        $this->db = new DBConnection($_ENV['DB_HOST'], $_ENV['DB_USER'], $_ENV['DB_PASSWORD'], $_ENV['DB_DATABASE'], $_ENV['DB_PORT']);
    }

    public function sendMail($to, $subject, $content)
    {
        $headers = "Content-type: text/html; charset=utf-8\r\n";
        $headers .= "From: $to\r\n";
        $headers .= "Reply-To: $to\r\n";
        $headers .= "X-Mailer: PHP/" . phpversion();

        try {
            if (mail($to, $subject, $content, $headers)) {
                echo "Votre message a bien été envoyé à " . $to;
            } else {
                throw new Exception("Une erreur est survenue lors de l'envoi du message.");
            }
        } catch (Exception $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }

    public function postMail($sendMail, $subject, $content)
    {
        $db = $this->db->getPDO();
        $query = $db->prepare('INSERT INTO messages (mail, subject, content, date) VALUES (?, ?, ?, NOW())');
        $query->execute([$sendMail, $subject, $content]);
    }
}

if (isset($_POST['sendMail'])) {
    $to = "enzo.keil06@gmail.com"; // Assurez-vous que cette variable est correctement définie

    // Validation des entrées utilisateur
    $sendMail = filter_var($_POST['sendMail'], FILTER_VALIDATE_EMAIL);
    $subject = htmlspecialchars($_POST['subject'], ENT_QUOTES, 'UTF-8');
    $content = htmlspecialchars($_POST['content'], ENT_QUOTES, 'UTF-8');

    $Mail = new Mail();
    $Mail->sendMail($to, $subject, $content);
    $Mail->postMail($sendMail, $subject, $content);

    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = $to;
    $mail->Password = $_ENV['MAIL_PASSWORD'];
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    try {
        $mail->setFrom($sendMail);
        $mail->addAddress($to);
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $content;

        $mail->send();
        echo "Message envoyé !";
    } catch (Exception $e) {
        echo "Erreur lors de l'envoi de l'e-mail : " . $mail->ErrorInfo;
    }
}
?>