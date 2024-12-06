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
        <div class="login-logo card card-outline card-primary">
            <a href=""><b>Connexion</b></a>
        </div>
        <!-- /.login-logo -->
        <div class="card">

            <div class="card-body login-card-body">

                <form method="post" action="{{ route('login') }}">
                    @csrf
                    <div class="input-group mb-3">
                        @error('resetPaswordTry')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $resetPaswordTry }}</strong>
                        </span>
                        @enderror
                        <input id="email" placeholder="Email ex: gilbert-lerois@gmail.com" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ "Cette zone de saisie n'est pas valide !" }}</strong>
                            <i>Verifiez bien votre saisie et recommencez.</i><br>
                            <i><strong>NB:</strong>
                                <li>le mot de passe doit avoir au minimum 8 caractères</li>
                                <li>Le mot de passe doit correspondre à l'email enregistré</li>
                            </i>
                        </span>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input id="password" placeholder="Mot de passe" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-7">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    Se souvenir de Moi
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-5">
                            <button type="submit" class="btn btn-info btn-block">Se Connecter</button>
                        </div>
                        <!-- /.col -->
                    </div>
                    <div class="row">

                        <div class="social-auth-links text-center mt-2 mb-3">
                            <a href="#" class="btn btn-block btn-primary">
                                <i class="fab fa-facebook mr-2"></i> Se Connecter avec Facebook
                            </a>
                            <a href="#" class="btn btn-block btn-danger">
                                <i class="fab fa-google mr-2"></i> Se Connecter avec google
                            </a>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>


                <!-- /.social-auth-links -->

                <p class="mb-1">
                    <a href="{{ route('password.request') }}">J'ai oublié mon mot de passe</a>
                </p>
                <p class="mb-0">
                    <a href="{{ route('register') }}" class="text-center">Je n'ai pas de compte</a>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->


</body>

</html>