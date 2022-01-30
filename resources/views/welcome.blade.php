@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="images/banner/doctor_banner.jpg" class="img-fluid">
            </div>
            <div class="col-md-6">
                <h2>Witaj w e-przychodni</h2>
                <p> Zaloguj się lub zarejestruj. Sprawdź kiedy twój lekarz jest dostępny. Wybierz odpowiadający Ci termin. Zaloguj się o odpowiedniej porze, porozmawiaj z lekarzem, otrzymaj receptę i zalecenia.</p>
            </div>
        </div>
        <hr>
        <!--date picker-->
        <find-doctor></find-doctor>
    </div>
@endsection
