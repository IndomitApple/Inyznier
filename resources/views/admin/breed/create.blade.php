@extends('admin.layouts.master')

@section('content')

    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="ik ik-edit bg-blue"></i>
                    <div class="d-inline">
                        <h5>Rasy</h5>
                        <span>Dodaj rasę</span>
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
                <div class="card-header">
                    <h3>Dodaj nową rasę</h3>
                </div>
                <div class="card-body">
                    <form class="forms-sample" action="{{route('breed.store')}}" method="post">@csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control @error('breed') is-invalid @enderror" id="exampleInputName1" name="breed" placeholder="Nazwa rasy" value="{{old('breed')}}">
                                    @error('breed')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary mr-2">Dodaj rasę</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
