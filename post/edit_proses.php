<?php

    include '../config/koneksi.php';

    $id = $_POST['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $category_id = $_POST['category'];
    $date = $_POST['date'];
    $image = $_POST['image'];
    
    $query = " UPDATE posts SET  
    title = '$title', 
    content = '$content', 
    category_id = '$category_id', 
    date = '$date',
    image = '$image' 
    
    WHERE id='$id'";
    
    $result = mysqli_query($koneksi, $query);

    if ($result){
        header('location:../profile.php');
    }else {
        echo 'gagal mengupdate data';
    }