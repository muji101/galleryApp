<?php
    include '../config/koneksi.php';
    
    $user_id    = $_POST['id'];
    $title      = $_POST['title'];
    $content    = $_POST['content'];
    $category_id= $_POST['category'];
    $date       = $_POST['date'];
    $image      = $_POST['image'];

    $query      = "INSERT INTO posts (user_id, title, content, category_id, date, image) VALUES('$user_id', '$title', '$content', '$category_id', '$date', '$image')";
    $result     = mysqli_query($koneksi, $query);
    
    if ($result){
        header('location:../profile.php');
    }else{
        echo 'gagal menambah data';
    }
