@extends('admin.layouts.master')

@section('content')

    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="ik ik-edit bg-blue"></i>
                    <div class="d-inline">
                        <h5>Terminy przyjęć</h5>
                        <span>Lista terminów</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        @if(Session::has('message'))
            <div class="alert bg-success alert-success text-white">
                {{Session::get('message')}}
            </div>
        @endif
        @if(Session::has('errormessage'))
            <div class="alert bg-danger alert-success text-white">
                {{Session::get('errormessage')}}
            </div>
        @endif
        @foreach($errors->all() as $error)
            <div class="alert alert-danger">
                {{$error}}
            </div>
        @endforeach

        <form action="{{route('appointment.check')}}" method="post">@csrf
            <!--Calendar to choose a day of visits-->
            <div class="card">
                <div class="card-header">
                    Wybierz datę
                    <br>
                    @if(isset($date))
                        Twoje wizyty w dniu: {{$date}}
                    @endif
                </div>
                <div class="card-body">
                    <input type="text" class="form-control datetimepicker-input" id="datepicker" data-toggle="datetimepicker" data-target="#datepicker" name="date">
                    <br>
                    <button type="submit" class="btn btn-primary">Sprawdź</button>
                </div>
            </div>
        </form>

        @if(Route::is('appointment.check'))
            <form action="{{route('update')}}" method="post">@csrf
                <!--Choose hours for visits-->
                <div class="card">
                    <div class="card-header">
                        Godziny przyjęć
                        <span style="margin-left: 650px">Zaznacz wszystkie godziny&nbsp</span>
                        <span>
                            <input type="checkbox" onclick="for(c in document.getElementsByName('time[]'))
                                document.getElementsByName('time[]').item(c).checked=this.checked">
                        </span>
                    </div>

                    <div class="card-body">
                        <table class="table table-striped">
                            <tbody>
                            <input type="hidden" name="appointmentId" value="{{$appointmentId}}">
                            <tr>
                                <th scope="row">1</th>
                                <td><input type="checkbox" name="time[]" value="15.00" @if(isset($times)){{$times->contains('time','15.00')?'checked':''}} @endif>15:00</td>
                                <td><input type="checkbox" name="time[]" value="15.20" @if(isset($times)){{$times->contains('time','15.20')?'checked':''}} @endif>15:20</td>
                                <td><input type="checkbox" name="time[]" value="15.40" @if(isset($times)){{$times->contains('time','15.40')?'checked':''}} @endif>15:40</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td><input type="checkbox" name="time[]" value="16.00" @if(isset($times)){{$times->contains('time','16.00')?'checked':''}} @endif>16:00</td>
                                <td><input type="checkbox" name="time[]" value="16.20" @if(isset($times)){{$times->contains('time','16.20')?'checked':''}} @endif>16:20</td>
                                <td><input type="checkbox" name="time[]" value="16.40" @if(isset($times)){{$times->contains('time','16.40')?'checked':''}} @endif>16:40</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td><input type="checkbox" name="time[]" value="17.00" @if(isset($times)){{$times->contains('time','17.00')?'checked':''}} @endif>17.00</td>
                                <td><input type="checkbox" name="time[]" value="17.20" @if(isset($times)){{$times->contains('time','17.20')?'checked':''}} @endif>17.20</td>
                                <td><input type="checkbox" name="time[]" value="17.40" @if(isset($times)){{$times->contains('time','17.40')?'checked':''}} @endif>17.40</td>
                            </tr>
                            <tr>
                                <th scope="row">4</th>
                                <td><input type="checkbox" name="time[]" value="18.00" @if(isset($times)){{$times->contains('time','18.00')?'checked':''}} @endif>18.00</td>
                                <td><input type="checkbox" name="time[]" value="18.20" @if(isset($times)){{$times->contains('time','18.20')?'checked':''}} @endif>18.20</td>
                                <td><input type="checkbox" name="time[]" value="18.40" @if(isset($times)){{$times->contains('time','18.40')?'checked':''}} @endif>18.40</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <button type="submit" class="btn btn-primary">Zaktualizuj</button>
                    </div>
                </div>
            </form>

            @else
            <h3>Twoje dostępne terminy: {{$myappointments->count()}}</h3>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Nr</th>
                            <th scope="col">Użytkownik</th>
                            <th scope="col">Data</th>
                            <th scope="col">Zobacz</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($myappointments as $key=>$appointment)
                            <tr>
                                <th scope="row">{{$key+1}}</th>
                                <td>{{$appointment->doctor->name}}</td>
                                <td>{{$appointment->date}}</td>
                                <td>
                                    <form action="{{route('appointment.check')}}" method="post">@csrf
                                        <input type="hidden" name="date" value="{{$appointment->date}}">
                                        <button type="submit" class="btn btn-primary">Zobacz</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

        @endif
    </div>

@endsection
