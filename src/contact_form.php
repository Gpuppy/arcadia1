<?php

require_once __DIR__ . '/../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;



if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST['name'] ?? '';
    $emailFrom = $_POST['email'] ?? '';
    $subject = $_POST['subject'] ?? '';
    $message = $_POST['message'] ?? '';

    $errors = [];
    $old = $_POST;

    if (empty($name)) {
        $errors [] = "Le nom est necessaire. ";
        }

    if (empty($emailFrom) || !filter_var($emailFrom, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Un email valide est requis.";
    }

    if (empty($subject)) {
        $errors[] = "le sujet est requis.";
    }

    if (empty($message)) {
        $errors[] = "le message ne peux étre vide.";
    }

    if (empty($errors)) {

        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->SMTPAuth = true;

            $mail->Host = "smtp.gmail.com";
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->Username = 'gadetreg@gmail.com';
            $mail->Password = 'nnqyhfhguxelwplc';

            $mail->setFrom('gadetreg@gmail.com', 'Arcadia');
            $mail->addAddress("gadetreg@gmail.com", "Gael");
            $mail->addReplyTo($emailFrom, $name);  // ← the user's email

            $mail->Subject = $subject;
            $mail->Body = "Message from $name ($emailFrom):\n\n$message";

            $mail->send();
            echo header('Location:email_sent.php');
        } catch (Exception $e) {
            echo "Erreur lors de l'envoi: {$mail->ErrorInfo}";
        }
    } else {
        // Show validation errors
        echo implode("<br>", $errors);
    }
}




