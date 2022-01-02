@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="images/banner/doctor_banner.jpg" class="img-fluid">
            </div>
            <div class="col-md-6">
                <h2>Zarejestruj się i umów swoją pierwszą wizytę online</h2>
                <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
                <div class="mt-5">
                    <a href="{{url('/register')}}">
                        <button class="btn btn-success">Zarejestruj się</button>
                    </a>
                    <a href="{{url('/login')}}">
                        <button class="btn btn-primary">Zaloguj się</button>
                    </a>
                </div>
            </div>
        </div>
        <hr>
        <!--date picker-->
        <find-doctor></find-doctor>
    </div>
@endsection
