@extends('admin.layouts.master')

@section('content')

    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="ik ik-edit bg-blue"></i>
                    <div class="d-inline">
                        <h5>Usuń profil lekarza</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
                    <img src="{{asset('images')}}/{{$user->image}}" alt="avatar" width="120">
                    <h2>{{$user->name}}</h2>
                    <form class="forms-sample" action="{{route('doctor.destroy',[$user->id])}}" method="post">@csrf
                        @method('DELETE')
                        <div class="card-footer">
                            <button type="submit" class="btn btn-danger mr-2">
                                Zatwierdź
                            </button>
                            <a href="{{route('doctor.index')}}" class="btn btn-secondary">
                                    Anuluj
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
