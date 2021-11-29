@extends('layouts.app')

@section('content')
    <div class="container">
        @if(Session::has('message'))
            <div class="alert bg-success alert-success text-white">
                {{Session::get('message')}}
            </div>
        @endif
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">Twój profil</div>
                    <div class="card-body">
                        <p>Imię i nazwisko: {{auth()->user()->name}}</p>
                        <p>E-mail: {{auth()->user()->email}}</p>
                        <p>Adres: {{auth()->user()->address}}</p>
                        <p>Numer telefonu: {{auth()->user()->phone_number}}</p>
                        <p>Płeć: {{auth()->user()->gender}}</p>
                        <p>Opis: {{auth()->user()->description}}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Zaktualizuj informacje o sobie</div>
                    <div class="card-body">
                        <form action="{{route('profile.store')}}" method="post">@csrf
                            <div class="form-group">
                                <label>Imię i nazwisko</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{auth()->user()->name}}">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>E-mail</label>
                                <input type="text" name="email" class="form-control" value="{{auth()->user()->email}}">
                            </div>
                            <div class="form-group">
                                <label>Adres</label>
                                <input type="text" name="address" class="form-control" value="{{auth()->user()->address}}">
                            </div>
                            <div class="form-group">
                                <label>Numer telefonu</label>
                                <input type="text" name="phone_number" class="form-control" value="{{auth()->user()->phone_number}}">
                            </div>
                            <div class="form-group">
                                <label>Płeć</label>
                                <select name="gender" class="form-control @error('gender') is-invalid @enderror">
                                    <option value="">Wybierz płeć</option>
                                    <option value="male" @if(auth()->user()->gender=='male')selected @endif>Mężczyzna</option>
                                    <option value="female" @if(auth()->user()->gender=='female')selected @endif>Kobieta</option>
                                </select>
                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Opis</label>
                                <textarea name="description" class="form-control">
                                    {{auth()->user()->description}}
                                </textarea>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit">Zapisz</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">Zdjęcie</div>
                    <form action="{{route('profile.pic')}}" method="post" enctype="multipart/form-data">@csrf
                        <div class="card-body">
                            @if(!auth()->user()->image)

                            @else
                                <img src="/profile/{{auth()->user()->image}}" alt="awatar" width="120px">
                            @endif
                            <br>
                            <input type="file" name="file" class="form-control" required="">
                            <br>
                            @error('file')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <button type="submit" class="btn btn-primary">Zapisz</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

