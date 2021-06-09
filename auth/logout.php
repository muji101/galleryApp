<?php
    session_start();

    unset($_SESSION['id']);
    unset($_SESSION['name']);
    unset($_SESSION['email']);
    unset($_SESSION['image']);
    // echo "<body style='background-image: url(https://i.pinimg.com/originals/a2/dc/96/a2dc9668f2cf170fe3efeb263128b0e7.gif) ; background-size: cover'>Berhasil Logout</body>"; 
    echo "
        <head><link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6' crossorigin='anonymous'>
        </head>
        <div class='text-center'>
            <div class='spinner-border' role='status' style='width: 300px; height: 300px; margin-top: 200px;>
                <span class='visually-hidden'></span>
            </div>  
        </div>
        ";
    header('Refresh: 3; URL = ../index.php');

?>