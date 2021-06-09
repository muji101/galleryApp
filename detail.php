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
    <?php
        include './config/koneksi.php';
        include 'nav.php';

        $queryTitle = "SELECT * FROM posts
        WHERE id = '$_GET[id]'
        ";
        $resultTitle= mysqli_query($koneksi, $queryTitle);
        $dataTitle = mysqli_fetch_assoc($resultTitle);
    ?>
    <title>Detail Post | <?= $dataTitle['title']?></title>

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
    
    <div class="container-fluid">
        <div class="d-flex justify-content-center">
            <?php
                $id = $_GET['id'];
                $query = "SELECT
                posts.id,
                posts.title,
                posts.image,
                posts.content,
                posts.date,
                posts.user_id,
                categories.name AS category_name,
                users.name AS user_name,
                users.image AS profile
                FROM posts
                JOIN categories ON posts.category_id = categories.id
                JOIN users ON posts.user_id = users.id
                WHERE posts.id = '$id'
                ";
                $result= mysqli_query($koneksi, $query);
                $data = mysqli_fetch_assoc($result);
                                    
                $comment_query  = "SELECT 
                comments.id,
                comments.comment,
                comments.commentator,
                comments.date,
                comments.post_id,
                comments.name_id,
                users.image AS image_comment
                FROM comments
                JOIN users ON users.id = comments.name_id
                WHERE post_id = $id
                ORDER BY date asc
                ";
                $result_comment = mysqli_query($koneksi, $comment_query);

                $queryUser  = "SELECT * FROM users
                    WHERE id = $_SESSION[id]
                ";
                $resUser    = mysqli_query($koneksi, $queryUser);
                $dataUser   = mysqli_fetch_assoc($resUser);
                    
            ?>
            <div class="card my-5 text-dark" style="width: 900px; overflow: hidden;background: #222831;">
                <div class="d-flex justify-content-between">
                    <div class="py-4 px-2">
                        <img style="width: 500px;" class="" src="<?= $data['image']?>" alt="">
                    </div>
                    <div class="card p-2 text-light" style="background: #222831;">
                        <div class=""  style="height: auto;">
                            <div class="d-flex justify-content-between">
                                <p style="color: #00adb5;"><img class="rounded-circle" style="width : 20px; height: 20px" src="<?= $data['profile']?>" alt="">&nbsp<span class=""><?= $data['user_name']?></span> | <?= $data['date']?></p>
                                <div class="d-flex justify-content-end mb-2">
                                    <?php
                                        if ($data['user_id'] == $_SESSION['id']) {
                                            echo "<a class='btn btn-warning rounded-0' href='./post/edit.php?id=$data[id]'><i class='bi bi-pen-fill'></i></a>";
                                            echo "
                                            <form action='./post/delete.php' method='POST' onSubmit='return confirm(Yakin untuk menghapus?)'>
                                                <input type='hidden' name='id' value='$data[id]' />
                                                <button class='btn btn-danger rounded-0 mx-1'><i class='bi bi-trash'></i></button>
                                            </form>";
                                        }else{
                                            echo"<i class='text-danger fs-4 bi bi-shield-fill-exclamation'></i>";
                                        }
                                    ?>
                                    
                                </div>
                            </div>
                            <h3 class="fw-bold"><?= $data['title']?></h3>
                            <h6 class="fst-italic"><?= $data['category_name']?></h6>
                            <p class="card-text pt-2"><?= 
                                $data['content']
                                // membatasi kata dalam artikel
                                // str_word_count($data['content']) > 5 ? substr($data['content'], 0, 50) . ' ...' : $data['content']
                            ?></p>
                        </div>
                        <hr>
                        <div class="">
                            <div class="" style="overflow: auto; height: 200px;"> 
                                
                                <div class="py-1">
                                    <?php
                                        while($data_comment = mysqli_fetch_assoc($result_comment)) {
                                    ?>
                                    <div class="card my-1 text-dark">
                                        <div class="d-flex justify-content-between align-items-center px-1">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="">
                                                    <img class="rounded-circle" style="width : 20px; height: 20px;" src="<?= $data_comment['image_comment']?>" alt=""> 
                                                </div>
                                                <div class="px-1">
                                                    <h1 class="fw-bold fs-6 m-0"><?= $data_comment['commentator']?></h1>
                                                </div>
                                            </div>
                                            <h6 class="fs-6 m-0"> <?= $data_comment['date']?></h6>
                                        </div>
                                        <p class="px-1"><?= $data_comment['comment']?></p>
                                        <div class="py-1 d-flex justify-content-end">
                                            <!-- <form action="./comment/delete.php" method="POST" onSubmit="return confirm('Yakin untuk menghapus?')">
                                            <a class="btn btn-warning" href="./comment/edit.php?id=<?= $data_comment['id']?>"><i class="bi bi-pen-fill"></i></a>
                                                <input type="hidden" name="id" value="<?= $data_comment['id'] ?>" />
                                                <input type="hidden" name="id_post" value="<?= $data_comment['post_id'] ?>" />
                                                <button class="btn btn-danger mx-1"><i class="bi bi-trash"></i></button>
                                            </form> -->
                                            <?php
                                                if ($data_comment['name_id'] == $_SESSION['id']) {
                                                    echo "<a class='btn btn-warning rounded-0' href='./comment/edit.php?id=$data_comment[id]'><i class='bi bi-pen-fill'></i></a>";
                                                    echo "
                                                    <form action='./comment/delete.php' method='POST' onSubmit='return confirm(Yakin untuk menghapus?)'>
                                                        <input type='hidden' name='id' value='$data_comment[id]' />
                                                        <input type='hidden' name='id_post' value='$data_comment[post_id]' />
                                                        <button class='btn btn-danger rounded-0 mx-1'><i class='bi bi-trash'></i></button>
                                                    </form>";
                                                }else{
                                                    echo"<i class='text-danger fs-4 bi bi-shield-fill-exclamation'></i>";
                                                }
                                            ?>
                                        </div>
                                        
                                    </div>
                                    <?php
                                        };
                                    ?>
                                </div>
                                <div class="">
                                    <form action="comment_proses.php" method="POST" class="d-flex align-items-center">
                                        <input type="hidden" class="form-control" name="name" value="<?= $dataUser['name']?>">
                                        <input type="hidden" class="form-control" name="name_id" value="<?= $dataUser['id']?>">
                                        <input type="hidden" name="post_id" value="<?= $data['id']?>">
                                        <div class="mb-2">
                                            <!-- <input type="text" name="comment" placeholder="Add a comment..." cols="7" > -->
                                            <input class="py-3 px-1" style="width: 290px;" class="form-control" name="comment" id="comment" placeholder="Add a comment...">
                                        </div>
                                        <div class="">
                                            <button class="btn text-primary">Post</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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