@extends('admin.layouts.master')

@section('content')
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="ik ik-inbox bg-blue"></i>
                    <div class="d-inline">
                        <h5>Specjalizacje</h5>
                        <span>Lista wszystkich specjalizacji</span>
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
                    <h3>Specjalizacje</h3>
                </div>
                <div class="card-body">
                    <table id="data_table" class="table">
                        <thead>
                        <tr>
                            <th>Nazwa specjalizacji</th>
                            <th class="nosort">&nbsp</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($departments)>0)
                            @foreach($departments as $department)
                                <tr>
                                    <td>{{$department->department}}</td>
                                    <td>
                                        <div class="table-actions">
                                            <a href="{{route('department.edit',[$department->id])}}"><i class="ik ik-edit-2"></i></a>
                                            <form action="{{route('department.destroy',[$department->id])}}" method="post">@csrf
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
                            <td>W bazie nie znajdują się żadne specjalizacje.</td>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
