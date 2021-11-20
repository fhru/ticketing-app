<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <!-- my css -->
    <link rel="stylesheet" href="{{asset('admin/assets/css/dashboard.css')}}">


    <title>Dashboard Admin</title>
</head>

<body>
    <!-- Navbar -->
    <nav>
        <div class="header">
            <div class="nav-brand">Berangkat</div>
            <div class="search-field">
            </div>
        </div>
    </nav>
    <!-- ENd navbar -->
    <!-- content -->
    <main>
        <div class="content">
            <div class="sidebar">
                <div class="profil">
                    <img src="{{asset('admin/assets/img/male-user.gif')}}" alt="" class="rounded-circle">
                    <p class="nama">{{auth()->user()->name}}</p>
                    <p class="profile-desc">{{auth()->user()->role}}</p>
                </div>
                <div class="menu">
                    <ul>

                        <li class="">
                            <a href="/dashboard" class="item">
                                <div class="font-awesome">
                                    <i class="fas fa-tachometer-alt"></i>
                                </div>
                                <div class="menu-desc">
                                    Dashboard
                                </div>
                            </a>
                        </li>

                        <li class="">
                            <a href="/train-list" class="item">
                                <div class="font-awesome">
                                    <i class="fas fa-ticket-alt"></i>
                                </div>
                                <div class="menu-desc">
                                    Train Ticket
                                </div>
                            </a>
                        </li>

                        <li class="">
                            <a href="/airplane-list" class="item">
                                <div class="font-awesome">
                                    <i class="fas fa-ticket-alt"></i>
                                </div>
                                <div class="menu-desc">
                                    Airplane Ticket
                                </div>
                            </a>
                        </li>


                        <li class="active">
                            <a href="#" class="item">
                                <div class="font-awesome">
                                    <i class="fas fa-receipt"></i>
                                </div>
                                <div class="menu-desc">
                                    Airplane Transactions
                                </div>
                            </a>
                        </li>

                        <li class="">
                            <a href="/train-transactions" class="item">
                                <div class="font-awesome">
                                    <i class="fas fa-receipt"></i>
                                </div>
                                <div class="menu-desc">
                                    Train Transactions
                                </div>
                            </a>
                        </li>

                        <li>
                            <a href="/user-list" class="item">
                                <div class="font-awesome">
                                    <i class="fas fa-users"></i>
                                </div>
                                <div class="menu-desc">
                                    Users
                                </div>
                            </a>
                        </li>

                    </ul>

                </div>
            </div>

            <div class="main-content">
                <div class="sub-main">
                    <div class="modal-body">

                        <form action="/airplane-transactions/{{$data_tiket->id}}/update" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama Maskapai</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" name="nama_pesawat"
                                    value="{{$data_tiket->nama_pesawat}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">From</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" name="from" value="{{$data_tiket->from}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">To</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" name="to" value="{{$data_tiket->to}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama Pemesan</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" name="nama" value="{{$data_tiket->nama}}">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input name="email" type="email" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" value="{{$data_tiket->email}}">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Telepon</label>
                                <input name="telepon" type="number" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" value="{{$data_tiket->telepon}}">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Total Harga</label>
                                <input name="total_harga" type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" value="{{$data_tiket->total_harga}}">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Region Penumpang</label>
                                <input name="region" type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" value="{{$data_tiket->region_penumpang}}">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Tgl Pergi</label>
                                <input name="pergi" type="date" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" value="{{$data_tiket->pergi}}">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Jam</label>
                                <input name="jam" type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" value="{{$data_tiket->jam}}">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Pembayaran</label>
                                <input name="pembayaran" type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" value="{{$data_tiket->pembayaran}}">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Kode Tiket</label>
                                <input name="kode_tiket" type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" value="{{$data_tiket->kode_tiket}}">
                            </div>

                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="custom-select">
                                    <option value="{{$data_tiket->status}}" selected>{{$data_tiket->status}}
                                    </option>
                                    <option value="Menunggu Pembayaran">Menunggu Pembayaran</option>
                                    <option value="Telah Dibayar">Telah Dibayar</option>
                                    <option value="Expired">Expired</option>
                                </select>
                            </div>
                    </div>

                    <div class=" modal-footer">
                        <a href="/airplane-list" class="btn btn-secondary">Close</a>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    </form>

                </div>
            </div>
        </div>
    </main>












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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
    <script src="{{asset('admin/assets/js/all.js')}}"></script>
    <script>
        $(document).on('click','ul li', function() {
            $(this).addClass('active').siblings().removeClass('active')
        })

    </script>
</body>

</html>