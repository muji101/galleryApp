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

    <title>Edit profile | <?= $_SESSION['name']?></title>
    <style>
        body {
            background: #393e46;
            color: black;
        }
        .nav_title:first-letter {
            text-transform: uppercase;
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
                $query = "SELECT * FROM users WHERE id='$id'";
                $result = mysqli_query($koneksi, $query);
                $data = mysqli_fetch_assoc($result);
            ?>

            <div class="col-12" style="padding-top : 100px;">
                <div class="mx-5">
                    
                    <div class="row">
                        <div class="col-md-8 m-auto card p-5 shadow p-3 mb-5 bg-body rounded">
                        <form action="edit_proses.php" method="POST">
                            <input type="hidden" name="id" value="<?= $data['id']?>">

                            <div class="mb-3">
                                <label for="nameInput" class="form-label">Name</label>
                                <input name="name" type="text" class="form-control" id="nameInput" value="<?= $data['name']?>">
                            </div>
                            
                            <div class="mb-3">
                                <label for="emailInput" class="form-label">Email</label>
                                <input name="email" type="email" class="form-control" id="emailInput" value="<?= $data['email']?>">
                            </div>

                            <div class="mb-3">
                                <label for="passwordInput" class="form-label">Password</label>
                                <input name="password" type="password" class="form-control" id="passwordInput" value="<?= $data['password']?>">
                                <input type="checkbox" onclick="myFunction()">Show Password 
                            
                                <script>
                                    function myFunction() {
                                        var x = document.getElementById("passwordInput");
                                        if (x.type === "password") {
                                            x.type = "text";
                                        } else {
                                            x.type = "password";
                                        }
                                        } 
                                </script>
                            </div>

                            <div class="mb-3">
                                <input name="gender" type="radio" class="" id="gender1Input" value="man" <?=  $data['gender'] == "man" ? "checked": null ?> >
                                <label for="gender1Input" class="form-label">Man</label>
                            </div>
                            
                            <div class="mb-3">
                                <input name="gender" type="radio" class="" id="gender2Input" value="woman" <?=  $data['gender'] == "woman" ? "checked": null ?>>
                                <label for="gender2Input" class="form-label">Woman</label>
                            </div>
                            <div class="mb-3">
                                <label for="imageInput" class="form-label">Image Url</label>
                                <input name="image" type="text" class="form-control" id="imageInput" value="<?= $data['image']?>">
                            </div>
                            <button class="btn btn-md btn-primary">Submit</button>
                            <a href="../profile.php" class="btn btn-danger">Back</a>
                            <div class="d-flex justify-content-end">
                                <form action="./user/delete.php" method="POST" onSubmit="return confirm('Yakin untuk menghapus?')">
                                        <input type="hidden" name="id" value="<?= $data['id']?>">
                                        <button class="btn btn-danger mx-4">Delete Account</button>
                                </form>
                            </div>
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