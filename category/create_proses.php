<?php
    include '../config/koneksi.php';
    $make_id    = $_POST['id'];
    $name       = $_POST['name'];
    $query      = "INSERT INTO categories (name, make_id) VALUES('$name','$make_id')";
    $result     = mysqli_query($koneksi, $query);
    
    if ($result){
        header('location:../profile.php');
    }else{
        echo 'gagal menambah data';
    }


?>