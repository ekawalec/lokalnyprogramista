<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Podatki, rzecz pewna jak śmierć</title>
</head>
<body>


<form action="">
    <input type="number" placeholder="kwota netto" name="netto" required step="0.01" min="0.01" max="1000000">
    <button type="submit">DALEJ</button>
</form>
<pre>
<strong>Zadanie:</strong>
Policz cenę brutto od podanej w formularzu. Stawka VAT: 23%.
</pre>
<p>
    <?php

    // tu twój kod
    $vat = 23;
    $netto = (float)$_GET['netto'];
    $brutto = $netto * (1 + $vat/100);
    echo 'wartość netto: '. $netto;
    echo '<br>';
    echo 'wartość brutto: '. $brutto;
    echo '<br>';
    echo 'wartość brutto [via round()]: '. round($brutto, 2);
    echo '<br>';
    echo 'wartość brutto [via number_format()]: '. number_format($brutto, 2);


    ?>
</p>


<form action="">
    <input type="number" placeholder="kwota brutto" name="brutto" required step="0.01" min="0.01" max="1000000">
    <button type="submit">DALEJ</button>
</form>
<pre>
<strong>Zadanie:</strong>
Policz cenę netto od podanej brutto w formularzu. Stawka VAT: 23%.
</pre>
<p>
    <?php
        // tu kod :)
    ?>
</p>

</body>
</html>