@extends('admin.layouts.master')

@section('content')
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="ik ik-inbox bg-blue"></i>
                    <div class="d-inline">
                        <h5>Lekarze</h5>
                        <span>Lista lekarzy i administratorów</span>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12">
            @if(Session::has('message'))
                <div class="alert alert-success">
                    {{Session::get('message')}}
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h3></h3>
                </div>
                <div class="card-body">
                    <table id="data_table" class="table">
                        <thead>
                            <tr>
                                <th>Imię i nazwisko</th>
                                <th class="nosort">Zdjęcie</th>
                                <th>E-mail</th>
                                <th>Adres</th>
                                <th>Numer telefonu</th>
                                <th class="nosort">&nbsp</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($users)>0)
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{$user->name}}</td>
                                        <td><img src="{{asset('D:\xampp\htdocs\inzynier\storage\app/public/images')}}/{{$user->image}}" class="table-user-thumb" alt=""></td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->address}}</td>
                                        <td>{{$user->phone_number}}</td>
                                        <td>
                                            <div class="table-actions">
                                                <a  href="#" data-toggle="modal" data-target="#exampleModal{{$user->id}}"><i class="ik ik-eye" ></i></a>
                                                <a href="{{route('doctor.edit',[$user->id])}}"><i class="ik ik-edit-2"></i></a>
                                                <a href="{{route('doctor.show',[$user->id])}}"><i class="ik ik-trash-2"></i></a>
                                            </div>
                                        </td>

                                    </tr>

                                    <!--View Modal-->
                                    @include('admin.doctor.modal')
                                @endforeach
                            @else
                                <td>Brak użytkowników do wyświetlenia.</td>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
