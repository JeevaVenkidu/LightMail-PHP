<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/phpmailer/Exception.php';
require __DIR__ . '/phpmailer/SMTP.php';
require __DIR__ . '/phpmailer/PHPMailer.php';
require __DIR__ . '/templates/contact-template.php';

function sendMail($config, $name, $email, $subject, $message) {
    $mail = new PHPMailer(true);

    try {
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host       = $config['SMTP_HOST'];
        $mail->SMTPAuth   = true;
        $mail->Username   = $config['SMTP_USER'];
        $mail->Password   = $config['SMTP_PASS'];
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = $config['SMTP_PORT'];

        // From & Reply-To
        $mail->setFrom($config['MAIL_FROM'], $config['MAIL_FROM_NAME']);
        $mail->addReplyTo($email, $name); // <-- important
        $mail->addAddress($config['MAIL_TO']);

        // Email content
        $mail->isHTML(true);
        $mail->Subject = "New Contact Form: " . htmlspecialchars($subject, ENT_QUOTES);
        $mail->Body    = contactEmailTemplate($name, $email, $subject, $message);
        $mail->AltBody = "Name: $name\nEmail: $email\nSubject: $subject\nMessage: $message"; // <-- plain text

        $mail->send();
        return true;
    } catch (Exception $e) {
        error_log("Mail Error: " . $mail->ErrorInfo);
        throw $e;
    }
}
