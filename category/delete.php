<?php

    include '../config/koneksi.php';

    $id     = $_POST['id'];
    $query  = "DELETE FROM categories where id='$id'";
    $res    = mysqli_query($koneksi,$query);

    if ($res){
        header('location:../profile.php');
    }else{
        echo 'gagal mengahapus data';
    }