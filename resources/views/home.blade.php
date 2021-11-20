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
    <link rel="stylesheet" href="{{asset('admin/assets/css/landingpage.css')}}" type="text/css">

    <!-- AOS Css -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <link rel="shortcut icon" href="{{ asset('admin/assets/img/berangkatkuning.png') }}" type="image/x-icon">


    <title>Home - Berangkat</title>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">Berangkat</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="/">Home </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/popular">Popular</a>
                    </li>
                    <li class="nav-item">
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
    <section class="jumbotron">
        <div class="container">
            <div class="row">

                <div class="col-lg-6 jumbo-right" data-aos="fade-up">
                    <img src="{{asset('admin/assets/img/roket2.png')}}" alt="" class="img-fluid">
                </div>

                <div class="col-lg-6 jumbo-left">
                    <h2 class="typewriter">The Best Ticketing Site For <span class="typewriter-text"
                            data-text='["Traveller.", "Youngster."]'></span> </h2>
                    <p class="slogan">Your satisfaction, Our commitment</p>
                    <div class="explore">
                        <a href="#transport" class="btn btn-warning btn-lg">Explore Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end jumbotron -->
    <!-- transport -->
    <section class="transport-section" id="transport">
        <div class="container">
            <div class="transport-title">
                <h3 class="text-center">Find Your Tickets</h3>
            </div>

            <div class="row transport">

                <div class="col-lg-5">
                    <div class="transport-item">
                        <a href="/airplane-search">
                            <div class="card" data-aos="fade-right" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                <img src="{{asset('admin/assets/img/cargo.png')}}" class="card-img-top mx-auto"
                                    alt="...">
                                <div class="card-body">
                                    <h5 class="card-title text-center">Airplane</h5>
                                </div>
                            </div>
                        </a>
                    </div>

                </div>
                <div class="col-lg-5">
                    <div class="transport-item">
                        <a href="/train-search">
                            <div class="card" data-aos="fade-left" data-aos-delay="300">
                                <img src="{{asset('admin/assets/img/train.png')}}" class="card-img-top mx-auto"
                                    alt="...">
                                <div class="card-body">
                                    <h5 class="card-title text-center">Train</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- end transport -->
    <!-- Features -->
    <section class="features-section">
        <div class="container features">
            <div class="why-title">
                <h3>Why Book With Berangkat?</h3>
                <p>some of the features on Berangkat</p>
            </div>

            <div class="row">

                <div class="col-lg">
                    <div class="card" data-aos="flip-up">
                        <img src="{{asset('admin/assets/img/credit-card.png')}}" class="card-img-top mx-auto" alt="...">
                        <div class="card-body">
                            <h5 class="card-title text-center">Various Payment Options</h5>
                            <p class="card-text text-center">Be more flexible with various payment methods from ATM
                                Transfer, Credit Card, to Internet Banking.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg">
                    <div class="card" data-aos="flip-up" data-aos-delay="300">
                        <img src="{{asset('admin/assets/img/medal.png')}}" class="card-img-top mx-auto" alt="...">
                        <div class="card-body">
                            <h5 class="card-title text-center">Best Price Guarantee</h5>
                            <p class="card-text text-center">Some quick example text to build on the card title and make
                                up the bulk of the card's content.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg">
                    <div class="card" data-aos="flip-up" data-aos-delay="600">
                        <img src="{{asset('admin/assets/img/shield.png')}}" class="card-img-top mx-auto" alt="...">
                        <div class="card-body">
                            <h5 class="card-title text-center">Your personal data is Protected</h5>
                            <p class="card-text text-center">Some quick example text to build on the card title and make
                                up the bulk of the card's content.</p>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>
    <!-- end features -->

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

        // typewriter
      $(document).ready(function() {
      
      typing( 0, $('.typewriter-text').data('text') );

      function typing( index, text ) {
        
        var textIndex = 1;

        var tmp = setInterval(function() {
          if ( textIndex < text[ index ].length + 1 ) {
            $('.typewriter-text').text( text[ index ].substr( 0, textIndex ) );
            textIndex++;
          } else {
            setTimeout(function() { deleting( index, text ) }, 2000);
            clearInterval(tmp);
          }

        }, 150);

      }

      function deleting( index, text ) {

        var textIndex = text[ index ].length;

        var tmp = setInterval(function() {

          if ( textIndex + 1 > 0 ) {
            $('.typewriter-text').text( text[ index ].substr( 0, textIndex ) );
            textIndex--;
          } else {
            index++;
            if ( index == text.length ) { index = 0; }
            typing( index, text );
            clearInterval(tmp);
          }

        }, 150)

      }

    });



    // aos
    AOS.init({
      duration: 1000
    });
    </script>

</body>

</html>