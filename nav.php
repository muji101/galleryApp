<!-- navbar -->
<nav id="nav" class="navbar navbar-expand-lg navbar-light position-sticky top-0 " style="z-index: 100; background: #222831;">
        <div class="container-fluid  d-flex justify-content-around">
            <div class="text-light fw-bold px-4 fs-5">
                <img class="img-fluid" style="max-width: 20%; height: auto" src="https://image.flaticon.com/icons/png/128/187/187902.png" alt="">
                GalleryApp
            </div>
            <div class="d-flex align-items-center">
                <a class="nav-link active text-light" aria-current="page" href="http://localhost/galleryApp/home.php">Home</a>
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
                        <a id="aNav" class="nav-link active text-dark nav_title" aria-current="page" href="http://localhost/galleryApp/home.php?cateId=<?= $data['id']?>">
                        <?= $data['name']?>
                        </a>
                    </li>
                    <?php
                    };
                    ?>
                </ul>
                </div>
                
                
            </div>
            <div class="text-dark">
                <a class="text-decoration-none" href="http://localhost/galleryApp/profile.php">
                <strong class="text-light">
                    <?php
                        $queryProfile   = "SELECT * FROM users WHERE id = '$_SESSION[id]'";
                        $resProfile     = mysqli_query($koneksi, $queryProfile);
                        $dataProfile    = mysqli_fetch_assoc($resProfile);
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
                    <div class="d-flex align-items-center justify-content-center">
                        <h6 class="nav_title pt-2 fw-bold"><?= $dataProfile['name']?></h6>
                        <img class="rounded-circle" style='width : 50px; height: 50px;' src="<?= $dataProfile['image']?>" alt="">
                    </div>
                </strong>
                </a>
                <!-- <button class="btn btn-dark border border-1-light" style="color: #eeeeee;" onclick="warnaA()">Dark</button>
                <button class="btn btn-light border border-1-dark" onclick="warnaB()">Normal</button>
                <script>
                    function warnaA() {
                        document.getElementById("body").style.background = "#393e46"
                        document.getElementById("nav").style.background = "#222831"
                        document.getElementById("card").style.background = "#222831"
                        document.getElementById("card").style.transition = "600ms"
                        document.getElementById("body").style.transition = "600ms"
                        document.getElementById("nav").style.transition = "600ms"
                    }
                    function warnaB() {
                        document.getElementById("body").style.background = "#eeeeee"
                        document.getElementById("nav").style.background = "#b3afa4"
                        document.getElementById("card").style.background = "#b3afa4"
                        document.getElementById("card").style.transition = "600ms"
                        document.getElementById("body").style.transition = "600ms"
                        document.getElementById("nav").style.transition = "600ms"
                    }
                </script> -->
                <!-- <button class="btn btn-primary" onclick="myFunction()">Toggle dark mode</button> -->
                <script>
                    function myFunction() {
                    var element = document.body;
                    element.classList.toggle("dark-mode");
                    }
                </script>       
                
            </div>
        </div>
    </nav>

