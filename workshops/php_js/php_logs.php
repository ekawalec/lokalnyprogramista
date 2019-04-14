<?php

echo '<h3>TWOJE LOGI</h3>';

$filename = date('Ymd').'.txt';
$path = '_logs/';
?>
<p>
    Odczyt logów na 3 różne sposoby
</p>
<div>
    <h2>Do textarea bez obróbki</h2>
    <textarea><?= file_get_contents($path.$filename)?></textarea>
</div>
<div>
    <h2>Do bloku i obróbka funkcją PHP nl2br</h2>
    <?= nl2br(file_get_contents($path.$filename)) ?>
</div>
<div>
    <h2>Do znacznika PRE bez obróbki</h2>
    <pre><?= file_get_contents($path.$filename) ?></pre>
</div>
