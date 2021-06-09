<?php
    include './config/koneksi.php';

    $commentator   = $_POST['name'];
    $name_id       = $_POST['name_id'];
    $post_id       = $_POST['post_id'];
    $comment       = $_POST['comment'];
    $date          = date("Y-m-d");

    $query         = "INSERT INTO comments (comment, post_id, commentator, date, name_id) VALUES ('$comment', '$post_id', '$commentator', '$date', '$name_id')";
    $result        = mysqli_query($koneksi, $query);

    if ($result){
        header('location: detail.php?id=' . $post_id);
    }else {
        echo 'gagal';
    }