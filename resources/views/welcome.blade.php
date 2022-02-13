@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="images/banner/doctor_banner.jpg" class="img-fluid">
            </div>
            <div class="col-md-6">
                <h2>Witaj w wirtualnej przychodni.</h2>
                <p>Aby umówić wizytę, musisz być <b>zalogowany</b>.</p>
                <p>Następnie wybierz <b>datę</b>, <b>dostępnego lekarza</b>, <b>godzinę wizyty</b> i uzupełnij <b>dodatkowe informacje</b> do wizyty.</p>
            </div>
        </div>
        <hr>
        <!--date picker-->
        <find-doctor></find-doctor>
    </div>
@endsection
