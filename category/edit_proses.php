<?php

    include '../config/koneksi.php';

    $id     = $_POST['id'];
    $name   = $_POST['name'];

    $query  = "UPDATE categories SET name='$name' WHERE id='$id'";
    $result = mysqli_query($koneksi, $query);

    if ($result){
        header('location:../profile.php');
    }else {
        echo 'gagal mengupdate data';
    }