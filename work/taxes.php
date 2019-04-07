<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Podatki, rzecz pewna jak śmierć</title>
</head>
<body>


<pre>
<strong>Zadanie:</strong>
Policz cenę brutto od podanej w formularzu. Stawka VAT: 23%.
</pre>
<form action="">
    <input type="number" placeholder="kwota netto" name="netto" required step="0.01" min="0.01" max="1000000">
    <button type="submit">DALEJ</button>
</form>
<p>
    <?php

    // tu twój kod
    $vat = 23;

    if (isset($_GET['netto'])) {
        $netto = (float)$_GET['netto'];
        $brutto = $netto * (1 + $vat/100);
        echo 'wartość netto: '. $netto;
        echo '<br>';
        echo 'wartość brutto: '. $brutto;
        echo '<br>';
        echo 'wartość brutto [via round()]: '. round($brutto, 2);
        echo '<br>';
        echo 'wartość brutto [via number_format()]: '. number_format($brutto, 2);
    }

    ?>
</p>

<hr>

<pre>
<strong>Zadanie:</strong>
Policz cenę netto od podanej brutto w formularzu. Stawka VAT: 23%.
</pre>
<form action="">
    <input type="number" placeholder="kwota brutto" name="brutto" required step="0.01" min="0.01" max="1000000">
    <button type="submit">DALEJ</button>
</form>
<p>
    <?php
        if (isset($_GET['brutto'])) {
            // tu kod :)
            $brutto = (float)$_GET['brutto'];
            $netto = $brutto / (1 + $vat/100);
            echo '<br>';
            echo 'wartość netto: '. round($netto, 2);
        }

    ?>
</p>

<hr>

<pre>
<strong>Zadanie:</strong>
Pobierz aktualną tabelę kursów walut z NBP.
</pre>
<form action="">
    <input type="submit" name="getCurrency" value="Pobierz" >
</form>
<p>
    <?php
    if (isset($_GET['getCurrency']) && $_GET['getCurrency']=='Pobierz') {
        $table = 'a';
        $url = 'http://api.nbp.pl/api/exchangerates/tables/'.$table;
        echo $url;
        echo '<br>';
        $data = file_get_contents($url);
        echo '<br>';
        echo 'Format JSON: <br>';
        echo $data;
    }

    ?>
</p>
</body>
</html>