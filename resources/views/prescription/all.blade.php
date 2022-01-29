@extends('admin.layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Zaplanowane wizyty: {{$patients->count()}}
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
                            @forelse($patients as $key=>$patient)
                                <tr>
                                    <th scope="row">{{$key+1}}</th>
                                    <td><img src="/profile/{{$patient->user->image}}" width="80" style="border-radius: 50%"></td>
                                    <td>{{$patient->user->name}}</td>
                                    <td>{{$patient->user->email}}</td>
                                    <td>{{$patient->user->phone_number}}</td>
                                    <td>{{__($patient->user->gender)}}</td>
                                    <td>{{$patient->date}}</td>
                                    <td>{{$patient->time}}</td>
                                    <td>
                                        <a class="btn btn-primary" href="/video-chat/{{$patient->date}}/{{$patient->doctor_id}}/{{$patient->user_id}}" role="button" target="_blank">Dołącz</a>
                                    </td>
                                    <td>
                                        @if(@$patient->status==0)
                                            <a href="{{route('update.status',[$patient->id])}}">
                                                <button class="btn btn-primary">Oczekuje</button>
                                            </a>
                                        @else
                                            <a href="{{route('update.status',[$patient->id])}}">
                                                <button class="btn btn-success">Odbyta</button>
                                            </a>

                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('prescription.show',[$patient->user_id,$patient->date])}}" class="btn btn-success">Zobacz receptę</a>
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
