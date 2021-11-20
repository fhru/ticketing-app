@php
if($tiket->status != "Telah Dibayar"){
header('Location: ../../');
exit;
}
@endphp
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <link rel="stylesheet" href="{{asset('admin/assets/css/print.css')}}" type="text/css">

    <title>Berangkat.com</title>
</head>

<div class="wrapper">
    <img src="{{asset('admin/assets/img/title.png')}}" alt="" class="float-right">
    <div class="row">
        <div class="col judul-box">
            <p class="judul">E-Ticket <span>/E-tiket</span></p><br>
            <p class="sub-judul">Departure Flight <span>/Penerbangan Pergi</span></p>
        </div>
        <div class="row">
            <div class="col mt-2">
                <h5 class="">{{$time}}</h5>
            </div>
        </div>
        <div class="row">
            <div class="col mt-2">
                <small>Nama</small>
                <h2 class="bold">{{$tiket->nama}}</h2>
                <small>{{$tiket->email}}</small>
            </div>
            <div class="col mt-2">
                <small>Maskapai</small>
                <h2 class="bold">{{$tiket->nama_pesawat}}</h2>
                <div class="destination mt-2">
                    <span class="btn-sm button">{{$tiket->from}}</span>
                    <i class="fas fa-long-arrow-alt-right mx-3"></i>
                    <span class="btn-sm button">{{$tiket->to}}</span>
                    <span class="badge bg-success ml-3">{{$tiket->kode_pst}}</span>
                </div>
            </div>
        </div>

        <div class="row ">
            <div class="col mt-2">
                <small>Kode Tiket</small>
                <h2 class="bold text-primary">{{$tiket->kode_tiket}}</h2>
            </div>
            <div class="col mt-2">
                <small>Jumlah Penumpang</small>
                <h4 class="bold">
                    {{$tiket->jml_penumpang}} Orang
                </h4>
            </div>
        </div>

    </div>


</div>
<div class="wrapper wrapper2 p-4">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Penumpang</th>
                <th>Kewarganegaraan</th>
                <th>Telepon</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{$tiket->nama}}</td>
                <td>{{$tiket->region_penumpang}}</td>
                <td>{{$tiket->telepon}}</td>
            </tr>
        </tbody>
    </table>
</div>
<div class="wrapper">
    <div class="row">
        <div class="col">
            @if ($tiket->status == "Menunggu Pembayaran")
            <div class="alert alert-warning text-center">{{$tiket->status}}</div>
            @endif
            @if ($tiket->status == "Telah Dibayar")
            <div class="alert alert-success text-center">{{$tiket->status}}</div>
            @endif
            @if ($tiket->status == "Expired")
            <div class="alert alert-danger text-center">{{$tiket->status}}</div>
            @endif
        </div>
    </div>
</div>


<body>




    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
    <script src="{{asset('admin/assets/js/all.js')}}"></script>
    <script>
        window.print();
    </script>
</body>

</html>