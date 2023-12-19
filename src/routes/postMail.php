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


$to = "enzo.keil06@gmail.com";


class Mail {


    public function sendMail($to, $subject, $content) {
        $headers = "Content-type: text/html; charset=utf-8\r\n";
        $headers .= "From: $to\r\n";
        $headers .= "Reply-To: $to\r\n";
        $headers .= "X-Mailer: PHP/" . phpversion();
    
        if(mail($to, $subject, $content, $headers)) {
            echo "Votre message a bien été envoyé à " . $to;
        } else {
            echo "Une erreur est survenue lors de l'envoi du message";
        }
    }
    

    private $db;

    public function __construct()
    {
        // Utilisation de $_ENV directement pour accéder aux variables d'environnement
        $this->db = new DBConnection($_ENV['DB_HOST'], $_ENV['DB_USER'], $_ENV['DB_PASSWORD'], $_ENV['DB_DATABASE'], $_ENV['DB_PORT']);
    }

    public function postMail($sendMail, $subject, $content) {
        $db = $this->db->getPDO();
        $query = $db->prepare('INSERT INTO messages (mail, subject, content, date) VALUES (?, ?, ?, NOW())');
        $query->execute([$sendMail, $subject, $content]);
    
    }

}

if(isset($_POST['sendMail'])) {

    $mail = new PHPMailer(true);
    $mail -> isSMTP();
    $mail -> Host = 'smtp.gmail.com';
    $mail -> SMTPAuth = true;
    $mail -> Username = $to;
    $mail -> Password = $_ENV['MAIL_PASSWORD'];
    $mail -> SMTPSecure = 'ssl';
    $mail -> Port = 465;

    

    $sendMail = $_POST['sendMail'];
    $subject = $_POST['subject'];
    $content = $_POST['content'];

    $Mail = new Mail();
    $Mail->sendMail($to, $subject, $content);
    $Mail->postMail($sendMail, $subject, $content);

    $mail->setFrom($sendMail);
    $mail->addAddress($to);
    $mail->isHTML(true);
    $mail->Subject = $_POST['subject'];
    $mail->Body = $_POST['content'];

    $mail->send();

    echo "Message envoyé !";
}


?>