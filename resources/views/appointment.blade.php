@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body text-center">
                        <h4>Informacje</h4>
                        <img src="{{asset('images')}}/{{$user->image}}" width="100px" style="border-radius: 50%;" alt="Awatar">
                        <br>
                        <br>
                        <p class="lead">Imię i nazwisko: {{ucfirst($user->name)}}</p>
                        <p class="lead">Tytuł: {{$user->education}}</p>
                        <p class="lead">Specjalizacja: {{$user->department}}</p>
                    </div>
                </div>
            </div>

            <div class="col-md-9">
<!--                errors & messages-->
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger">{{$error}}</div>
                @endforeach
                @if(Session::has('message'))
                    <div class="alert alert-success">
                        {{Session::get('message')}}
                    </div>
                @endif
                @if(Session::has('errormessage'))
                    <div class="alert alert-danger">
                        {{Session::get('errormessage')}}
                    </div>
                @endif

                <form action="{{route('booking.appointment')}}" method="post">@csrf
                    <div class="card">
                        <div class="card-header lead">
                            {{$date}}
                            <br>
                            Wybierz godzinę wizyty:
                        </div>
                        <div class="card-body">
                            <div class="row">
                                @foreach($times as $time)
                                    <div class="col-md-3">
                                        <label class="btn btn-outline-primary">
                                            <input type="radio" name="time" value="{{$time->time}}">
                                            <span>{{$time->time}}</span>
                                        </label>
                                    </div>
                                    <input type="hidden" name="doctorId" value="{{$doctor_id}}">
                                    <input type="hidden" name="appointmentId" value="{{$time->appointment_id}}">
                                    <input type="hidden" name="date" value="{{$date}}">
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        @if(Auth::check())
                            <button type="submit" class="btn btn-success" style="width: 100%">Zarezerwuj wizytę</button>
                        @else
                            <p>Aby zarezerwować wizytę musisz być zalogowany.</p>
                            <a href="{{url('/register')}}">
                                <button class="btn btn-success">Zarejestruj się</button>
                            </a>
                            <a href="{{url('/login')}}">
                                <button class="btn btn-primary">Zaloguj się</button>
                            </a>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
