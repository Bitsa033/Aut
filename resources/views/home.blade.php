@extends('layouts.admin')

@section('content')
<div class="container"><br>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Acceuil') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <strong>{{Auth::user()->name}}</strong> {{ __(' , Bienvenue !') }}
                    <br><br>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection