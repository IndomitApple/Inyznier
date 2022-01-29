@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Your appointments')}}: {{$appointments->count()}}</div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">Nr</th>
                                <th scope="col">Doktor</th>
                                <th scope="col">Data</th>
                                <th scope="col">Godzina</th>
                                <th scope="col">Link do spotkania</th>
                                <th scope="col">Status</th>
                            </tr>
                            </thead>
                            <tbody>
                                @forelse($appointments as $key=>$appointment)
                                    <tr>
                                        <th scope="row">{{$key+1}}</th>
                                        <td>{{$appointment->doctor->name}}</td>
                                        <td>{{$appointment->date}}</td>
                                        <td>{{$appointment->time}}</td>
                                        <td><a class="btn btn-primary" href="/video-chat/{{$appointment->date}}/{{$appointment->doctor_id}}/{{$appointment->user_id}}" role="button" target="_blank">Dołącz</a></td>
                                        <td>
                                            @if(@$appointment->status==0)
                                                <button class="btn btn-primary" disabled>Nie odbyta</button>
                                            @else
                                                <button class="btn btn-success" disabled>Odbyta</button>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <td>Obecnie nie masz zaplanowanych żadnych wizyt.</td>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

