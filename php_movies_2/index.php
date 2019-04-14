<?php
// zapis wizyty do logów
$filename = date('Ymd').'.txt';
$path = 'logs'.DIRECTORY_SEPARATOR;

/*if (!file_exists($path.$filename)) {
    $file = fopen($path.$filename, 'w');
    fclose($file);
}*/
$mtime = explode('.', microtime()); // rozbijanie stringów pod kątem innego stringa
$mtime = substr($mtime[1], 2, 4);

$file = fopen($path.$filename, 'a');
fwrite($file, date('H:i:s').'.'.$mtime.' '.$_SERVER['REMOTE_ADDR']."\n");
fclose($file);



// wizyta w ciastku
setcookie('entry_php', 1, time()+3600);

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


// tu do $model pobiorę film, którego ID zostało wywołane w adresie
$model = null;
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $query = "SELECT * FROM movie WHERE id=".$_GET['id']." LIMIT 1";
    $resource = $db->query($query);
    $model = $resource->fetch_assoc();
    $resource->free();

    // tu odczytam recenzje do filmu jeśli został znaleziony w bazie
    $reviews = [];
    if (!empty($model)) {
        $query = "SELECT * FROM review WHERE movie_id=" . $model['id'] . ";";
        $resource = $db->query($query);
        while ($row = $resource->fetch_assoc()) {
            $reviews[$row['id']] = $row;
        }
        $model['reviews'] = $reviews;
        $resource->free();
    }

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>LokalnyProgramista #1 - <?= !empty($model) ? $model['title'].' - ' : '' ?>My favourite movies</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

<header>
    <div class="collapse bg-dark" id="navbarHeader">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-md-7 py-4">
                    <h4 class="text-white">O projekcie</h4>
                    <p class="text-white">
                        <strong>wersja rozbudowana</strong><br>
                        użycie: <strong>PHP</strong>, <strong>MySQL</strong>, <strong>HTML</strong>, <strong>jQuery</strong>, <strong>Bootstrap</strong><br>
                        możliwości: zapis logów wizyt w tle (folder logs), przeglądanie filmów, recenzji, komentarzy, komentowanie recenzji.
                    </p>
                </div>
                <div class="col-sm-4 offset-md-1 py-4">
                    <h4 class="text-white">Contact</h4>
                    <ul class="list-unstyled">
                        <li><a href="https://www.facebook.com/edmund.kawalec" class="text-white">Like on Facebook</a></li>
                        <li><a href="mailto:e.kawalec@gmail.com" class="text-white">Email me</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="navbar navbar-dark bg-dark shadow-sm">
        <div class="container d-flex justify-content-between">
            <a href="<?= basename(__FILE__) ?>" class="navbar-brand d-flex align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="mr-2" viewBox="0 0 24 24" focusable="false"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/><circle cx="12" cy="13" r="4"/></svg>
                <strong>Album</strong>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </div>
</header>

<main id="main" class="bg-light">

    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">My Favourite Movies Album</h1>
            <p class="lead text-muted">All made for your purpose :)</p>
            <p class="lead text-muted">
                <?php
                    if (isset($_COOKIE['entry_javascript'])) {
                        echo 'Welcome again dear user ;)';
                    } else {
                        echo 'Welcome stranger :)';
                    }
                ?>
            </p>
        </div>
    </section>



    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <?php if (!empty($model)): ?>
                    <div class="row">
                        <?php if (!empty($model['poster'])): ?>
                            <div class="col-md-3">
                                <a data-fancybox="gallery" href="<?= $model['poster'] ?>" title="<?= $model['title'] ?>">
                                    <img src="<?= $model['poster'] ?>" alt="<?= $model['title'] ?>" class="img-thumbnail" />
                                </a>
                            </div>
                        <?php endif; ?>
                        <div class="col-md-<?= empty($model['poster']) ? '12' : '9' ?>">
                            <h1><?= $model['title'] ?> (<?= $model['year'] ?>)</h1>
                            <p>
                                <?= !empty($model['description']) ? $model['description'] : 'description text coming soon' ?>
                            </p>
                        </div>
                    </div>
                    <p>
                        <?= !empty($model['tech_info']) ? $model['tech_info'] : 'tech_info coming soon' ?>
                    </p>
                    <a name="reviews"></a>
                    <h4>Reviews: <?= count($model['reviews']) ?></h4>
                    <div class="row">
                        <div class="col-sm-12">

                            <?php if (isset($_GET['rev']) && isset( $model['reviews'][$_GET['rev']] )): ?>
                            <div class="col-sm-12">
                                <?php $review = $model['reviews'][$_GET['rev']]; ?>
                                <h4><?= $review['title'] ?></h4>
                                <p><?= $review['content'] ?></p>
                                <p class="text-center">
                                    <a href="<?= basename(__FILE__) ?>?id=<?= $model['id'] ?>#reviews"
                                       class="btn btn-sm btn-success">More reviews</a>
                                </p>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <h5>Comments:</h5>
                                    <form action="comment.php" method="post">
                                        <input type="hidden" name="review_id" value="<?= $review['id'] ?>" required>
                                        <input type="text" placeholder=".. your nick" name="author" required ><br>
                                        <textarea name="content" placeholder=".. your comment"
                                                  cols="50" rows="5" required></textarea>
                                        <p class="text-center">
                                            <input type="submit" value="Save">
                                        </p>
                                    </form>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <?php
                                    $query = "SELECT * FROM comment WHERE review_id = {$review['id']} ORDER BY id DESC;";
                                    $resource = $db->query($query);
                                    $comments = [];
                                    while ($row = $resource->fetch_assoc()) {
                                        $comments[] = $row;
                                    }
                                    $resource->free();
                                    ?>
                                    <div class="clearfix"></div>
                                    <?php foreach ($comments as $comment): ?>
                                        <div>
                                            <div>
												<small><?= date('Y-m-d H:i:s',$comment['created_at']) ?></small> 
												<strong><?= $comment['author'] ?></strong>
											</div>
                                            <p><?= $comment['content'] ?></p>
                                        </div>
                                    <?php endforeach; ?>

                                </div>
                            </div>



                        <?php else: ?>
                            <div class="row">
                                <?php foreach ($model['reviews'] as $review): ?>
                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                        <h5><?= $review['title'] ?></h5>
                                        <p><?= substr($review['content'], 0, 200) ?>...
                                            <a href="<?= basename(__FILE__) ?>?id=<?= $model['id'] ?>&rev=<?=
                                            $review['id'] ?>#reviews"
                                               class="btn btn-sm btn-primary">Read more &raquo;  </a>
                                        </p>
                                    </div>
                                <?php endforeach; ?>
                            </div>

                        <?php endif; ?>
                        </div>

                    </div>




                <?php else: ?>
                    <p class="lead text-muted">Welcome, choose film position from right sidebar :)</p>
                    <p><img src="https://picsum.photos/600/400" alt=""></p>
                <?php endif; ?>
            </div>
            <div class="col-md-4">
                <h3>Already seen</h3>
                <ul>
                    <?php foreach ($movies_active as $movie): ?>
                        <li>
                            <a href="<?= basename(__FILE__) ?>?id=<?= $movie['id'] ?>">
                                <?= $movie['title'] ?> (<?= $movie['year'] ?>)
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <h3>Wait in queue</h3>
                <ul>
                    <?php foreach ($movies_inactive as $movie): ?>
                        <li>
                            <a href="<?= basename(__FILE__) ?>?id=<?= $movie['id'] ?>">
                                <?= $movie['title'] ?> (<?= $movie['year'] ?>)
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>

    </div>


</main>

<footer class="text-muted">
    <div class="container">
        <p class="float-right">
            <a href="#">Back to top</a>
        </p>
        <p>Movies album made for <strong>LokalnyProgramista.pl</strong>!</p>

    </div>
</footer>



<script src="https://code.jquery.com/jquery-3.3.1.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
<script>
    Cookies.set('entry_javascript', 'ok');


</script>

</body>
</html>
<?php
$db->close();
