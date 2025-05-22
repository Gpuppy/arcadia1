<?php

session_start();

require_once __DIR__ . '/../vendor/autoload.php';

/*$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();*/
if (file_exists(__DIR__ . '/../.env')) {
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
    $dotenv->load();
}


//var_dump($_ENV['SMTP_USERNAME'] ?? 'not set', getenv('SMTP_USERNAME'));
//exit;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


/*if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST['name'] ?? '';
    $emailFrom = $_POST['email'] ?? '';
    $subject = $_POST['subject'] ?? '';
    $message = $_POST['message'] ?? '';*/

$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$subject = $_POST['subject'] ?? '';
$message = $_POST['message'] ?? '';

    $old = compact('name', 'email', 'subject','message');
    $errors = [];

    if (empty($name)) {
        $errors ['name'] = "Le nom est necessaire. ";
        }

    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Un email valide est requis.";
    }

    if (empty($subject)) {
        $errors['subject'] = "le sujet est requis.";
    }

    if (empty($message)) {
        $errors['message'] = "le message ne peux étre vide.";
    }

    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        $_SESSION['old'] = $old;
        header('Location:contact.php');
        exit;
    }
        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->SMTPAuth = true;
            $mail->Host = "smtp.gmail.com";
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;
            $mail->Username = $_ENV['SMTP_USERNAME'];
            $mail->Password = $_ENV['SMTP_PASSWORD'];
            //$mail->Username = 'gadetreg@gmail.com';
            //$mail->Password = 'nnqyhfhguxelwplc';
            $mail->setFrom('gadetreg@gmail.com', 'Arcadia');
            $mail->addAddress("gadetreg@gmail.com", "Gael");
            $mail->addReplyTo($email, $name);  // ← the user's email
            $mail->Subject = $subject;
            $mail->Body = "Message from $name ($email):\n\n$message";

            $mail->send();

            header('Location:email_sent.php');

        } catch (Exception $e) {
            echo "Erreur lors de l'envoi: {$mail->ErrorInfo}";

    } /*else {
        // Show validation errors
        echo implode("<br>", $errors);
    }*/





