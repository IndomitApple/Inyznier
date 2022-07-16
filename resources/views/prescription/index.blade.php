@extends('admin.layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-16">
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
                    <div class="card-body" id="app">
                        <table class="table table-striped table-responsive text-nowrap">
                            <thead>
                            <tr class="text-nowrap">
                                <th scope="col">Godzina</th>
                                <th scope="col">Data</th>
                                <th scope="col">Zdjęcie</th>
                                <th scope="col">Właściciel</th>
                                <th scope="col">Zwierzę</th>
                                <th scope="col">Płeć</th>
                                <th scope="col">Rasa</th>
                                <th scope="col">Waga</th>
                                <th scope="col">Informacje do wizyty</th>
                                <th scope="col">Data urodzenia</th>
                                <th scope="col">Telefon</th>
                                <th scope="col">Status</th>
                                <th scope="col">Recepta</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($bookings as $key=>$booking)
                                <tr>
                                    <td>{{$booking->time}}</td>
                                    <td>{{$booking->date}}</td>
                                    <td><img src="https://twojlekarzprofile.s3.eu-central-1.amazonaws.com/images/{{$booking->pet->image}}" width="80" ></td>
                                    <td>{{$booking->user->name}}</td>
                                    <td>{{$booking->pet->name}}</td>
                                    <td>@if(@$booking->pet->is_male==1)
                                            Samiec
                                        @else
                                            Samica
                                        @endif
                                    </td>
                                    <td>{{__($booking->pet->breed->breed)}}</td>
                                    <td>{{$booking->pet->weight}}</td>
                                    <td>{{$booking->info_from_patient}}</td>
                                    <td>{{$booking->pet->date_of_birth}}</td>
                                    <td>{{$booking->user->phone_number}}</td>
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
                                        @if(!App\Models\Prescription::where('date',$booking->date)->where('doctor_id',auth()->user()->id)->where('user_id',$booking->user->id)->exists())
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

