@extends('admin.layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Odbyte wizyty: {{$patients->count()}}
                    </div>

                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">Nr</th>
                                <th scope="col">Data</th>
                                <th scope="col">Właściciel</th>
                                <th scope="col">Zdjęcie</th>
                                <th scope="col">Zwierzę</th>
                                <th scope="col">Adres e-mail</th>
                                <th scope="col">Telefon</th>
                                <th scope="col">Płeć</th>
                                <th scope="col">Rasa</th>
                                <th scope="col">Waga</th>
                                <th scope="col">Data urodzenia</th>
                                <th scope="col">Recepta</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($patients as $key=>$patient)
                                <tr>
                                    <th scope="row">{{$key+1}}</th>
                                    <td>{{$patient->date}}</td>
                                    <td>{{$patient->user->name}}</td>
                                    <td><img src="https://twojlekarzprofile.s3.eu-central-1.amazonaws.com/images/{{$patient->pet->image}}" width="80"></td>
                                    <td>{{$patient->pet->name}}</td>
                                    <td>{{$patient->user->email}}</td>
                                    <td>{{$patient->user->phone_number}}</td>
                                    <td>@if(@$booking->pet->is_male==1)
                                            Samiec
                                        @else
                                            Samica
                                        @endif
                                    </td>
                                    <td>{{$patient->pet->breed->breed}}</td>
                                    <td>{{$patient->pet->weight}}</td>
                                    <td>{{$patient->pet->date_of_birth}}</td>
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
