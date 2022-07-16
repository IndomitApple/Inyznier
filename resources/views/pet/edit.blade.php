@extends('layouts.app')

@section('content')
    <div class="container">
        @if(Session::has('message'))
            <div class="alert bg-success alert-success text-white">
                {{Session::get('message')}}
            </div>
        @endif
        <div class="row">
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-header">
                        <h3>Profil zwierzęcia</h3>
                    </div>
                    <div class="card-body">
                        <p>Imię : <b>{{$pet->name}}</b></p>
                        <p>Data urodzenia: <b>{{$pet->date_of_birth}}</b></p>
                        <p>Płeć: <b>{{__($pet->is_male)}}</b></p>
                        <p>Rasa: <b>{{$pet->breed->breed}}</b></p>
                        <p>Waga (kg): <b>{{$pet->weight}}</b></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h3>Zaktualizuj dane zwierzęcia</h3>
                    </div>
                    <div class="card-body">
                        <form class="forms-sample" action="{{route('pet.update',[$pet->id])}}" enctype="multipart/form-data" method="post">@csrf
                            @method('PUT')
                            <div class="form-group">
                                <label>Zdjęcie:</label>
                                <input type="file" name="image" class="form-control file-upload-info @error('image') is-invalid @enderror"  placeholder="Upload Image">
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Imię</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{$pet->name}}">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Data urodzenia</label>
                                <input type="date" name="date_of_birth" class="form-control" value="{{$pet->date_of_birth}}">
                                @error('date_of_birth')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Waga</label>
                                <input type="number" step="0.01" name="weight" class="form-control" value="{{$pet->weight}}">
                                @error('weight')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Płeć</label>
                                <select name="is_male" class="form-control @error('is_male') is-invalid @enderror">
                                    <option value="">Wybierz płeć</option>
                                    <option value="1" @if($pet->is_male==1)selected @endif>Samiec</option>
                                    <option value="0" @if($pet->is_male==0)selected @endif>Samica</option>
                                </select>
                                @error('is_male')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Rasa</label>
                                <select name="breed" class="form-control">
                                    @foreach(App\Models\Breed::all() as $breed)
                                        <option value="{{$pet->breed_id}}"
                                                @if($pet->breed_id==$breed->breed)selected
                                            @endif>
                                            {{$breed->breed}}
                                        </option>
                                    @endforeach
                                </select>
                                @error('breed_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit">Zapisz</button>
                                <a href="/pet" id="cancel" class="btn btn-light">Anuluj</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

