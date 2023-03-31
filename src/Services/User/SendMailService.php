<?php

namespace App\Services\User;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

//require '../../../vendor/autoload.php';

class SendMailService
{
    public function __construct()
    {
    }

    public function send($user, $password)
    {

        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->Host = 'ssl://smtp.yandex.ru';
        $mail-> Port = 465;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->SMTPAuth = true;
        $mail->Username = 'instantremember@yandex.ru';
        $mail->Password = 'tlcrnokrstrrfpfp';
        $mail->setFrom('instantremember@yandex.ru', 'Instant Remember');
        $mail->addAddress($user);
        $mail->Subject = 'Reset Password';
        $mail->Body = 'Новый пароль:  ' . $password;

        if (!$mail-> send()) {
            echo 'Mailer Error: '. $mail->ErrorInfo;
        } else {
            echo 'Message sent!';
        }


    }
}