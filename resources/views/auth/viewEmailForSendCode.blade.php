<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Système d'authentification</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <style>
        .login-box {
            position: relative;
            bottom: 10%;
            right: 5%;
        }
    </style>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo card card-outline card-primary p">
            <a href=""><b>Email</b></a>
        </div>
        <!-- /.login-logo -->
        <div class="card">

            <div class="card-body login-card-body">

                <form method="post" action="{{ route('sendCodeEmailConfirmation') }}">
                    @csrf
                    <div class="input-group mb-3">
                        <input id="email" placeholder="Email ex: paulleduc@gmail.com" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>

                    </div>

                    <div class="row">

                        <!-- /.col -->
                        <div class="col-12">
                            <button type="submit" class="btn btn-info btn-block">Continuer</button>
                        </div>
                        <!-- /.col -->
                    </div>

                </form>

                <!-- /.social-auth-links -->
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->


</body>

</html>