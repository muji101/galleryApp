<?php

    include '../config/koneksi.php';

    $id     = $_POST['id'];
    $id_posts     = $_POST['id_posts'];
    $comment   = $_POST['comment'];

    $query  = "UPDATE comments SET comment='$comment', post_id ='$id_posts' WHERE id='$id'";
    $result = mysqli_query($koneksi, $query);

    if ($result){
        header('location:../detail.php?id='.$id_posts);
    }else {
        echo 'gagal mengedit komen';
    }