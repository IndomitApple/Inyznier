@extends('admin.layouts.master')

@section('content')

    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="ik ik-edit bg-blue"></i>
                    <div class="d-inline">
                        <h5>Lekarz</h5>
                        <span>Zaktualizuj informacje</span>
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
                    <h3>Formularz aktualizacji danych</h3>
                </div>
                <div class="card-body">
                    <form class="forms-sample" action="{{route('doctor.update',[$user->id])}}" enctype="multipart/form-data" method="post">@csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputName1">Imię i nazwisko:</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleInputName1" placeholder="Name" name="name" value="{{$user->name}}">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Adres e-mail:</label>
                                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail3" placeholder="Email" value="{{$user->email}}">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Hasło:</label>
                                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="" placeholder="password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleSelectGender">Płeć:</label>
                                    <select name="gender" class="form-control @error('gender') is-invalid @enderror" id="exampleSelectGender">
                                        @foreach(['male','female'] as $gender )
                                            <option value="{{$gender}}" @if($user->gender==$gender)selected @endif>
                                                {{__($gender)}}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword4">Tytuł:</label>
                                    <input type="text" class="form-control @error('education') is-invalid @enderror" id="exampleInputPassword4" name="education" placeholder="education" value="{{$user->education}}">
                                    @error('education')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword4">Adres:</label>
                                    <input type="text" class="form-control @error('address') is-invalid @enderror" id="exampleInputPassword4" name="address" placeholder="address" value="{{$user->address}}">
                                    @error('address')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label>Rola:</label>
                                <select name="role_id" class="form-control @error('role_id') is-invalid @enderror">
                                    <option value="">Wybierz rolę</option>
                                    @foreach(App\Role::where('name','!=','patient')->get() as $role)
                                        <option value="{{$role->id}}" @if($user->role_id==$role->id)selected @endif>
                                            {{__($role->name)}}
                                        </option>
                                    @endforeach
                                </select>
                                @error('role_id')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Numer telefonu:</label>
                                    <input type="text" name="phone_number" class="form-control @error('phone_number') is-invalid @enderror" value="{{$user->phone_number}}">
                                    @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Zdjęcie:</label>
                                    <input type="file" name="image" class="form-control file-upload-info @error('image') is-invalid @enderror"  placeholder="Upload Image">
                                    @error('image')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                        </div>
                        <div class="form-group">
                            <label for="exampleTextarea1">O mnie:</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="exampleTextarea1" rows="4" name="description">{{$user->description}}</textarea>
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Zapisz</button>
                        <a href="/doctor" id="cancel" class="btn btn-light">Anuluj</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
