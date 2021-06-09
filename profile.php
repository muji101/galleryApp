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
    <title>Profile | <?= $_SESSION['name']?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <style>
        body {
            background: #393e46;
            color: #00adb5;
        }
        .nav_title:first-letter {
            text-transform: uppercase;
            }
    </style>
</head>
<body id="body">
    <?php
        include './config/koneksi.php';
        include 'nav_profile.php';
    ?>
    <div class="container">
        <div class="d-flex justify-content-center align-items-center text-light py-4">
            <div class="">
                <?php
                                
                    // if (isset($_SESSION['image']))  {
                    //     echo "<img class='rounded-circle' style='width : 200px; height: 200px;' src='$_SESSION[image]'>"; 
                    // }else {
                    //     echo '';
                    // }
                    // echo "&nbsp";
                    $queryProfile   = "SELECT * FROM users WHERE id = '$_SESSION[id]'";
                    $resProfile     = mysqli_query($koneksi, $queryProfile);
                    $dataProfile     = mysqli_fetch_assoc($resProfile);
                    // var_dump($dataProfile);
                ?>
                    <img class="rounded-circle" style='width : 200px; height: 200px;' src="<?= $dataProfile['image']?>" alt="">
            </div>
            <div id="profile" class="px-4">
                <h1 class="nav_title"><?= $dataProfile['name']?></h1>
                <h5><?= $dataProfile['email']?></h5>
                <?php
                    // if (isset($_SESSION['name']))  {
                    // echo  " <h1 class='nav_title'>$_SESSION[name]</h1>";
                    // }else {
                    //     echo '';
                    // }
            
                    // echo '<br>';
                                
                    // if (isset($_SESSION['email']))  {
                    //     echo $_SESSION['email'];
                    // }else {
                    //     echo '';
                    // }

                    $queryPosts  = "SELECT * FROM posts
                    WHERE user_id = '$_SESSION[id]'
                    ";
                    $resPosts    = mysqli_query($koneksi, $queryPosts);
                    
                    $queryCate  = "SELECT * FROM categories
                    WHERE make_id = '$_SESSION[id]'
                    ";
                    $resCate    = mysqli_query($koneksi, $queryCate);
                    
                ?>
                <div class="py-2">
                    <h6 class="d-inline"><b><?= mysqli_num_rows($resPosts)?></b> posts</h6>
                    <h6 class="d-inline"><b><?= mysqli_num_rows($resCate)?></b> category</h6>
                </div>
                
            </div>
        </div>
        <form class="text-center" action="./auth/logout.php" method="POST">
            <!-- <a href="detail_profile.php?id=<?= $_SESSION['id']?>" class="btn btn-success">Detail profile</a> -->
            <a href="./user/edit.php?id=<?php     
                        if (isset($_SESSION['id']))  {
                            echo $_SESSION['id'];
                        }else {
                            echo '';
                        }                  
                    ?>
                    " class="btn btn-primary mx-1">Edit profile</a>
            <button class="btn btn-danger">Logout</button>
        </form>
        <hr style="height: 4px;">
        <div class="d-flex justify-content-center pt-1">
            <a class="btn btn-primary mx-1 text- rounded-0" href="profile.php">All</a>
            <?php
                $queryCate = "SELECT * FROM categories
                WHERE make_id = '$_SESSION[id]'
                ";
                $resCate = mysqli_query($koneksi, $queryCate);
                $noCate = 1;
                while($data = mysqli_fetch_assoc($resCate)){
            ?>
            <div class="d-flex bg-primary mx-1">
                <a class="btn btn-primary text-light" href="profile.php?cateId=<?= $data['id']?>">
                                <?= $data['name']?>
                </a>
                <a href="./category/edit.php?id=<?= $data['id']?>"><span class="btn btn-warning rounded-0"><i class="bi bi-pen-fill"></i></span></a>
                <form action="./category/delete.php" method="POST" onSubmit="return confirm('Yakin untuk menghapus?')">
                    <input type="hidden" name="id" value="<?= $data['id']?>">
                    <button class="btn btn-danger rounded-0" id="button-addon1"><i class="bi bi-trash-fill"></i></button>
                </form>
            </div>
                <?php
                    };
                ?>  
<!--                 
                <div class="dropdown mt-3">
                <p class="dropdown-toggle text-light" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    Category
                </p>
                
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="height: 300px; overflow-y: auto">
                <?php
                    $queryCate = "SELECT * FROM categories";
                    $resCate = mysqli_query($koneksi, $queryCate);
                    $noCate = 1;
                    while($data = mysqli_fetch_assoc($resCate)){
                        ?>
                    <li>
                    <div class="d-flex justify-content-between">
                    <a class="btn btn-primary text-light" href="profile.php?cateId=<?= $data['id']?>">
                                <?= $data['name']?>
                    </a>
                    <a href="./category/edit.php?id=<?= $data['id']?>"><span class="btn btn-warning rounded-0"><i class="bi bi-pen-fill"></i></span></a>
                    <form action="./category/delete.php" method="POST" onSubmit="return confirm('Yakin untuk menghapus?')">
                        <input type="hidden" name="id" value="<?= $data['id']?>">
                        <button class="btn btn-danger rounded-0" id="button-addon1"><i class="bi bi-trash-fill"></i></button>
                    </form>
                    </div>
                    </li>
                    <?php
                    };
                    ?>
                </ul>
                </div> -->

        </div>
        <hr style="height: 4px;">
        <div class="d-flex justify-content-around my-2">
            <div class=""><a class="btn btn-primary" href="./post/create.php?id=<?= $_SESSION['id']?>">Add Post</a></div>
            <div class=""><a class="btn btn-primary" href="./category/create.php?id=<?= $_SESSION['id']?>">Add Category</a></div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="d-flex flex-wrap justify-content-center">
            <?php
                if (isset($_GET['cateId'])){
                    $query = " SELECT 
                    posts.*,
                    categories.name AS category_name,
                    users.image AS profile,
                    users.name AS user_name
                    FROM posts 
                    INNER JOIN categories ON posts.category_id = categories.id
                    INNER JOIN users ON posts.user_id = users.id
                    WHERE category_id = ".$_GET['cateId']."
                    ORDER BY id DESC
                ";
                }else{$query = " SELECT 
                    posts.*,
                    categories.name AS category_name,
                    users.image AS profile,
                    users.name AS user_name
                    FROM posts 
                    INNER JOIN categories ON posts.category_id = categories.id
                    INNER JOIN users ON posts.user_id = users.id
                    WHERE user_id = '$_SESSION[id]'
                    ORDER BY id DESC
                ";
                
                }

                $res = mysqli_query($koneksi, $query);
                
                while($data = mysqli_fetch_assoc($res)){
                // var_dump($_SESSION['id']);
            ?>
            <div id="card" class="card my-4 mx-5 py-0" style="background: #222831;">
                <a class="text-decoration-none" href="detail.php?id=<?= $data['id']?>">
                    <div class="card-body text-light">
                        <div class="" style="width: 400px; height: 200px; overflow: hidden;">
                            <img style="width : 400px" class="" src="<?= $data['image']?>" alt="">
                        </div>
                        <h3 class="fw-bold mt-3"><?= $data['title']?></h3>
                        <hr>
                        <p class="fst-italic"><?= $data['category_name']?></p>
                        <p class="card-text pt-2"><?= 
                            // membatasi kata dalam artikel
                            str_word_count($data['content']) > 5 ? substr($data['content'], 0, 50) . ' ...' : $data['content']
                        ?></p>
                        <!-- <p style="color: #00adb5;"><img class="rounded-circle" style="width : 20px; height: 20px" src="<?= $data['profile']?>" alt="">&nbsp<span class=""><?= $data['user_name']?></span> | <?= $data['date']?></p> -->
                    </div>
                </a>
                <div class="d-flex justify-content-end m-2">
                    <a class="btn btn-warning" href="./post/edit.php?id=<?= $data['id']?>"><i class="bi bi-pen-fill"></i></a>
                    <form action="./post/delete1.php" method="POST" onSubmit="return confirm('Yakin untuk menghapus?')">
                        <input type="hidden" name="id" value="<?= $data['id'] ?>" />
                        <button class="btn btn-danger mx-1"><i class="bi bi-trash"></i></button>
                    </form>
                </div>
            </div>
            <?php
                };
            ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    
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