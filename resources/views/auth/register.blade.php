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
            <a href=""><b>Inscription</b></a>
        </div>
        <!-- /.login-logo -->
        <div class="card">

            <div class="card-body login-card-body">

                <form method="post" action="{{ route('register') }}">
                    @csrf
                    <div class="input-group mb-3">
                        <input id="name" placeholder="Nom complet ex: Paul de la croix" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ "Cette zone de saisie n'est pas valide !" }}</strong>
                            <i>Verifiez bien vos entrées et recommencez.</i>
                        </span>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input id="email" placeholder="Email ex: gilber@gmail.com" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{session('email')}}" required autocomplete="email" autofocus>

                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ "L'email ne correspond pas avec le mot de passe !" }}</strong>
                            <i>Verifiez bien vos identifiants et recommencez.</i>
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
                            <strong>{{ "Cette zone de saisie n'est pas valide !"}}</strong>
                            <i>Verifiez bien votre saisie et recommencez.</i><br>
                            <i><strong>NB:</strong>
                                <li>le mot de passe doit avoir au minimum: 8 caractères</li>
                                <li>Les deux mots de passe doivent etre identiques</li>
                            </i>
                        </span>
                        @enderror
                    </div>

                    <div class="input-group mb-3">
                        <input id="password-confirm" placeholder="Confirmez le mot de passe" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>

                    </div>
                    <div class="row">

                        <!-- /.col -->
                        <div class="col-12">
                            <button type="submit" class="btn btn-info btn-block">S'enregistrer</button>
                        </div>
                        <!-- /.col -->
                    </div>

                </form>


                <!-- /.social-auth-links -->

                <p class="mb-0">
                    <a href="{{ route('login') }}" class="text-center">J'ai déja un compte</a>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->


</body>

</html>