@extends('admin.layouts.master')

@section('content')
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="ik ik-inbox bg-blue"></i>
                    <div class="d-inline">
                        <h5>Rasy</h5>
                        <span>Lista wszystkich ras</span>
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
                    <h3>Rasy</h3>
                </div>
                <div class="card-body">
                    <table id="data_table" class="table">
                        <thead>
                        <tr>
                            <th>Nazwa rasy</th>
                            <th class="nosort">&nbsp</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($breeds)>0)
                            @foreach($breeds as $breed)
                                <tr>
                                    <td>{{$breed->breed}}</td>
                                    <td>
                                        <div class="table-actions">
                                            <a href="{{route('breed.edit',[$breed->id])}}"><i class="ik ik-edit-2"></i></a>
                                            <form action="{{route('breed.destroy',[$breed->id])}}" method="post">@csrf
                                                @method('DELETE')
                                                <button type="submit">
                                                    <i class="ik ik-trash-2"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>

                                </tr>
                            @endforeach
                        @else
                            <td>W bazie nie znajdują się żadne rasy.</td>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
