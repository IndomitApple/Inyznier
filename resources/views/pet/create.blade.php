@extends('layouts.app')

@section('content')
    <div class="container">
        @if(Session::has('message'))
            <div class="alert bg-success alert-success text-white">
                {{Session::get('message')}}
            </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h3>Utwórz profil zwierzęcia</h3>
                    </div>
                    <div class="card-body">
                        <form class="forms-sample" action="{{route('pet.store')}}" enctype="multipart/form-data" method="post">@csrf
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
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="exampleInputName1"  value="{{old('name')}}">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Data urodzenia</label>
                                <input type="date" name="date_of_birth" class="form-control" value="{{old('date_of_birth')}}">
                                @error('date_of_birth')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Waga</label>
                                <input type="number" step="0.01" name="weight" class="form-control" value="{{old('weight')}}" placeholder="Wprowadź wagę do dwóch miejsc po przecinku">
                                @error('weight')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Płeć</label>
                                <select name="is_male" class="form-control @error('is_male') is-invalid @enderror" id="exampleSelectGender">
                                    <option value="">Wybierz płeć</option>
                                    <option value="1">Samiec</option>
                                    <option value="0">Samica</option>
                                </select>
                                @error('is_male')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Rasa</label>
                                <select name="breed_id" class="form-control @error('breed_id') is-invalid @enderror">
                                    <option value="">Wybierz rasę</option>
                                    @foreach(App\Breed::all() as $breed)
                                        <option value="{{$breed->id}}">
                                            {{__($breed->breed)}}
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
