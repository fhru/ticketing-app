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
                <a href="/logout" class="btn btn-warning"><i class="fas fa-sign-out-alt"></i></a>
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

                        <li class="active">
                            <a href="#" class="item">
                                <div class="font-awesome">
                                    <i class="fas fa-tachometer-alt"></i>
                                </div>
                                <div class="menu-desc">
                                    Dashboard
                                </div>
                            </a>
                        </li>

                        <li>
                            <a href="/train-list" class="item">
                                <div class="font-awesome">
                                    <i class="fas fa-ticket-alt"></i>
                                </div>
                                <div class="menu-desc">
                                    Train Ticket
                                </div>
                            </a>
                        </li>

                        <li>
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
                    <h5>Overview</h5>
                    <div class="overview">
                        <div class="row">
                            <div class="col clients ov-item">
                                Clients
                                <p>1.290</p>
                            </div>
                            <div class="col operator ov-item">
                                Operator
                                <p>30</p>
                            </div>
                            <div class="col views ov-item">
                                Views
                                <p>33.000</p>
                            </div>
                            <div class="col earnings ov-item">
                                Earnings
                                <p>$9999</p>
                            </div>
                        </div>
                    </div>
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