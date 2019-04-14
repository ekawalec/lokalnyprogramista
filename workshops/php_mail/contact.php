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
    ///
    /// Walidacja
    if (strlen($_POST['message']) < 3 && strlen($_POST['message']) > 2500) {
        echo "BLAD: wiadomosc powinna miec dlugosc od 3-2500 znakow";
    }
    elseif (empty($_POST['recipient']) || !array_key_exists($_POST['recipient'], $recipients)) {
        echo "BLAD: adresat nieznany";
    }
    else {

        // pobieram sobie konfigurację do wysyłki maila z pola $_POST['account']

        $cfg = $mail_config['gmail'];
        $recipient = $recipients[$_POST['recipient']];

        // Create the Transport
        $transport = (new Swift_SmtpTransport($cfg['server'], $cfg['port'], $cfg['encrypt']))
            ->setUsername($cfg['login'])
            ->setPassword($cfg['passwd'])
        ;

        // Create the Mailer using your created Transport
        $mailer = new Swift_Mailer($transport);

        // Create a message
        $message = (new Swift_Message($recipient['description']))
            ->setFrom($cfg['login'])
            // ->setTo($_POST['recipient'])
            // podmieniam adresata na osobę z tablicy $recipients
            ->setTo($recipient['email'])
            ->setBody($_POST['message'])
        ;

        // Send the message
        $result = $mailer->send($message);
        if ($result) {
            echo "wiadomosc zostala wyslana";
        } else {
            echo "wiadomosc NIE zostala wyslana";
        }
    }







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
    wybierz temat wiadomości:<br>
    <select name="recipient" id="">
        <?php foreach($recipients as $_key => $_recipient): ?>
            <option value="<?= $_key ?>"><?= $_recipient['description'] ?></option>
        <?php endforeach; ?>
    </select>
    <br>
    <textarea name="message" id="" cols="30" rows="10" placeholder="treść wiadomości"></textarea>
    <br>
    <input type="submit" name="sendMessage" id="" value="Wyślij">
</form>
</body>
</html>

