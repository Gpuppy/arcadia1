<?php

require_once __DIR__ . '/../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


if ($_SERVER["REQUEST_METHOD"] === "POST") {


    $name = $_POST['name']?? '';
    $emailFrom = $_POST['email']?? '';
    $subject = $_POST['subject']?? '';
    $message = $_POST['message']?? '';

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
    $mail->addAddress("gadetreg@gmail.com","Gael");
    $mail->addReplyTo($emailFrom, $name);  // ← the user's email

    $mail->Subject = $subject;
    $mail->Body = "Message from $name ($emailFrom):\n\n$message";

    $mail->send();

    //echo "Votre email a bien été envoyé :)";
    } catch (Exception $e) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }
}





