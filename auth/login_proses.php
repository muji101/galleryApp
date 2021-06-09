<?php
    // session_start() > menyimpan data saat login di local
    session_start();
    include '../config/koneksi.php';

    $email      = $_POST['email'];
    $password   = $_POST['password'];

    // var_dump($email);

    if ($email && $password) {
        $query  = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
        $res = mysqli_query($koneksi, $query);

        if (mysqli_num_rows($res) > 0) {
            $data   = mysqli_fetch_assoc($res);
            // var_dump($data);
            $_SESSION['id']  = $data['id'];
            $_SESSION['name']  = $data['name'];
            $_SESSION['email']  = $data['email'];
            $_SESSION['image']  = $data['image'];
            echo "
                <head><link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6' crossorigin='anonymous'>
                </head>
                <div class='text-center'>
                    <div class='spinner-border' role='status' style='width: 300px; height: 300px; margin-top: 200px;>
                    <span class='visually-hidden'></span>
                    </div>
                </div>
            ";
            header('Refresh: 3; URL = ../home.php');
        }else {
            echo '<!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Sign In</title>
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
            
                <style>
                    #particles-js{  
                        width: 100%; 
                        height: 100%; 
                        padding-top: 0px;
                        /* background-color: #b61924;  */
                        background-image: url("https://images.unsplash.com/photo-1460602594182-8568137446ce?ixid=MXwxMjA3fDB8MHxzZWFyY2h8NTJ8fGJhY2tncm91bmQlMjBjb2Rpbmd8ZW58MHx8MHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60"); 
                        background-repeat: no-repeat; 
                        background-size: cover; 
                        background-position: 50% 50%; 
                        }
                </style>
            </head>
            <body>
            <div id="particles-js">
                <div class="container-fluid position-relative">
                    <div class="d-flex justify-content-center">
                        <div class="card-xl text-center position-absolute top-0" style="width: 400px; margin-top: 170px; padding: 40px; background-color: #222831;">
                            <h4 class="text-light pb-3">Email atau password salah</h4>
                            <a class="btn btn-success" href="../index.php">Back</a>
                        </div>
                    </div>
                </div>
            </div>
            
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
                <script src="http://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
                
            </body>
            </html> ';
        }
    }else {
        echo 'Email atau password kosong';
    }


?>