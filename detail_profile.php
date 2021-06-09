<?php
    // kalau memakai session harus memakai session_start()
    session_start();
    // isset() > walaupun variabel tidak ada tidak dihitung eror / menghilangkan eror
    if (isset($_SESSION['email'])) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">

    <title>Detail | <?= $_SESSION['name']?></title>
    <style>
        body {
            background: #393e46;
            color: #00adb5;
        }
    </style>
</head>
<body>
    <div class="container-fluid p-0">
        <div class="row d-flex justify-content-center">
            <!-- sidebar -->
            <?php
                include './config/koneksi.php';
                include 'nav_profile.php';

                $id     = $_GET['id'];
                $query  = "SELECT * FROM users WHERE id='$id'";
                $result = mysqli_query($koneksi, $query);
                $data   = mysqli_fetch_assoc($result);
            ?>

            <div class="col-8" style="padding-top : 60px;">
                <div class="mx-5 card shadow py-4">
                    <div class="row px-2 py-2">
                        <div class="col-5 ps-5">Name</div>
                        <div class="col-1 text-center">:</div>
                        <div class="col-6"><?= $data['name']?></div>
                    </div>
                    <div class="row px-2 py-2">
                        <div class="col-5 ps-5">Email</div>
                        <div class="col-1 text-center">:</div>
                        <div class="col-6"><?= $data['email']?></div>
                    </div>
                    <div class="row px-2 py-2">
                        <div class="col-5 ps-5">Password</div>
                        <div class="col-1 text-center">:</div>
                        <div class="col-6"><?= $data['password']?></div>
                    </div>
                    <div class="row px-2 py-2">
                        <div class="col-5 ps-5">Gender</div>
                        <div class="col-1 text-center">:</div>
                        <div class="col-6"><?= $data['gender']?></div>
                    </div>
                    <div class="row px-2 py-2">
                        <div class="col-5 ps-5">Image Profile</div>
                        <div class="col-1 text-center">:</div>
                        <div class="col-6 "><img class="rounded-circle img-thumbnail" src="<?= $data['image']?>" alt=""></div>
                    </div>
                    <div class="row px-2 py-2">
                        <div class="col-4"></div>
                        <div class="col-3 text-center">
                            <a href="./user/edit.php?id=<?php     
                                if (isset($_SESSION['id']))  {
                                    echo $_SESSION['id'];
                                }else {
                                    echo '';
                                }                  
                            ?>" class="btn btn-primary">Edit</a>
                            <a class="btn btn-danger" href="profile.php">Back</a>
                        </div>
                        <div class="col-5"></div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <form action="./user/delete.php" method="POST" onSubmit="return confirm('Yakin untuk menghapus?')">
                                <input type="hidden" name="id" value="<?= $data['id']?>">
                                <button class="btn btn-danger mx-4">Delete Account</button>
                        </form>
                    </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>

    <!-- script -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
</body>
</html>

<?php
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
                        <h3 class="text-light pb-3">Kamu Belum Login</h3>
                        <a class="btn btn-success" href="index.php">Login here</a>
                    </div>
                </div>
            </div>
        </div>
        
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
            <script src="http://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
            
        </body>
        </html> ';
    }
?>