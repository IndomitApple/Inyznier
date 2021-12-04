@extends('admin.layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Zaplanowane wizyty: {{$bookings->count()}}</div>

                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">Nr</th>
                                <th scope="col">Zdjęcie</th>
                                <th scope="col">Pacjent</th>
                                <th scope="col">Adres e-mail</th>
                                <th scope="col">Telefon</th>
                                <th scope="col">Płeć</th>
                                <th scope="col">Data</th>
                                <th scope="col">Godzina</th>
                                <th scope="col">Link do spotkania</th>
                                <th scope="col">Status</th>
                                <th scope="col">Recepta</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($bookings as $key=>$booking)
                                <tr>
                                    <th scope="row">{{$key+1}}</th>
                                    <td><img src="/profile/{{$booking->user->image}}" width="80" style="border-radius: 50%"></td>
                                    <td>{{$booking->user->name}}</td>
                                    <td>{{$booking->user->email}}</td>
                                    <td>{{$booking->user->phone_number}}</td>
                                    <td>{{$booking->user->gender}}</td>
                                    <td>{{$booking->date}}</td>
                                    <td>{{$booking->time}}</td>
                                    <td>
                                        <button class="btn btn-primary">Dołącz teraz</button>
                                    </td>
                                    <td>
                                        @if(@$booking->status==0)
                                            <a href="{{route('update.status',[$booking->id])}}">
                                                <button class="btn btn-primary">Oczekuje</button>
                                            </a>
                                        @else
                                            <a href="{{route('update.status',[$booking->id])}}">
                                                <button class="btn btn-success">Odbyta</button>
                                            </a>

                                        @endif
                                    </td>
                                    <td>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                            Wypisz receptę
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <td>Brak wizyt w tym dniu.</td>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Recepta i zalecenia</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="user_id" value="{{$booking->user_id}}">
                    <input type="hidden" name="doctor_id" value="{{$booking->doctor_id}}">
                    <input type="hidden" name="date" value="{{$booking->date}}">
                    <div class="form-group">
                        <label>Rozpoznanie choroby</label>
                        <input type="text" name="name_of_disease" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Objawy</label>
                        <textarea name="symptoms" class="form-control" placeholder="Wypisz objawy pacjenta" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>E-recepta</label>
                        <input type="text" name="prescription-code" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Lekarstwa</label>
                        <textarea name="medicine" class="form-control" placeholder="Lekarstwa bez recepty" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Stosowanie lekarstw</label>
                        <textarea name="procedure_to_use_medicine" class="form-control" placeholder="Dawkowanie lekarstw" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Dodatkowe informacje</label>
                        <textarea name="feedback" class="form-control" placeholder="Dodatkowe informacje o pacjencie" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Podpis</label>
                        <input type="text" name="signature" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Anuluj</button>
                    <button type="button" class="btn btn-primary">Zapisz</button>
                </div>
            </div>
        </div>
    </div>
@endsection

