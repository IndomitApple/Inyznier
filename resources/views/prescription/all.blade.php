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
                                <th scope="col">Zdjęcie</th>
                                <th scope="col">Pacjent</th>
                                <th scope="col">Adres e-mail</th>
                                <th scope="col">Telefon</th>
                                <th scope="col">Płeć</th>
                                <th scope="col">Status</th>
                                <th scope="col">Recepta</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($patients as $key=>$patient)
                                <tr>
                                    <th scope="row">{{$key+1}}</th>
                                    <td>{{$patient->date}}</td>
                                    <td><img src="/profile/{{$patient->user->image}}" width="80"></td>
                                    <td>{{$patient->user->name}}</td>
                                    <td>{{$patient->user->email}}</td>
                                    <td>{{$patient->user->phone_number}}</td>
                                    <td>{{__($patient->user->gender)}}</td>

                                    <td>
                                        <a>

                                            <i class="bi bi-check"></i>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="green" class="bi bi-check" viewBox="0 0 16 16">
                                                <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                                            </svg>
                                        </a>
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
