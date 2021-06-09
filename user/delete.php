<?php
    include '../config/koneksi.php';

    $id     = $_POST['id'];

    $query  = "DELETE FROM users where id='$id'";
    $res    = mysqli_query($koneksi,$query);

    if ($res){
        header('location:../index.php');
    }else{
        echo 'gagal mengahapus akun';
    }