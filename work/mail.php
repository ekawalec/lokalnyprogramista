<?php
/**
 * Created by IntelliJ IDEA.
 * User: jaszczomp
 * Date: 2019.04.07
 * Time: 16:28
 */

// dopinam bibliotekę SwiftMailer - pobraną z GitHub
// https://github.com/swiftmailer/swiftmailer
// dokumentacja: https://swiftmailer.symfony.com/docs/introduction.html
//
// pobieramy przez composer
// composer require "swiftmailer/swiftmailer:^6.0"

require 'vendor/autoload.php';
require "mail_cfg.php";


// tu twój kod php

if (isset($_POST['sendMessage'])) {
    /// tu wysyłka maila
    /// https://swiftmailer.symfony.com/docs/introduction.html
    ///

    // Create the Transport
    $transport = (new Swift_SmtpTransport($server, $port, $encrypt))
        ->setUsername($login)
        ->setPassword($passwd)
    ;

    // Create the Mailer using your created Transport
    $mailer = new Swift_Mailer($transport);

    // Create a message
    $message = (new Swift_Message($_POST['topic']))
        ->setFrom($login)
        ->setTo($_POST['recipient'])
        ->setBody($_POST['message'])
    ;

    // Send the message
    $result = $mailer->send($message);





}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP wysyła maile przez SMTP</title>
</head>
<body>
<form action="" method="post">
    <input type="text" name="topic" id="" placeholder="temat"><br>
    <input type="text" name="recipient" id="" placeholder="adresat"><br>
    <textarea name="message" id="" cols="30" rows="10" placeholder="treść wiadomości"></textarea>
    <input type="submit" name="sendMessage" id="" value="Wyślij">
</form>
</body>
</html>

