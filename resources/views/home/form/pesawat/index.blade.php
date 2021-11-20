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
    <link rel="stylesheet" href="{{asset('admin/assets/css/airplane-form.css')}}" type="text/css">

    <!-- AOS Css -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">


    <title>Form - Berangkat</title>
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
                    <li class="nav-item active">1. Pesan <i class="fas fa-chevron-right"></i></li>
                    <li class="nav-item">2. Bayar <i class="fas fa-chevron-right"></i></li>
                    <li class="nav-item">3. Selesai</li>
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
    {{-- content --}}
    <main>
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="form-field">
                        <div class="form-input">
                            @php
                            $parameter = $pesawat->id;
                            $parameter = Crypt::encrypt($parameter);
                            @endphp
                            <form action="/airplane-ticket/form/{{$parameter}}/payment" method="POST"
                                class="form-prevent">
                                @csrf
                                <div class="form-detail">
                                    <div class="form-header mb-4">
                                        <h4><i class="fas fa-passport mr-2"></i>Detail Pemesan</h4>
                                    </div>
                                    <div class="mb-4">
                                        <input type="text" class="form-control" id="nama" aria-describedby="emailHelp"
                                            placeholder="Nama Lengkap" name="nama" required
                                            value="{{auth()->user()->name}}">
                                        <small id="emailHelp" class="form-text text-secondary">Isi sesuai KTP/Paspor/SIM
                                            (tanpa tanda baca
                                            dan gelar)
                                        </small>
                                    </div>
                                    <div class="mb-4">
                                        <input type="email" class="form-control" id="email" aria-describedby="emailHelp"
                                            placeholder="Email" name="email" required value="{{auth()->user()->email}}">
                                        <small id="emailHelp" class="form-text text-secondary">E-ticket akan dikirimkan
                                            ke
                                            Email
                                            ini</small>
                                    </div>
                                    <div class="mb-4">
                                        <input type="number" class="form-control" id="NoTelp"
                                            aria-describedby="emailHelp" placeholder="No Telepon" name="telepon"
                                            required min="0" value="{{auth()->user()->telepon}}">
                                        <small id="emailHelp" class="form-text text-secondary">No Telepon</small>
                                    </div>
                                </div>

                                <div class="form-detail">
                                    <div class="form-header mb-4">
                                        <h4><i class="fas fa-user-circle mr-2"></i>Detail Penumpang</h4>
                                    </div>
                                    <div class="mb-4">
                                        <label for="jml_penumpang">Jumlah Penumpang</label><br>
                                        <select name="jml_penumpang" id="jml_penumpang"
                                            class="custom-select jml-penumpang" required>
                                            <option selected value="">0</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                        </select>
                                    </div>
                                    <div class="mb-4">
                                        <label for="region">Kewarganegaraan</label><br>
                                        <select name="region" id="region" class="js-example-basic-single"
                                            style="width: 100%" required>
                                            <option selected value="">Choose</option>
                                            @foreach ($data_negara as $negara)
                                            <option value="{{$negara->nama}}">{{$negara->nama}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>

                                <div class="form-detail">
                                    <div class="form-header mb-4">
                                        <h4><i class="fas fa-credit-card mr-2"></i>Metode Pembayaran</h4>
                                    </div>
                                    <div class="mb-4">
                                        <select name="pembayaran" id="pembayaran" class="custom-select pembayaran"
                                            required>
                                            <option selected value="">Pilih Metode Pembayaran</option>
                                            <option value="indomaret">Indomaret</option>
                                            <option value="gopay">Go-pay</option>
                                            <option value="ovo">OVO</option>
                                            <option value="dana">Dana</option>
                                        </select>
                                    </div>
                                </div>

                                <button type="submit" name="submit"
                                    class="btn btn-warning float-right p-2 mb-3 button-prevent">
                                    <div class="spinner"><i role="status" class="spinner-border spinner-border-sm"></i>
                                        Submitting </div>
                                    <div class="hide-text">Confirm</div>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-detail">
                        <div class="tiket-header">
                            <h5>Penerbangan</h5>
                            <h5 style="font-weight: 700">{{$pesawat->nama}}</h5>
                        </div>
                        <div class="row">
                            <div class="col">
                                <img src="" alt=""><img src="{{asset('admin/assets/img/'.$pesawat->avatar)}}"
                                    class="card-img-top img-fluid mx-auto kai" alt="...">
                            </div>

                            <div class="col">
                                <small>{{$pesawat->awal}}</small>
                                <i class="fas fa-long-arrow-alt-right mx-2"></i>
                                <small>{{$pesawat->akhir}}</small>
                                <div class="row">
                                    <div class="col">
                                        <span class="font-weight-bold">{{$pesawat->kelas}}</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <span>{{$pesawat->pergi}}</span><br>
                                        <small>{{$pesawat->jam}}</small>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <div class="harga bg-warning">
                                    <span>IDR {{number_format($pesawat->harga,0,",",".")}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
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
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.css"
        integrity="sha512-CbQfNVBSMAYmnzP3IC+mZZmYMP2HUnVkV4+PwuhpiMUmITtSpS7Prr3fNncV1RBOnWxzz4pYQ5EAGG4ck46Oig=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Fontawesome -->
    <script src="{{asset('admin/assets/js/all.js')}}"></script>
    <!-- AOS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        $(document).ready(function() {
        $('.js-example-basic-single').select2({
            theme: "bootstrap"
        });
        });

        (function() {
        $('.form-prevent').on('submit', function() {
        $('.button-prevent').attr('disabled', 'true');
        $('.spinner').show();
        $('.hide-text').hide();
        })
        })();
    </script>

</body>

</html>