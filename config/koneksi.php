<?php
    $server = 'localhost';
    $user   = 'root';
    $pass   = '1234';
    $db     = 'galleryApp';

    $koneksi= mysqli_connect($server,$user,$pass,$db);

    if ($koneksi){
        // echo 'berhasil';
    }else {
        echo 'gagal rek';
    }