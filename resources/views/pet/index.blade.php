@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Moje zwierzęta</h3>
                    </div>
                    <div class="card-body text-center">
                        <table class="table table-responsive-sm table-hover">
                            <thead>
                            <tr class="text-nowrap">
                                <th scope="col">Imię</th>
                                <th scope="col">Zdjęcie</th>
                                <th scope="col">Data urodzenia</th>
                                <th scope="col">Płeć</th>
                                <th scope="col">Rasa</th>
                                <th scope="col">Waga (kg)</th>
                                <th scope="col" class="nosort">&nbsp</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($pets as $pet)
                                <tr>
                                    <td class="text-nowrap">{{$pet->name}}</td>
                                    <td><img src="https://twojlekarzprofile.s3.eu-central-1.amazonaws.com/images/{{$pet->image}}" class="table-user-thumb" alt=""></td>
                                    <td>{{$pet->date_of_birth}}</td>
                                    <td>@if(@$pet->is_male==1)
                                            Samiec
                                        @else
                                            Samica
                                        @endif
                                    </td>
                                    <td>{{$pet->breed->breed}}</td>
                                    <td>{{$pet->weight}}</td>
                                    <td>
                                        <div class="table-actions">
                                            <a  href="#" data-toggle="modal" data-target="#exampleModal{{$pet->id}}"><i class="ik ik-eye" ></i></a>
                                            <a href="{{route('pet.edit',[$pet->id])}}"><i class="ik ik-edit-2"></i></a>
                                            <a href="{{route('pet.show',[$pet->id])}}"><i class="ik ik-trash-2"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <!--View Modal-->
                                @include('pet.modal')
                            @empty
                                <td>Nie masz zarejestrowanych zwierząt.</td>
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
