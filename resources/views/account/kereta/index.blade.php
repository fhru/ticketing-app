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
    <link rel="stylesheet" href="{{asset('admin/assets/css/airplane-account.css')}}" type="text/css">

    <!-- AOS Css -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">


    <title>My Account - Berangkat</title>
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
    <main>
        <div class="container">
            <div class="row form-detail">
                <div class="col-lg-3">
                    <img src="{{asset('admin/assets/img/train.png')}}" alt="">
                </div>
                <div class="col-lg d-flex justify-content-center flex-column">
                    <h2 class="font-weight-bold">{{auth()->user()->name}}</h2>
                    <p>{{auth()->user()->email}}</p>
                    {{-- <div class="wrap">
                        <a href="#" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                    </div> --}}
                </div>
                <div class="col-lg d-flex justify-content-end">
                    <div class="wrapper">
                        <a href="/my-account" class="btn button">
                            <i class="fas fa-chevron-left"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row form-detail">
                <div class="col-lg">
                    <h4 class="font-weight-bold">My Order</h4>
                    @if (session('sukses'))
                    <div class="alert alert-success mt-2" role="alert">
                        {{ session('sukses') }}
                    </div>
                    @endif
                </div>
            </div>

            <div class="row form-detail">
                @foreach ($tiket as $item)
                <div class="col-lg-4 float-left">
                    <div class="card">
                        <div class="wrapper">
                            <div class="card-header">
                                <h5 class="card-title font-weight-bold">{{$item->nama_kereta}}</h5>
                                <span class="btn-sm button">{{$item->from}}</span>
                                <i class="fas fa-long-arrow-alt-right mx-1"></i>
                                <span class="btn-sm button">{{$item->to}}</span>
                                <div class="wrapper">
                                    <small class="badge badge-info mt-3">{{$item->kode_krt}}</small>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="name">
                                    <span class="sub-title mt-2 font-weight-bold">{{$item->nama}}</span><br>
                                    <small class="mb-2"><i class="fas fa-calendar-alt mr-2"></i>{{$item->pergi}}</small>
                                </div>

                                <div class="card-text mb-2">
                                    <div class="text-center"><small>Kode Tiket</small></div>
                                    <div class="alert btn-block button font-weight-bold text-center">
                                        {{$item->kode_tiket}}
                                    </div>
                                </div>
                                <div class="card-text">
                                    <div class="mt-2 text-center"><small>Status</small></div>
                                    @if ($item->status == 'Menunggu Pembayaran')
                                    <div class="alert alert-warning text-center">
                                        <small class="font-weight-bold">{{$item->status}}</small>
                                    </div>
                                    @endif
                                    @if ($item->status == 'Telah Dibayar')
                                    <div class="alert alert-success text-center">
                                        <small class="font-weight-bold">{{$item->status}}</small>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="card-footer middle">
                                @php
                                $parameter = $item->id;
                                $parameter = Crypt::encrypt($parameter);
                                @endphp
                                {{-- <form action="/my-account/airplane/payment/{{$parameter}}" method="POST">
                                @csrf --}}
                                <a href="/my-account/train/payment/{{$parameter}}" name="submit"
                                    class="btn btn-sm btn-warning">
                                    Detail
                                </a>
                                {{-- </form> --}}
                            </div>
                        </div>
                    </div>
                </div>

                @endforeach
                @if (!$tiket->isEmpty())
                @else
                <div class="col-lg text-center">
                    <div class="alert alert-info">
                        <h5 class="font-weight-bold">Anda Belum Melakukan Transaksi Apapun</h5>
                        <small>Tips: Lakukan Transaksi</small><br>
                    </div>
                    <a href="/train-search" class="btn btn-sm btn-warning">Cari Tiket!</a>
                </div>
                @endif
            </div>
        </div>
    </main>
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
    {{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}
    <!--
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    -->
    <!-- Fontawesome -->
    <script src="{{asset('admin/assets/js/all.js')}}"></script>
    <!-- AOS -->

</body>

</html>