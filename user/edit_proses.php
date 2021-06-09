<?php

    include '../config/koneksi.php';

    $id          = $_POST['id'];
    $name        = $_POST['name'];
    $email       = $_POST['email'];
    $password    = $_POST['password'];
    $gender      = $_POST['gender'];
    $image       = $_POST['image'];

    $query = "UPDATE users SET 
    name ='$name', 
    email ='$email', 
    password ='$password', 
    gender ='$gender', 
    image ='$image' 
    WHERE id ='$id'";
    $result = mysqli_query($koneksi, $query);

    if ($result){
        header('location:../profile.php');
    }else {
        echo 'gagal mengupdate data';
    }