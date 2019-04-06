<head>
    <meta http-equiv="refresh" content="60">
</head>
<?php

///
// echo 'Helo world!';
echo date('Y-m-d');

?>
<pre>
 <strong style="text-decoration: underline">zadanie:</strong>
 Wyświetl tekst: "minuta parzysta" lub "minuta nieparzysta" dla aktualnej minuty.
 <strong style="text-decoration: underline">materiały</strong>:
 php date() w GOOGLE :),
 date('i') - pobranie minuty,
 (reszta z dzielenia) modulo 2 z liczby a w języku PHP: a % 2
    <strong style="text-decoration: underline;">rozwiązanie</strong>
</pre>
1.
<?php

$i = date('i');
if ($i % 2 == 0) {
    echo "minuta parzysta";
} else {
    echo "minuta nieparzysta";
}

?>
<br>
2. <?= (date('i') % 2 == 0) ? "minuta parzysta" : "minuta nieparzysta" ?>

<p><br></p>

<pre>
 <strong style="text-decoration: underline">zadanie:</strong>
 oblicz sumę cyfr własnego numeru PESEL:
 <strong style="text-decoration: underline">wskazówka</strong>:
 PESEL to 11 cyfr w odpowiednim układzie, dla ułatwienia nie sprawdzamy jego poprawności.
</pre>
<?php

$pesel = 75092312234;
$pesel=(string)$pesel;
if (strlen($pesel) != 11) {
    echo 'pesel nieprawidłowy';
} else {
    $suma = 0;
    for ($i=0; $i < 11; $i++) {
        //$suma = $suma + $pesel[$i];
        $suma += $pesel[$i];
    }
    echo '1. suma cyfr numeru pesel: '.$pesel.' to: '.$suma .'<br>';
    echo '2. (trick) suma cyfr numeru pesel: '.$pesel.' to: '.array_sum(str_split($pesel)) .'<br>';

    for ($i=0, $max = strlen($pesel), $suma=0; $i < $max; $i++) {
        $suma += $pesel[$i];
    }
    echo '3. suma cyfr numeru pesel: '.$pesel.' to: '.$suma .'<br>';


    
}



