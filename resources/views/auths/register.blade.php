<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Berangkat.com | Register</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <link rel="stylesheet" href="{{asset('admin/assets/css/register.css')}}" type="text/css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

</head>

<body>
    <div class="container2">
        <div class="kiri">

        </div>
        <div class="kanan">
            <div class="atas">
                <div class="brand">
                    <a href="/">Berangkat.com</a>
                </div>
                <div class="toggle">
                    <input type="checkbox" name="checkbox" id="checkbox">
                    <label for="checkbox" class="darkmode">
                        <i class="fas fa-moon"></i>
                        <i class="fas fa-sun"></i>
                        <div class="ball"></div>
                    </label>
                </div>
            </div>
            <div class="bawah">
                <div class="login">
                    <h1>Register</h1>
                    @if ($errors->any())
                    @foreach ($errors->all() as $err)
                    <li><small class="text-danger">{{$err}}</small></li>
                    @endforeach
                    @endif
                </div>
                <form action="/postregister" method="POST" class="form-prevent">
                    @csrf
                    <div class="input">
                        <label for="name">Name</label><br>
                        <input type="text" name="name" id="name" placeholder="Enter Your Name" required><br>

                        <label for="email">Email</label><br>
                        <input type="email" name="email" id="email" placeholder="Enter Your Email" required><br>

                        <label for="telepon">Phone</label><br>
                        <input type="number" name="telepon" id="telepon" placeholder="Enter Your Phone Number" required
                            min="0"><br>

                        <label for="password">Password</label><br>
                        <input type="password" name="password" id="password" placeholder="Enter Your Password"
                            required><br>

                        <!-- <input type="submit" value="Sign In" id="submit"><br> -->
                        <button type="submit" name="submit" id="submit">Sign Up</button>

                        <p class="parag">Already Have An Account? <a href="/login">Login!</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>
    <script src="{{asset('admin/assets/js/darkmode.js')}}"></script>
    <script src="{{asset('admin/assets/js/all.js')}}"></script>
</body>

</html>