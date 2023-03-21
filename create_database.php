<?php
require 'database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nomi = $_POST['nomi'];
    $author = $_POST['author'];
    $yili = $_POST['yili'];

    $stm = $pdo->prepare("INSERT INTO kitoblar (nomi, author,yili) VALUES (:nomi, :author, :yili)");
    $stm->execute([
        'nomi'=>$nomi,
        'author'=>$author,
        'yili'=>$yili,
    ]);
    header('location:show.php');
    exit();
}