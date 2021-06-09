<?php

    include '../config/koneksi.php';

    $id     = $_POST['id'];
    $id_post= $_POST['id_post'];
    $query  = "DELETE FROM comments where id='$id'";
    $res    = mysqli_query($koneksi,$query);

    if ($res){
        header('location:../detail.php?id='. $id_post);
    }else{
        echo 'gagal mengahapus data';
    }