<link rel="stylesheet" href="dist/css/bootstrap.min.css">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Nous avons envoyé un lien de réinitialisation du mot de passe dans votre boite email') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        {{ __('Nous avons envoyé un lien de réinitialisation du mot de passe dans votre boite email.') }}
                    </div>
                    @endif

                    {{ __('Veuiller ouvrir votre boite email et cliquez sur le lien.') }}

                    <form class="d-inline" method="POST" action="{{ route('passwordResetLink') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __("Cliquez ici si vous n'avez pas recu le lien") }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .container {
        margin-top: 12%;
    }
</style>