@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Moje recepty</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-responsive">
                            <thead>
                            <tr class="text-nowrap">
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
                                    <td class="text-nowrap">{{$prescription->date}}</td>
                                    <td>{{$prescription->doctor->name}}</td>
                                    <td>{{$prescription->prescription_code}}</td>
                                    <td>{{$prescription->medicine}}</td>
                                    <td>{{$prescription->procedure_to_use_medicine}}</td>
                                    <td>{{$prescription->name_of_disease}}</td>
                                    <td>{{$prescription->symptoms}}</td>
                                    <td>{{$prescription->feedback}}</td>
                                </tr>
                            @empty
                             <td>Brak recept.</td>
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
