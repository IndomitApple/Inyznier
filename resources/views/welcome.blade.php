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
            <!--Search doctors-->
        <form action="{{url('/')}}" method="GET">
            <div class="card">
                <div class="card-header">Wybierz datę i sprawdź dostępność lekarzy</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="datepicker" name="date">
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-primary" type="submit">Sprawdź</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

            <!--Display doctors-->
            <div class="card mt-1">
                <div class="card-header">Dostępni lekarze:</div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Zdjęcie</th>
                                <th scope="col">Imię i nazwisko</th>
                                <th scope="col">Specjalizacja</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($doctors as $doctor)
                                <tr>
                                    <th scope="row">1</th>
                                    <td>
                                        <img src="{{asset('images')}}/{{$doctor->doctor->image}}" width="100px" style="border-radius: 50%;">
                                    </td>
                                    <td>{{$doctor->doctor->name}}</td>
                                    <td>{{$doctor->doctor->department}}</td>
                                    <td>
                                        <a href="{{route('create.appointment',[$doctor->user_id,$doctor->date])}}">
                                            <button class="btn btn-success">Umów wizytę</button>
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <td>Przykro nam, w tym dniu nie ma wolnych terminów.</td>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
    </div>
@endsection
