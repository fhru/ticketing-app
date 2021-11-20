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
                    <img src="{{asset('admin/assets/img/cargo.png')}}" alt="" class="gambar w-75">
                </div>
                <div class="col-lg d-flex justify-content-center flex-column">
                    <h2 class="font-weight-bold">Edit Transactions List</h2>
                    {{-- <div class="wrap">
                        <a href="#" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                    </div> --}}
                </div>
                <div class="col d-flex justify-content-end">
                    <div class="wrapper">
                        <a href="/airplane-transactions" class="btn btn-light button">
                            <i class="fas fa-chevron-left"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="form-detail">
                <div class="row">
                    <div class="col-lg-4">
                        <form action="/airplane-transactions" method="GET">
                            <div class="input-group">
                                <input type="text" class="form-control mt-1" placeholder="Search..."
                                    aria-describedby="button-addon2" name="cari">
                                <div class="input-group-append">
                                    <button class="btn btn-warning" type="submit" id="button-addon2"><i
                                            class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    {{-- <div class="col-lg d-flex justify-content-end add-button">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i
                                class="fas fa-plus"></i></button>
                    </div> --}}

                </div>
            </div>

            <div class="row form-detail">
                <div class="col">
                    <form action="/airplane-transactions/{{$data_tiket->id}}/update" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nama Pesawat</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="Nama Pesawat" name="nama_pesawat"
                                        value="{{$data_tiket->nama_pesawat}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="from">From</label>
                                    <select class="js-example-basic-single" name="from" id="from" style="width: 100%;">
                                        <option selected value="{{$data_tiket->from}}">{{$data_tiket->from}}</option>
                                        @foreach ($bandara as $item)
                                        <option value="{{$item->alias}}">{{$item->nama_daerah}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <label for="to">To</label>
                                <select class="js-example-basic-single" name="to" id="to" style="width: 100%;">
                                    <option selected value="{{$data_tiket->to}}">{{$data_tiket->to}}</option>
                                    @foreach ($bandara as $item)
                                    <option value="{{$item->alias}}">{{$item->nama_daerah}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nama</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="Nama Pesawat" name="nama"
                                        value="{{$data_tiket->nama}}">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="Email" name="email"
                                        value="{{$data_tiket->email}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Telepon</label>
                                    <input type="number" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="Telepon" name="telepon" min="0"
                                        value="{{$data_tiket->telepon}}">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Total Harga</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="Total Harga" name="total_harga"
                                        value="{{number_format($data_tiket->total_harga,0,",",".")}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Kewarganegaraan</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="Kewarganegaraan"
                                        name="region_penumpang" value="{{$data_tiket->region_penumpang}}">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="jml_penumpang">Jumlah Penumpang</label>
                                    <select name="jml_penumpang" id="jml_penumpang" class="custom-select">
                                        <option value="{{$data_tiket->jml_penumpang}}" selected>
                                            {{$data_tiket->jml_penumpang}}</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tgl Pergi</label>
                                    <input type="date" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="Tgl Pergi" name="pergi"
                                        value="{{$data_tiket->pergi}}">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Jam</label>
                                    <input type="time" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="Jam" name="jam"
                                        value="{{$data_tiket->jam}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Pembayaran</label>
                                    {{-- <input type="text" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="Pembayaran" name="pembayaran"
                                        value="{{$data_tiket->pembayaran}}"> --}}
                                    <select name="pembayaran" id="pembayaran" class="custom-select">
                                        <option value="{{$data_tiket->pembayaran}}" selected>{{$data_tiket->pembayaran}}
                                        </option>
                                        <option value="indomaret">Indomaret</option>
                                        <option value="ovo">OVO</option>
                                        <option value="dana">Dana</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tiket ID</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="Tiket ID" name="tiket_id"
                                        value="{{$data_tiket->tiket_id}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Kode Tiket</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="Kode Tiket" name="kode_tiket"
                                        value="{{$data_tiket->kode_tiket}}">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Status</label>
                                    {{-- <input type="text" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="Status" name="status"
                                        value="{{$data_tiket->status}}"> --}}
                                    <select name="status" id="status" class="custom-select">
                                        <option value="{{$data_tiket->status}}" selected>{{$data_tiket->status}}
                                        </option>
                                        <option value="Menunggu Pembayaran">Menunggu Pembayaran</option>
                                        <option value="Telah Dibayar">Telah Dibayar</option>
                                        <option value="Expired">Expired</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="kode_pst">Kode Pesawat</label>
                                    <input type="text" class="form-control" id="kode_pst" name="kode_pst"
                                        value="{{$data_tiket->kode_pst}}">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="expired">Expired</label>
                                    <input type="text" class="form-control" id="expired" name="expired"
                                        value="{{$data_tiket->expired}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="modal-footer">
                                    <a href="/airplane-transactions" class="btn btn-secondary"
                                        data-dismiss="modal">Close</a>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
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

    {{-- modal --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Input Data Tiket Pesawat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="/airplane-list/create" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Pesawat</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                placeholder="Nama Pesawat" name="nama">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Kelas</label>
                            <select name="kelas" id="kelas" class="custom-select">
                                <option value="Ekonomi">Ekonomi</option>
                                <option value="Bisnis">Bisnis</option>
                                <option value="First Class">First Class</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tgl Pergi</label>
                            <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                placeholder="Tanggal Pergi" name="pergi">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Jam Penerbangan</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                placeholder="Jam" name="jam">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Harga</label>
                            <input name="harga" type="text" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="Harga">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Avatar</label>
                            {{-- <input name="avatar" type="text" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="Avatar.png"> --}}
                            <select name="avatar" id="avatar" class="custom-select">
                                <option selected disabled>Choose...</option>
                                <option value="garuda.png">Garuda Indonesia</option>
                                <option value="lionair.png">Lion Air</option>
                            </select>
                        </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </form>
            </div>
        </div>
    </div>

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
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- Fontawesome -->
    <script src="{{asset('admin/assets/js/all.js')}}"></script>
    <!-- AOS -->
    <script>
        $(document).ready(function() {
                $('.js-example-basic-single').select2();
                });
    </script>
</body>

</html>