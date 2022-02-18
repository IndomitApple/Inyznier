@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-body text-center ">
                        <h4>Informacje</h4>
                        <img src="https://twojlekarzprofile.s3.eu-central-1.amazonaws.com/images/{{$user->image}}" width="100px" class="img-fluid" alt="Awatar">
                        <br>
                        <br>
                        <p class="lead">Imię i nazwisko: {{ucfirst($user->name)}}</p>
                        <p class="lead">Tytuł: {{$user->education}}</p>
                        <p class="lead">Specjalizacja: {{$user->department}}</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-9">
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
                            {{date('d-m-Y', strtotime($date))}}
                            <br>
                            Wybierz godzinę wizyty:
                        </div>
                        <div class="card-body">
                            <div class="row">
                                @foreach($times as $time)
                                    <div class="col-md-3 col-sm-4 col-6 text-center ">
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
                    <div class="card">
                        <div class="card-header lead">
                            Informacje dla lekarza:
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <textarea class="form-control @error('info_from_patient') is-invalid @enderror" rows="4" name="info_from_patient"
                                          placeholder="Napisz dodatkowe informacje odnośnie wizyty, takie jak:&#10;-cel wizyty,&#10;-objawy choroby,&#10;-dolegliwości itp.">
                                </textarea>
                                @error('info_from_patient')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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
