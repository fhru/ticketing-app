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
    <section class="nav">
        <div class="header">
            <div class="nav-brand">Berangkat</div>
            <div class="search-field">
                <form action="/user-list" method="GET">
                    <div class="input-group mb-3">
                        <input type="text" name="cari" class="form-control" placeholder="Search..."
                            aria-describedby="button-addon2">
                        <button class="btn btn-warning ml-1" type="submit" id="button-addon2"><i
                                class="fas fa-search"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </section>
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


                        <li>
                            <a href="/airplane-transactions" class="item">
                                <div class="font-awesome">
                                    <i class="fas fa-receipt"></i>
                                </div>
                                <div class="menu-desc">
                                    Airplane Transactions
                                </div>
                            </a>
                        </li>

                        <li>
                            <a href="/train-transactions" class="item">
                                <div class="font-awesome">
                                    <i class="fas fa-receipt"></i>
                                </div>
                                <div class="menu-desc">
                                    Train Transactions
                                </div>
                            </a>
                        </li>

                        <li class="active">
                            <a href="#" class="item">
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
                    @if (session('sukses'))
                    <div class="alert alert-success mt-2" role="alert">
                        {{ session('sukses') }}
                    </div>
                    @endif

                    <div class="row">
                        <div class="col">
                            <h5>Data User</h5>
                        </div>
                        <div class="col d-flex justify-content-end add-button">
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#exampleModal"><i class="fas fa-plus"></i></button>
                        </div>
                    </div>

                    <table class="table text-white">
                        <thead class="thead-dark">
                            <tr>
                                <th>ID</th>
                                <th>Role</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_user as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->role }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <a href="/user-list/{{$user->id}}/edit" class="btn btn-warning"><i
                                            class="fas fa-edit"></i></a>
                                    <a href="/user-list/{{$user->id}}/delete" class="btn btn-danger"
                                        onclick="return confirm('Yakin Mau Dihapus?')"><i
                                            class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="paginate d-flex justify-content-center">
                        {{$data_user->links()}}
                    </div>
                </div>
            </div>
        </div>
    </main>

    {{-- modal --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Input User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="/user-list/create" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="role">Role</label>
                            {{-- <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                placeholder="Role" name="role" required> --}}
                            <select name="role" id="role" class="custom-select">
                                <option value="admin">Admin</option>
                                <option value="pelanggan">Pelanggan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                placeholder="Nama" name="name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="Email" name="email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Password</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                placeholder="Password" name="password">
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
    <!--
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    -->

    <script src="{{asset('admin/assets/js/all.js')}}"></script>
    <script>
        $(document).on('click','ul li', function() {
            $(this).addClass('active').siblings().removeClass('active')
        })

    </script>
</body>

</html>