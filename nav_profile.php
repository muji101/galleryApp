<!-- navbar -->
<nav id="nav" class="navbar navbar-expand-lg navbar-light position-sticky top-0 " style="z-index: 100; background: #222831;">
        <div class="container">
            <div class="text-light fw-bold px-4">
                <a class="text-decoration-none text-light ms-2 fs-4" href="http://localhost/galleryApp/home.php">
                    <img class="img-fluid" style="max-width: 20%; height: auto" src="https://image.flaticon.com/icons/png/128/187/187902.png" alt="">
                GalleryApp
                </a>
            </div>
            <div class="d-flex">
                    <div class="text-center">
                        <a class="text-decoration-none" href="http://localhost/galleryApp/profile.php">
                            <strong class="text-light">
                                <?php
                                    $queryProfile   = "SELECT * FROM users WHERE id = '$_SESSION[id]'";
                                    $resProfile     = mysqli_query($koneksi, $queryProfile);
                                    $dataProfile     = mysqli_fetch_assoc($resProfile);
                                    // if (isset($_SESSION['name']))  {
                                    //     echo  " $_SESSION[name]";
                                    // }else {
                                    //     echo '';
                                    // }
                                    // echo "&nbsp";
                                    // if (isset($_SESSION['image']))  {
                                    //     echo "<img class='rounded-circle' style='width : 50px; height: 50px;' src='$_SESSION[image]'>"; 
                                    // }else {
                                    //     echo '';
                                    // }
                
                                    // echo '<br>';
                                    
                                    // if (isset($_SESSION['email']))  {
                                    //     echo $_SESSION['email'];
                                    // }else {
                                    //     echo '';
                                    // }
                                    
                                ?>
                                <div class="d-flex align-items-center">
                                    <h6 class="nav_title ps-2 fw-bold"><?= $dataProfile['name']?></h6>
                                    <img class="rounded-circle" style='width : 50px; height: 50px;' src="<?= $dataProfile['image']?>" alt="">
                                </div>
                            </strong>
                        </a>
                    </div>
                        <!-- <a class="text-light ms-2 fs-3" href="http://localhost/galleryApp/home.php"><i class="bi bi-house-door-fill"></i></a> -->
                        <!-- <button class="mx-2 btn btn-dark border border-1-light" style="color: #eeeeee;" onclick="warnaA()">Dark</button>
                        <button class=" btn btn-light border border-1-dark" onclick="warnaB()">Normal</button> -->
                        <script>
                            function warnaA() {
                                document.getElementById("body").style.background = "#393e46"
                                document.getElementById("profile").style.color = "#eee"
                                document.getElementById("nav").style.background = "#222831"
                                document.getElementById("card").style.background = "#222831"
                                document.getElementById("card").style.transition = "600ms"
                                document.getElementById("body").style.transition = "600ms"
                                document.getElementById("nav").style.transition = "600ms"
                            }
                            function warnaB() {
                                document.getElementById("body").style.background = "#eeeeee"
                                document.getElementById("profile").style.color = "#000"
                                document.getElementById("nav").style.background = "#b3afa4"
                                document.getElementById("card").style.background = "#b3afa4"
                                document.getElementById("card").style.transition = "600ms"
                                document.getElementById("body").style.transition = "600ms"
                                document.getElementById("nav").style.transition = "600ms"
                            }
                        </script>
            </div>
        </div>
    </nav>

