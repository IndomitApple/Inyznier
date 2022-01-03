@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Moje recepty</div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Data</th>
                                <th scope="col">Lekarz</th>
                                <th scope="col">Kod recepty</th>
                                <th scope="col">Lekarstwa</th>
                                <th scope="col">Stosowanie lekarstw</th>
                                <th scope="col">Rozpoznanie choroby</th>
                                <th scope="col">Objawy</th>
                                <th scope="col">Dodatkowe zalecenia</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($prescriptions as $prescription)
                                <tr>
                                    <td>{{$prescription->date}}</td>
                                    <td>{{$prescription->doctor->name}}</td>
                                    <td>{{$prescription->prescription_code}}</td>
                                    <td>{{$prescription->medicine}}</td>
                                    <td>{{$prescription->procedure_to_use_medicine}}</td>
                                    <td>{{$prescription->name_of_disease}}</td>
                                    <td>{{$prescription->symptoms}}</td>
                                    <td>{{$prescription->feedback}}</td>
                                </tr>
                            @empty
                             <td>Aktualnie nie posiadasz żadnych recept.</td>
                             <td></td>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
