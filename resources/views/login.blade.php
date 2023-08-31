<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Login | MyApp</title>

    <!-- Custom fonts for this template-->
    <link href="template/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('template/css/login.css')}}">
</head>

<body class="bg-gradient-dark">
    <div class="box">
        <span class="borderline"></span>
        <form class="user" action="{{ url('login/proses') }}" method="POST">
            @csrf
            <h2>Sign in</h2>
            <div class="inputBox">
                <input type="text" class="form-control form-control-user" id="username" aria- describedby="emailHelp"  name="username" autofocus required value="{{ old('username') }}" />
                <span>Username</span>
                <i></i>
            </div>
            <div class="inputBox">
                <input type="password" class="form-control form-control-user" id="password" name="password" required />
                <span>Password</span>
                <i></i>
            </div>
            <div class="links">
                <a href="#">forgot password</a>
                <a href="#">Signup</a>
            </div>
            <input type="submit" name="login" value="login"
            class="btn btn-primary btn-user btn-block" />
        </form>
    </div>
</body>
<!-- Bootstrap core JavaScript-->
<script src="template/vendor/jquery/jquery.min.js"></script>
<script src="template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Core plugin JavaScript-->
<script src="template/vendor/jquery-
                                easing/jquery.easing.min.js"></script>
<!-- Custom scripts for all pages-->
<script src="template/js/sb-admin-2.min.js"></script>
<script src="template/js/sweetalert2@11.js"></script>
<script>
    @error('gagal')
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
        Toast.fire({
            icon: 'error',
            title: 'Username atau Password Salah'
        })
    @enderror
</script>
</html>