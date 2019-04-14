<?php

$db = new mysqli('localhost', 'root', '', 'lokalny');
$db->set_charset('utf8');

// tu aktywne
$query = "SELECT * FROM movie WHERE active=1 ORDER BY year ASC LIMIT 5";
$resource = $db->query($query);
$movies_active = [];
while ($row = $resource->fetch_assoc()) {
    $movies_active[] = $row;
}
$resource->free();

// tu nieaktywne
$query = "SELECT * FROM movie WHERE active=0 ORDER BY id ASC LIMIT 5";
$resource = $db->query($query);
$movies_inactive = [];
while ($row = $resource->fetch_assoc()) {
    $movies_inactive[] = $row;
}
$resource->free();


// tu mogę dokonać więcej operacji pobierania itp
// ...


$db->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>LokalnyProgramista #1 2019 - My favourite movies</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="jumbotron">
        <p>
            <strong>wersja prosta</strong><br>
            użycie: <strong>PHP</strong>, <strong>MySQL</strong>, <strong>HTML</strong>, <strong>jQuery</strong>, <strong>Bootstrap</strong><br>
            Przykładowy sposób wyświetlania danych z bazy - klikaj na tytuły filmów aby rozwinąć.
        </p>

    </div>
    <div class="row">
        <div class="col">
            <?php foreach ($movies_active as $movie): ?>
                <h3 data-toggle="collapse" data-target="#movie-<?= $movie['id'] ?>">
                    <?= $movie['title'] ?> (<?= $movie['year'] ?>)
                </h3>
                <div class="collapse" id="movie-<?= $movie['id'] ?>">
                    <p class="bg-dark text-light"><?= $movie['description'] ?></p>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="col">
            <?php foreach ($movies_inactive as $movie): ?>
                <h3 data-toggle="collapse" data-target="#movie-r-<?= $movie['id'] ?>">
                    <?= $movie['title'] ?> (<?= $movie['year'] ?>)
                </h3>
                <div class="collapse" id="movie-r-<?= $movie['id'] ?>">
                    <p class="bg-dark text-light"><?= $movie['description'] ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>