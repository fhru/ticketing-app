<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <!-- My Css -->
    <link rel="stylesheet" href="{{asset('admin/assets/css/about.css')}}" type="text/css">

    <!-- AOS Css -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">


    <title>About - Berangkat</title>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="/">Berangkat</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Home </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/popular">Popular</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="/about">About</a>
                    </li>
                </ul>

                <ul class="navbar-nav ml-auto">
                    @if (Auth::guest())
                    <li class="nav-item ">
                        <a class=" btn btn-warning" href="/login">Login</a>
                    </li>
                    @else
                    <li class="nav-item ">
                        <span class="nama-user mr-2"
                            style="color: white; text-transform: none; position: relative; top: 5px;">Hi, <a
                                href="/my-account"
                                class="font-weight-bold text-decoration-none text-warning">{{auth()->user()->name}}</a></span>
                        <a class=" btn btn-warning" href="/logout"><i class="fas fa-sign-out-alt"></i></a>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <!-- ENd navbar -->

    <!-- Jumbotron -->
    <div class="jumbotron jumbotron-fluid">
        <div class="container" data-aos="fade-down">
            <h1 class="display-6 text-center">Explore The World And Create your Moment With <span
                    class="berangkat">Berangkat</span></h1>
            <p class="lead">Here We Go Again</p>
        </div>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="wave">
        <path fill="#1F2E35" fill-opacity="1"
            d="M0,224L80,197.3C160,171,320,117,480,128C640,139,800,213,960,234.7C1120,256,1280,224,1360,208L1440,192L1440,0L1360,0C1280,0,1120,0,960,0C800,0,640,0,480,0C320,0,160,0,80,0L0,0Z">
        </path>
    </svg>
    <!-- end jumbotron -->
    <!-- content -->
    <section class="content-section mb-5">
        <div class="container">
            <div class="text text-1">
                <h3 class="text-center">Discover Yourself</h3>
                <p class="text-center">in a place where you can turn your passion into action!</p>
            </div>
            <div class="img" data-aos="fade-down" data-aos-delay="200">
                <img src="{{asset('admin/assets/img/isometric.png')}}" alt="">
            </div>
            <div class="text text-2">
                <h3 class="text-center">The Humans Behind the product</h3>
                <p class="text-center">Our team has led and delivered large-scale software and design projects in<br>
                    multiple startups and high-growth environments.</p>
            </div>
            <div class="row">
                <div class="col-lg">
                    <div class="card text-center" data-aos="zoom-in-up">
                        <img src="{{asset('admin/assets/img/profil1.jpg')}}" class="card-img-top rounded-circle mx-auto"
                            alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Fahru</h5>
                            <p class="sub-title">CEO & Co-Founder</p>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's content.</p>
                            <a href="#">Twitter</a> |
                            <a href="#">GitHub</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg">
                    <div class="card text-center" data-aos="zoom-in-up" data-aos-delay="200">
                        <img src="{{asset('admin/assets/img/profil2.jpg')}}" class="card-img-top rounded-circle mx-auto"
                            alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Rahman</h5>
                            <p class="sub-title">Head Of Design</p>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's content.</p>
                            <a href="#">Twitter</a> |
                            <a href="#">GitHub</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg">
                    <div class="card text-center" data-aos="zoom-in-up" data-aos-delay="400">
                        <img src="{{asset('admin/assets/img/profil3.jpg')}}" class="card-img-top rounded-circle mx-auto"
                            alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Farah</h5>
                            <p class="sub-title">Front-End Engineer</p>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's content.</p>
                            <a href="#">Twitter</a> |
                            <a href="#">GitHub</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>


    <!-- end content -->

    <!-- footer -->
    <section class="footer-section">
        <div class="container footer">
            <div class="row">

                <div class="col-lg">
                    <a class="navbar-brand footer-title" href="#">
                        <img src="img/berangkatkuning.png" alt="">
                        Berangkat</a>
                    <div class="soc-med">
                        <a href="#">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg">
                    <h5>Legal Stuff</h5>
                    <ul style="list-style-type: none;">
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Financing</a></li>
                        <li><a href="#">Help Center</a></li>
                        <li><a href="#">Terms of Service</a></li>
                    </ul>
                </div>

                <div class="col-lg">
                    <h5>Products</h5>
                    <ul style="list-style-type: none;">
                        <li><a href="#">Airplane Ticket</a></li>
                        <li><a href="#">Train Ticket</a></li>
                    </ul>
                </div>

                <div class="col-lg">
                    <h5>Office</h5>
                    <ul style="list-style-type: none;">
                        <li><a href="#">berangkat@gmail.com</a></li>
                        <li>Jl. Bintara VI No 6</li>
                        <li>Bekasi, Indonesia</li>
                    </ul>
                </div>

                <div class="col-lg">
                    <h5>Payment</h5>
                    <ul style="list-style-type: none;">
                        <li><img src="{{asset('admin/assets/img/indomaret.svg')}}" alt="" style="width: 70px"></li>
                        <li><img src="{{asset('admin/assets/img/ovo.svg')}}" alt="" style="width: 70px" class="mt-2">
                        </li>
                        <li><img src="{{asset('admin/assets/img/dana.svg')}}" alt="" style="width: 70px" class="mt-2">
                        </li>
                    </ul>
                </div>

            </div>

            <div class="row">
                <div class="col copyright">
                    <p class="text-center">Made With Love By <span class="font-weight-bold">Berangkat</span> All Right
                        Reserved</p>
                </div>
            </div>

        </div>
    </section>
    <!-- end footer -->



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    -->
    <!-- Fontawesome -->
    <script src="{{asset('admin/assets/js/all.js')}}"></script>
    <!-- AOS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        $(document).on('click','ul li', function() {
            $(this).addClass('active').siblings().removeClass('active')
        })
        
    // aos
    AOS.init({
      duration: 1000
    });
    </script>

</body>

</html>