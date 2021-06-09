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

    <title>Create Post | <?= $_SESSION['name']?></title>
    <style>
        body {
            background: #393e46;
            color: black;
        }
    </style>
</head>
<body>
    <div class="container-fluid p-0">
        <div class="row">
            <?php
                include '../config/koneksi.php';
                include '../nav_profile.php';

                $id = $_GET['id'];
                $query= "SELECT * FROM posts WHERE id='$id'";
                $result= mysqli_query($koneksi, $query);

                $data = mysqli_fetch_assoc($result);

            ?>

            <div class="col-12" style="padding-top : 100px;">
                <div class="mx-5">
                    
                    <h2 class="text-center text-light fw-bold mb-5">Edit Posts</h2>
                    
                    <div class="row">
                        <div class="col-md-8 m-auto card p-5 shadow p-3 mb-5 bg-body rounded">
                        <form action="edit_proses.php" method="POST">
                            <input type="hidden" name="id" value="<?= $data['id']?>">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Title</label>
                                <input name="title" value="<?= $data['title']?>" type="text" class="form-control" id="exampleFormControlInput1" placeholder="">
                            </div>

                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Content</label>
                                <textarea name="content" class="form-control" id="exampleFormControlTextarea1" rows="3"><?= $data['content']?></textarea>
                            </div>
                            
                            <div class="mb-3">
                                <label for="" class="from-label">Category</label>
                                <select name="category" class="form-select" aria-label="Default select example">

                            </div>
                                <!-- menampilkan dropdown category -->
                                <?php
                                    $query2 = "SELECT * FROM categories 
                                    WHERE make_id = $_SESSION[id]
                                    ";
                                    $result= mysqli_query($koneksi, $query2);
                                    
                                    while($data2  = mysqli_fetch_assoc($result)){
                                ?>
                                <option value="<?= $data2['id'] ?>"
                                    <?= $data['category_id'] == $data2['id'] ? 'selected' : '' ?> > <?= $data2['name']?>
                                </option>
                                <?php        
                                    };
                                ?>
                            </select> 

                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Date</label>
                                <input name="date" value="<?= $data['date']?>" type="date" class="form-control" id="exampleFormControlInput1" placeholder="">
                            </div>

                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Image Url</label>
                                <input name="image" value="<?= $data['image']?>" type="text" class="form-control" id="exampleFormControlInput1" placeholder="">
                            </div>

                            <button class="btn btn-md btn-primary px-5 mt-5">Sumbit</button>
                            <a href="../profile.php" class="btn btn-danger px-5 mt-5">Back</a>

                        </form>
                        </div>
                    </div>
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
        echo 'Anda belum login <a class="btn btn-success" href="./auth/login.php">Login here</a>';
    }
?>