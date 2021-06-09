<?php
    // kalau memakai session harus memakai session_start()
    session_start();
    // isset() > walaupun variabel tidak ada tidak dihitung eror / menghilangkan eror
    if (isset($_SESSION['email'])) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <style>
        body {
            /* background: #eeeeee; */
            /* background: #222831; */
            background: #393e46;
            color: #00adb5;
            
        }
        .nav_title:first-letter {
            text-transform: uppercase;
            }
        .dark-mode {
  background-color: black;
  color: white;
}
    </style>
</head>
<body id="body">
    <?php
        include './config/koneksi.php';
        include 'nav.php';
    ?>
    
    <div id="blog" class="">
        <div class="container-fluid">
            <div class="d-flex flex-wrap justify-content-center py-5">

                <?php
                    if (isset($_GET['cateId'])){
                        $query = 
                            "SELECT posts.*, categories.name AS category_name, users.name AS user_name, users.image AS profile FROM posts 
                            INNER JOIN categories ON posts.category_id = categories.id
                            INNER JOIN users ON posts.user_id = users.id

                            WHERE category_id = ".$_GET['cateId']."
                            ORDER BY id DESC
                            ";
                        }else{
                    $query = "SELECT posts.*, categories.name AS category_name, users.name AS user_name, users.image AS profile FROM posts 
                    INNER JOIN categories ON posts.category_id = categories.id
                    INNER JOIN users ON posts.user_id = users.id
                    ORDER BY id DESC 

                    ";
                    }
                    $result= mysqli_query($koneksi, $query);
                                    
                    while($data = mysqli_fetch_assoc($result)){
                ?>
                
                <div class="py-5">
                    <a data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="1500" class="text-dark text-decoration-none" href="detail.php?id=<?= $data['id']?>">
                            <div id="card"  class="card mx-5 py-0 text-light" style="background: #222831;">
                                <div class="card-body text-light">
                                    <div class="" style="width: 400px; height: 200px; overflow: hidden;">
                                        <img style="width : 400px;" class="" src="<?= $data['image']?>" alt="">
                                    </div>
                                    <h3 class="fw-bold mt-3"><?= $data['title']?></h3>
                                    <hr>
                                    <h6 class="fst-italic"><?= $data['category_name']?></h6>
                                    <p class="card-text pt-2"><?= 
                                        // membatasi kata dalam artikel
                                        str_word_count($data['content']) > 5 ? substr($data['content'], 0, 50) . '...' : $data['content']
                                    ?></p>
                                    
                                    <p style="color: #00adb5;"><img class="rounded-circle" style="width : 20px; height: 20px" src="<?= $data['profile']?>" alt="">&nbsp<span class=""><?= $data['user_name']?></span> | <?= $data['date']?></p>
                                </div>
                                <div class="d-flex justify-content-end mx-2 mb-2">
                                    <?php
                                        if ($data['user_id'] == $_SESSION['id']) {
                                            echo "<a class='btn btn-warning rounded-0' href='./post/edit.php?id=$data[id]'><i class='bi bi-pen-fill'></i></a>";
                                            echo "
                                            <form action='./post/delete.php' method='POST' onSubmit='return confirm(Yakin untuk menghapus?)'>
                                                <input type='hidden' name='id' value='$data[id]' />
                                                <button class='btn btn-danger rounded-0 mx-1'><i class='bi bi-trash'></i></button>
                                            </form>";
                                        }else{
                                            echo"<i class='text-danger pe-1 fs-4 bi bi-shield-fill-exclamation'></i>";
                                        }
                                    ?>
                                    
                                </div>
                                
                            </div>
                    </a>
                </div>
                    <?php
                        };
                    ?>
            </div>
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

