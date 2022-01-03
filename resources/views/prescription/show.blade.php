@extends('admin.layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">

                    </div>

                    <div class="card-body">
                        <p>Data: {{$prescription->date}}</p>
                        <p>Pacjent: {{$prescription->user->name}}</p>
                        <p>Lekarz: {{$prescription->doctor->name}}</p>
                        <p>Rozpoznanie choroby: {{$prescription->name_of_disease}}</p>
                        <p>Objawy: {{$prescription->symptoms}}</p>
                        <p>E-recepta: {{$prescription->prescription_code}}</p>
                        <p>Lekarstwa: {{$prescription->medicine}}</p>
                        <p>Stosowanie lekarstw: {{$prescription->procedure_to_use_medicine}}</p>
                        <p>Dodatkowe zalecenia: {{$prescription->feedback}}</p>
                        <p>Podpis: {{$prescription->signature}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

