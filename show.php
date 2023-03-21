<?php
require 'database.php';

$stm = $pdo->prepare("SELECT * FROM kitoblar");
$stm->execute();
$books = $stm->fetchAll();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete'])){
    $post_id = $_POST['post_id'];
    $stm = $pdo->prepare("DELETE FROM kitoblar WHERE id = ?");
    $stm->execute([$post_id]);
    header("location: show.php");
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
    <link rel="stylesheet" href="list.css">
    <link rel="icon" type="image/png" href="image/icon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<div class="mt-4 w-50 mx-auto">
    <h1 class="display-4 text-center"><i class="fas fa-book-open text-warning"></i> Y.S<span class="text-warning"> Kitoblar </span>ro'yxati</h1>

    <table class="table table-striped mt-5 text-center">
        <thead>
        <tr>
            <th>Nomi</th>
            <th>Muallif</th>
            <th>Yili</th>
        </tr>
        </thead>
        <tbody id="book-list" class="book">
        <?php foreach ($books as $book): ?>
        <tr>
            <td><?php echo $book['nomi']?></td>
            <td><?php echo $book['author']?></td>
            <td><?php echo $book['yili']?>
                <div class="inl">
                    <a href="list_edit.php?id=<?=$book['id']?>" class="but"><img src="image/free-icon-edit-tools-8848045.png" class="icon" alt="icon"></a>
                <form action="" method="POST">
                    <input type="hidden" name="post_id" value="<?= $book['id'] ?>">
                    <input type="hidden" name="delete">
                    <button class="but" type="submit"><i class="fas fa-trash"></i></button>
                </form>
                </div>
            </td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <a href="index.html" type="button" class="btn btn-warning btn-block mt-3 text-white w-500 mb-5">Qo'shish oynasiga o'tish</a>
</div>

</body>
</html>

