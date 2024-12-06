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
            <a href=""><b>Code de verification</b></a>
        </div>
        <!-- /.login-logo -->
        <div class="card">

            <div class="card-body login-card-body">

                <form method="post" action="{{ route('verificationCodeAction') }}">
                    @csrf
                    <div class="input-group mb-3">
                        @if (!session('message'))
                        <i>Nous avons envoyé un code de verification dans votre boite email.</i>
                        @endif<br>
                        @if (session('message'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('message') }}
                        </div>
                        @endif
                        <input id="text" placeholder="Entrez le code de verification" type="text" class="form-control" name="code" required autofocus>

                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>

                        </div>

                    </div>

                    <div class="row">

                        <!-- /.col -->
                        <div class="col-12">
                            <button type="submit" class="btn btn-info btn-block">Envoyer</button>
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