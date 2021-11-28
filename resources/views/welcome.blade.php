@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="images/banner/doctor_banner.jpg" class="img-fluid">
            </div>
            <div class="col-md-6">
                <h2>Zarejestruj się i umów swoją pierwszą wizytę online</h2>
                <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
                <div class="mt-5">
                    <button class="btn btn-success">Zarejestruj się</button>
                    <button class="btn btn-secondary">Zaloguj się</button>
                </div>
            </div>
        </div>
        <hr>
            <!--Search doctors-->
            <div class="card">
                <div class="card-header">Wybierz datę</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <input type="date" class="form-control" name="date" id="datepicker">
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-primary" type="submit">Szukaj dostępnych lekarzy</button>
                        </div>
                    </div>
                </div>
            </div>

            <!--Display doctors-->
            <div class="card mt-1">
                <div class="card-header">Dostępni lekarze</div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Zdjęcie</th>
                                <th scope="col">Imię i nazwisko</th>
                                <th scope="col">Specjalizacja</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td><img src="" width="100" style="border-radius: 50%;">
                                </td>
                                <td>Jan Kowalski</td>
                                <td>kardiolog</td>
                                <td>
                                    <button class="btn btn-success">Umów wizytę</button>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td><img src="" width="100" style="border-radius: 50%;">
                                </td>
                                <td>Michał Szczepański</td>
                                <td>psycholog</td>
                                <td>
                                    <button class="btn btn-success">Umów wizytę</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
    </div>
@endsection
