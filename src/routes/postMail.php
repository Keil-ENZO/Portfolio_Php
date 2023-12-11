<?php 
namespace Mail;

require_once '../db/conectDb.php';
include('../../env.php');

use Database\DBConnection;

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
    $sendMail = $_POST['sendMail'];
    $subject = $_POST['subject'];
    $content = $_POST['content'];

    $Mail = new Mail();
    $Mail->sendMail($to, $subject, $content);
    $Mail->postMail($sendMail, $subject, $content);
}


?>