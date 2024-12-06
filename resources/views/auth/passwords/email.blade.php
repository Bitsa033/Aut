<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Forgot Password (v2)</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
    <div class="login-box" style="margin-bottom: 190px;">
        <p class="">envoyez simplement votre email et nous vous enverons un lien
            de réinitialisation de votre mot de passe.</p>
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="" class="h6"><b>Mot de passe oublié</a>
            </div>
            <div class="card-body">

                @if (session('message'))
                <div class="alert alert-success" role="alert">
                    {{ session('message') }}
                </div>
                @endif
                @if (session('userNotExist'))
                <div class="alert alert-success" role="alert">
                    {{ session('userNotExist') }}
                </div>
                @endif

                <form method="POST" action="{{ route('passwordResetLink') }}">
                    @csrf
                    <div class="input-group mb-3">
                        <input id="email" placeholder="Email ex: paulgilbert@gmail.com" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @if (session('message'))

                        <div class="col-12">
                            <p>Cliquez sur le bouton ci-desous si vous n'avez pas recu
                                le lien de réinitialisation</p>
                            <button type="submit" class="btn btn-primary btn-block">Renvoyer le lien</button>
                        </div>

                        @endif
                        @if (!session('message'))
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Envoyer</button>
                        </div>
                        @endif
                        <!-- /.col -->
                    </div>
                </form>
                <p class="mt-3 mb-1">
                    <a href="{{route('login')}}">Se connecter</a>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
</body>

</html>