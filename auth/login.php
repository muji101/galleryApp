<!DOCTYPE html>
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
            <div class="card-xl position-absolute top-0" style="width: 400px; margin-top: 170px; padding: 40px; background-color: #222831;">
                <div class="text-light text-center fw-bold px-4 fs-6">
                    <img class="img-fluid" style="max-width: 10%; height: auto" src="https://image.flaticon.com/icons/png/128/187/187902.png" alt="">
                    GalleryApp
                </div>
                <div class="py-3">
                    <center class="text-light fs-1">Sign In</center >
                </div>
                <form action="./auth/login_proses.php" method="POST" class="d-flex flex-column align-items-center align-content-center">
                    <div class="input-group my-2">
                        <span class="input-group-text" id="basic-addon1"><i class="fs-4 bi bi-person-check-fill"></i></span>
                        <input class="form-control" type="text" name="email" placeholder="Email@example.com">
                    </div>
                    <div class="input-group my-2">
                        <span class="input-group-text" id="basic-addon1"><i class="fs-4 bi bi-lock-fill"></i></span>
                        <input class="form-control" type="password" name="password" id="passwordInput" placeholder="Password">
                        <span onclick="myFunction()" class="input-group-text" id="basic-addon2"><i class="bi bi-eye-fill"></i></span>
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
                    <div class="my-2">
                        <button class="btn btn-success px-5">Sign In</button>
                    </div>
                    <div class="my-1">
                        <center class="text-light">No registered ? <a class="text-decoration-none" href="register.php">Sign Up</a></center>center>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="http://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <script>
        particlesJS("particles-js", {"particles":{"number":{"value":80,"density":{"enable":true,"value_area":800}},"color":{"value":"#ffffff"},"shape":{"type":"circle","stroke":{"width":0,"color":"#000000"},"polygon":{"nb_sides":5},"image":{"src":"img/github.svg","width":100,"height":100}},"opacity":{"value":0.5,"random":false,"anim":{"enable":false,"speed":1,"opacity_min":0.1,"sync":false}},"size":{"value":3,"random":true,"anim":{"enable":false,"speed":40,"size_min":0.1,"sync":false}},"line_linked":{"enable":true,"distance":150,"color":"#ffffff","opacity":0.4,"width":1},"move":{"enable":true,"speed":6,"direction":"none","random":false,"straight":false,"out_mode":"out","bounce":false,"attract":{"enable":false,"rotateX":600,"rotateY":1200}}},"interactivity":{"detect_on":"canvas","events":{"onhover":{"enable":true,"mode":"repulse"},"onclick":{"enable":true,"mode":"push"},"resize":true},"modes":{"grab":{"distance":400,"line_linked":{"opacity":1}},"bubble":{"distance":400,"size":40,"duration":2,"opacity":8,"speed":3},"repulse":{"distance":200,"duration":0.4},"push":{"particles_nb":4},"remove":{"particles_nb":2}}},"retina_detect":true});var count_particles, stats, update; stats = new Stats; stats.setMode(0); stats.domElement.style.position = 'absolute'; stats.domElement.style.left = '0px'; stats.domElement.style.top = '0px'; document.body.appendChild(stats.domElement); count_particles = document.querySelector('.js-count-particles'); update = function() { stats.begin(); stats.end(); if (window.pJSDom[0].pJS.particles && window.pJSDom[0].pJS.particles.array) { count_particles.innerText = window.pJSDom[0].pJS.particles.array.length; } requestAnimationFrame(update); }; requestAnimationFrame(update);;
    </script>
</body>
</html>