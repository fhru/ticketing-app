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
    <link rel="stylesheet" href="{{asset('admin/assets/css/airplane-ticket-list.css')}}" type="text/css">

    <!-- AOS Css -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">


    <title>Ticket List - Berangkat</title>
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
                        <a class="nav-link" href="/train-ticket">Train Ticket </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="/airplane-ticket">Airplane Ticket</a>
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
            <h1 class="display-6">Find Tickets Easily</h1>
            <p class="lead">And Celebrate With Loved Ones</p>
        </div>
    </div>
    <!-- end jumbotron -->

    <!-- ticket -->
    <section class="ticket-section">
        <div class="container clearfix">
            <div class="row">
                @foreach ($data_pesawat as $pesawat)
                <div class="col-lg-4 float-left">
                    <div class="card" data-aos="fade-up">
                        <img src="{{asset('admin/assets/img/'.$pesawat->avatar)}}"
                            class="card-img-top img-fluid mx-auto kai" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{$pesawat->nama}}</h5>
                            <p class="sub-title small">{{$pesawat->kelas}}</p>
                            <div class="card-text">

                                <div class="train-code">
                                    <div class="row">
                                        <div class="col">
                                            <p class="mt-2 small">From</p>
                                            <p class="bold">{{$pesawat->awal}}</p>
                                        </div>
                                        <div class="col">
                                            <p class="mt-2 small">To</p>
                                            <p class="bold">{{$pesawat->akhir}}</p>
                                        </div>
                                    </div>
                                </div>

                                <span class="bold">{{$pesawat->pergi}}</span><br>
                                <small>{{$pesawat->jam}}</small>

                                <div class="price-box mt-3">
                                    <div class="row">
                                        <div class="col-lg">
                                            <span class="price text-info">IDR
                                                {{number_format($pesawat->harga,0,",",".")}}</span>
                                        </div>
                                        <div class="col-lg">
                                            {{-- <a href="/airplane-ticket/form/{{$pesawat->id}}"
                                            class="btn btn-warning btn-block">Choose</a> --}}
                                            @php
                                            $parameter = $pesawat->id;
                                            $parameter = Crypt::encrypt($parameter);
                                            @endphp

                                            <form action="/airplane-ticket/form/{{$parameter}}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-warning"
                                                    name="submit">Choose</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                @endforeach

                @if (!$data_pesawat->isEmpty())
                @else
                <div class="col-lg text-center">
                    <div class="alert alert-danger">
                        <h5 class="font-weight-bold">Mohon Maaf Penerbangan Yang Anda Cari Tidak Tersedia</h5>
                        <small>Tips: Ubah Pencarian dengan Tanggal Atau Tujuan yang Berbeda</small><br>
                    </div>
                    <a href="/airplane-search" class="btn btn-sm btn-warning">Kembali</a>
                </div>
                @endif

            </div>
            {{-- <div class="button-group">
                <div class="btn-group mr-2 center" role="group" aria-label="First group">
                    <button type="button" class="btn btn-warning active">1</button>
                    <button type="button" class="btn btn-warning">2</button>
                    <button type="button" class="btn btn-warning">3</button>
                    <button type="button" class="btn btn-warning">Next</button>
                </div>
            </div> --}}

        </div>
    </section>

    <!-- end ticket -->
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
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
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
        // modal
    $('#myModal').on('shown.bs.modal', function () {
      $('#myInput').trigger('focus')
    })
    // aos
    AOS.init({
      duration: 1000
    });

    </script>

</body>

</html>