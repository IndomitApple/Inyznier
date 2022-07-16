@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Usuwanie profilu zwierzęcia</h3>
                    </div>
                    <div class="card-body text-center">
                        <div class="row justify-content-center">
                            <div class="col-md-10">
                                @if(Session::has('message'))
                                    <div class="alert alert-success">
                                        {{Session::get('message')}}
                                    </div>
                                @endif

                                <div class="card">
                                    <div class="card-header"><h3>Na pewno chcesz usunąć profil? </h3></div>
                                    <div class="card-body">
                                        <img src="https://twojlekarzprofile.s3.eu-central-1.amazonaws.com/images/{{$pet->image}}" alt="avatar" width="120">
                                        <h2>{{$pet->name}}</h2>
                                        <form class="forms-sample" action="{{route('pet.destroy',[$pet->id])}}" method="post">@csrf
                                            @method('DELETE')
                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-danger mr-2">
                                                    Zatwierdź
                                                </button>
                                                <a href="{{route('pet.index')}}" class="btn btn-secondary">
                                                    Anuluj
                                                </a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
