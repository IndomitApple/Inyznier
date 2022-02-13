@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>Witaj, {{Auth()->user()->name}}</h3>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>Po rejestracji uzupełnij swój profil klikając w <b>{{Auth()->user()->name}}</b> a następnie <b>Profil</b>.</p>
                    <h5>Nawigacja po aplikacji:</h5>
                        <dl class="row">
                            <dt class="col-sm-3">Umów wizytę</dt>
                            <dd class="col-sm-9">Strona do wyszukiwania dostępnych terminów lekarzy i umawiania wizyt.</dd>
                            <dt class="col-sm-3">Moje wizyty</dt>
                            <dd class="col-sm-9">Lista twoich zaplanowanych wizyt.</dd>
                            <dt class="col-sm-3">Moje recepty</dt>
                            <dd class="col-sm-9">Zalecenia i recepty wypisane przez lekarzy.</dd>
                        </dl>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
