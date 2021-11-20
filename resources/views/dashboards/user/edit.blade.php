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
    <link rel="stylesheet" href="{{asset('admin/assets/css/dashboard2.css')}}" type="text/css">

    <!-- AOS Css -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">


    <title>Dashboard - Berangkat</title>
    <style>
        label {
            font-weight: 600;
        }
    </style>
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
                <div class="col-lg-2">
                    <img src="{{asset('admin/assets/img/male-user.gif')}}" alt="" class="gambar w-75">
                </div>
                <div class="col-lg d-flex justify-content-center flex-column">
                    <h2 class="font-weight-bold">Edit User</h2>
                    {{-- <div class="wrap">
                        <a href="#" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                    </div> --}}
                </div>
                <div class="col d-flex justify-content-end">
                    <div class="wrapper">
                        <a href="/user-list" class="btn btn-light button">
                            <i class="fas fa-chevron-left"></i>
                        </a>
                    </div>
                </div>
            </div>

            <form action="/user-list/{{$data_user->id}}/update" method="POST">
                @csrf
                <div class="row form-detail">
                    <div class="col">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nama</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="Nama" name="name"
                                        value="{{$data_user->name}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="role">Role</label>
                                        <select name="role" id="role" class="custom-select">
                                            <option value="{{$data_user->role}}">{{$data_user->role}}</option>
                                            <option value="admin">Admin</option>
                                            <option value="pelanggan">Pelanggan</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="Email" name="email"
                                        value="{{$data_user->email}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Telepon</label>
                                    <input type="number" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="Telepon" name="telepon"
                                        value="{{$data_user->telepon}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="modal-footer">
                                    <a href="/user-list" class="btn btn-secondary">Close</a>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>

            </form>

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
    {{-- select 2 --}}
    {{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}

    <!-- Fontawesome -->
    <script src="{{asset('admin/assets/js/all.js')}}"></script>
    <!-- AOS -->
    {{-- <script>
        $(document).ready(function() {
                $('.js-example-basic-single').select2();
                });
    </script> --}}
</body>

</html>