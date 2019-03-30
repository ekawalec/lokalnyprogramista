<?php

// uzupełnijmy dane - brakujące: created_at,
$record = $_POST;
$record['created_at'] = time(); // time() zwraca ilośc sekund od 1970-01-01 01:00:00

// walidacja poprawności danych
// pozbywam się znaczników:
$record['content'] = strip_tags($record['content']);
// pozbywam się niedokończonych znaków specjalnych
$record['content'] = addslashes($record['content']);
// usuwam białe spacje na początku i końcu tekstu:
$record['content'] = trim($record['content']);


// cenzura - zastąpię zwroty wulgarne ciągiem: [***]
$bad_words = [
    'dupa',
    'pierd',
    'kurw',
    'huj',
    'chuj',
    'hooy',
    'wtf'
];
$replacement = [
    'kuper',
    'bąk',
    'lal',
    'penis',
    'mój mały członek',
    'ale mały złamas',
    'Hmmmmm...'
];
$record['content'] = str_replace($bad_words, $replacement, $record['content']);

//var_dump($record);
// die();

// dostajemy sie do bazy danych
$db = new mysqli('localhost', 'root', '', 'lokalny');
$db->set_charset('utf8');

// budujemy query: INSERT INTO....
$query = "INSERT INTO comment (id, review_id, content, author, created_at) 
VALUES (
  NULL, 
  '{$record['review_id']}', 
  '{$record['content']}', 
  '{$record['author']}', 
  '{$record['created_at']}'
)";
// wysyłamy zapytanie
$resource = $db->query($query);
// $resource->free();
// disconnect z bazą
$db->close();

// wracamy do strony
// - albo za pomocą adresu referencyjnego (*)
// - albo za pomocą własnej konstrukcji linka

header('Location: '.$_SERVER['HTTP_REFERER']);
exit;