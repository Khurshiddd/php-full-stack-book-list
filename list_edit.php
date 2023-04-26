<?php
require 'database.php';

$id = $_GET['id'];

$stm = $pdo->prepare("SELECT * FROM kitoblar WHERE id = ?");
$stm->execute([$id]);
$book = $stm->fetch();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['PUT'])) {
    $id = $_POST['post_id'];
    $nomi = $_POST['nomi'];
    $author = $_POST['author'];
    $yili = $_POST['yili'];

    $stm = $pdo->prepare("UPDATE kitoblar SET nomi=:nomi, author=:author,yili=:yili WHERE id=:id");
    $stm->execute([
        'nomi'=>$nomi,
        'author'=>$author,
        'yili'=>$yili,
        'id'=>$id,
    ]);
    header('location:show.php');
    exit();
}


?>
<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link
        rel="stylesheet"
        href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
        crossorigin="anonymous"
    />
    <link rel="stylesheet" href="https://bootswatch.com/4/flatly/bootstrap.min.css" />
    <title>Kitolar ro'yxati</title>
    <link rel="icon" type="image/png" href="image/icon.png">
</head>
<body>
<div class="mt-4 w-50 mx-auto">
    <h1 class="display-4 text-center"><i class="fas fa-book-open text-warning"></i> Y.S<span class="text-warning"> Kitoblar </span>ro'yxati</h1>
    <form id="book-form" action="" method="POST">
        <input type="hidden" name="PUT">
        <input type="hidden" name="post_id" value="<?=$book['id']?>">
        <div class="form-group">
            <label for="title">Nomi</label>
            <input type="text" id="title" value="<?=$book['nomi']?>" class="form-control" name="nomi" />
        </div>

        <div class="form-group">
            <label for="author">Muallif</label>
            <input type="text" id="author" value="<?=$book['author']?>" class="form-control" name="author"/>
        </div>

        <div class="form-group">
            <label for="year">Yili</label>
            <input type="text" id="year" value="<?=$book['yili']?>" class="form-control" name="yili"/>
        </div>
        <input type="submit" id="btn" value="Kitobni tahrirlash" class="btn btn-warning btn-block" />
    </form>
    <a href="show.php" class="btn btn-warning btn-block mt-3 text-decoration-none text-white w-500">Kitoblar listini ko'rish</a>
</div>

</body>
</html>

