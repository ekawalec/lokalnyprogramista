<?php
/**
 * Created by IntelliJ IDEA.
 * User: jaszczomp
 * Date: 2019.04.07
 * Time: 09:04
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<form action="">
    <input type="text" name="year" required>
    <input type="text" name="month" required>
    <input type="text" name="day" required>
    <input type="submit" name="sendButton" value="DALEJ">
</form>
<pre>
<strong>Zadanie</strong>
Odbierz dane urodzin użytkownika i wskaż jaki to był dzień tygodnia.
</pre>

<p>
    <?php
        // tu twój kod
        // skrypt zadziałą tylko po wysłaniu formularza lub odebraniu danych z adresu
        if (isset($_GET['sendButton']) && $_GET['sendButton']=='DALEJ') {

            // buduję datę w formacie: yyyy-mm-dd - dane odebrane z formularza:
            $date = $_GET['year'] .'-'. $_GET['month'] . '-' . $_GET['day'];
            echo 'podano datę: '. $date;
            echo '<BR>';
            $timestamp = strtotime($date);
            echo 'data po zamianie na sek w formacie Unix timestamp: '.$timestamp;
            echo '<BR>';
            echo 'dzien tygodnia odczytany z daty: '. date('l', $timestamp);

        }

    ?>


</p>
</body>
</html>
