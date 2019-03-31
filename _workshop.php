<?php
$filename = date('Ymd').'.txt';
$path = 'logs/';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>_hidden area</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <p class="">
        <button id="clearCookies" class="btn btn-sm btn-success">Clear COOKIE</button>
        <button id="getLog" class="btn btn-sm btn-warning">Show log</button>
        <button id="getLogPhp" class="btn btn-sm btn-info">Show log via PHP</button>
        <button id="getHtml" class="btn btn-sm btn-primary">Get HTML code</button>
        <button id="getJson" class="btn btn-sm btn-danger">Get JSON</button>
    </p>
    <div class="row">
        <div class="col-sm-6">
            <div id="log"></div>
        </div>
        <div class="col-sm-6">
            <div id="myHtml"></div>
        </div>
    </div>
</div>




<script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>

<script src="https://code.jquery.com/jquery-3.3.1.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script>

    $('#clearCookies').click(function() {
        Cookies.remove('entry_php', { path: '' });
        Cookies.remove('entry_php');
        alert('cookies remove');
    });

    $('#getLog').click(function() {
        $.ajax({
            method: 'get',
            url: '<?= $path.$filename ?>',
            success: function(response) {
                //alert(response);
                $('#log').text(response);
            }
        })
    });

    $('#getLogPhp').click(function() {
        $.ajax({
            method: 'get',
            url: '_log.php',
            success: function(response) {
                //alert(response);
                $('#log').text(response);
            }
        })
    });

    $('#getJson').click(function() {
        $.ajax({
            method: 'get',
            url: '_ajax.php',
            dataType: 'json',
            success: function(response) {
                $('#log').html('<h2>pobranych rekordów: ' + response.length + '</h2>');
                $(response).each(function( index, element ) {
                    $('#log').append('<h3>'+element.title+' (' + element.year + ')</h3>');
                    $('#log').append('<div>'+element.description+'</div>');
                });
            }
        })
    });

    $('#getHtml').click(function() {
        $('#myHtml').html('');
        $.ajax({
            method: 'get',
            url: 'data/1.html',
            success: function(response) {
                //alert(response);
                $('#myHtml').html(response);
            }
        })
    });

    $(document).ready(function () {
        $.ajax({
            method: 'get',
            url: 'data/1.html',
            success: function(response) {
                //alert(response);
                $('#myHtml').html(response);
            }
        })

    });


</script>

</body>
</html>
