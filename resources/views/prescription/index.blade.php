@extends('admin.layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    @if(Session::has('message'))
                        <div class="alert alert-success">
                            {{Session::get('message')}}
                        </div>
                    @endif
                    <div class="card-header">
                        Zaplanowane wizyty: {{$bookings->count()}}
                    </div>
                        <form action="{{route('patients.today')}}" method="GET">
                            <div class="card-header">
                                Wybierz datę: &nbsp
                                <div class="row">
                                    <div class="col-md-10">
                                        <input type="date" class="form-control datepicker-input" id="datepicker" data-toggle="datepicker" data-target="#datepicker" name="date">
                                    </div>
                                    <div class="col-md-2">
                                        <button type="submit" class="btn btn-primary">Szukaj</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">Godzina</th>
                                <th scope="col">Data</th>
                                <th scope="col">Zdjęcie</th>
                                <th scope="col">Pacjent</th>
                                <th scope="col">Adres e-mail</th>
                                <th scope="col">Telefon</th>
                                <th scope="col">Płeć</th>
                                <th scope="col">Informacje od pacjenta</th>
                                <th scope="col">Link do spotkania</th>
                                <th scope="col">Status</th>
                                <th scope="col">Recepta</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($bookings as $key=>$booking)
                                <tr>
                                    <td>{{$booking->time}}</td>
                                    <td>{{$booking->date}}</td>
                                    <td><img src="/profile/{{$booking->user->image}}" width="80" ></td>
                                    <td>{{$booking->user->name}}</td>
                                    <td>{{$booking->user->email}}</td>
                                    <td>{{$booking->user->phone_number}}</td>
                                    <td>{{__($booking->user->gender)}}</td>
                                    <td>{{$booking->info_from_patient}}</td>
                                    <td>
                                        <a class="btn btn-primary" href="/video-chat/{{$booking->date}}/{{$booking->doctor_id}}/{{$booking->user_id}}" role="button" target="_blank">Dołącz</a>
                                    </td>
                                    <td>
                                        @if(@$booking->status==0)
                                            <a href="{{route('update.status',[$booking->id])}}">
                                                <button class="btn btn-primary">Oczekuje</button>
                                            </a>
                                        @else
                                            <a href="{{route('update.status',[$booking->id])}}">
                                                <button class="btn btn-success">Odbyta</button>
                                            </a>
                                        @endif
                                    </td>
                                    <td>
                                        <!-- Button trigger modal -->
                                        <!-- If prescription exists -> 'show prescription' button, if not -> 'write prescription' button -->
                                        @if(!App\Models\Prescription::where('date',date('Y-m-d'))->where('doctor_id',auth()->user()->id)->where('user_id',$booking->user->id)->exists())
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$booking->user_id}}">
                                                Wypisz
                                            </button>
                                            @include('prescription.form')
                                        @else
                                            <a href="{{route('prescription.show',[$booking->user_id,$booking->date])}}" class="btn btn-success">Zobacz</a>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <td>Brak wizyt w tym dniu.</td>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

