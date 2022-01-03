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

                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">Nr</th>
                                <th scope="col">Zdjęcie</th>
                                <th scope="col">Pacjent</th>
                                <th scope="col">Adres e-mail</th>
                                <th scope="col">Telefon</th>
                                <th scope="col">Płeć</th>
                                <th scope="col">Data</th>
                                <th scope="col">Godzina</th>
                                <th scope="col">Link do spotkania</th>
                                <th scope="col">Status</th>
                                <th scope="col">Recepta</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($bookings as $key=>$booking)
                                <tr>
                                    <th scope="row">{{$key+1}}</th>
                                    <td><img src="/profile/{{$booking->user->image}}" width="80" style="border-radius: 50%"></td>
                                    <td>{{$booking->user->name}}</td>
                                    <td>{{$booking->user->email}}</td>
                                    <td>{{$booking->user->phone_number}}</td>
                                    <td>{{$booking->user->gender}}</td>
                                    <td>{{$booking->date}}</td>
                                    <td>{{$booking->time}}</td>
                                    <td>
                                        <button class="btn btn-primary">Dołącz teraz</button>
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
                                        @if(!App\Models\Prescription::where('date',date('Y-m-d'))->where('doctor_id',auth()->user()->id)->where('user_id',$booking->user->id)->exists())
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$booking->user_id}}">
                                                Wypisz receptę
                                            </button>
                                            @include('prescription.form')
                                        @else
                                            <a href="{{route('prescription.show',[$booking->user_id,$booking->date])}}" class="btn btn-success">Zobacz receptę</a>
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

