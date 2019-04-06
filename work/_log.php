<?php

echo '<h3>TWOJE LOGI</h3>';

$filename = date('Ymd').'.txt';
$path = '../logs/';
?>
<div>
    <textarea><?= file_get_contents($path.$filename)?>
    </textarea>
</div>
<div>
    <?= nl2br(file_get_contents($path.$filename)) ?>
</div>
<div>
    <pre><?= file_get_contents($path.$filename) ?></pre>
</div>
