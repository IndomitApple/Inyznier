@extends('admin.layouts.master')

@section('content')

    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="ik ik-edit bg-blue"></i>
                    <div class="d-inline">
                        <h5>Lekarz</h5>
                        <span>Ustal terminy przyjęć</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <nav class="breadcrumb-container" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="../index.html"><i class="ik ik-home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="#">Doctor</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Appointment</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="card">
            <div class="card-header">
                Wybierz datę
            </div>
            <div class="card-body">
                <input type="text" class="form-control datetimepicker-input" id="datepicker" data-toggle="datetimepicker" data-target="#datepicker">
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            Wybierz godziny przyjęć<hr>
            <span>Zaznacz wszystkie godziny&nbsp</span>
            <span>
                <input type="checkbox" onclick="for(c in document.getElementsByName('time[]'))
                    document.getElementsByName('time[]').item(c).checked=this.checked">
            </span>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td><input type="checkbox" name="time[]" value="15.00">15:00</td>
                        <td><input type="checkbox" name="time[]" value="15.20">15:20</td>
                        <td><input type="checkbox" name="time[]" value="15.40">15:40</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td><input type="checkbox" name="time[]" value="16.00">16:00</td>
                        <td><input type="checkbox" name="time[]" value="16.20">16:20</td>
                        <td><input type="checkbox" name="time[]" value="16.40">16:40</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td><input type="checkbox" name="time[]" value="17.00">17.00</td>
                        <td><input type="checkbox" name="time[]" value="17.20">17.20</td>
                        <td><input type="checkbox" name="time[]" value="17.40">17.40</td>
                    </tr>
                    <tr>
                        <th scope="row">4</th>
                        <td><input type="checkbox" name="time[]" value="8.00">8.00</td>
                        <td><input type="checkbox" name="time[]" value="8.20">8.20</td>
                        <td><input type="checkbox" name="time[]" value="8.40">8.40</td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <button type="submit" class="btn btn-primary">Zapisz</button>
        </div>
    </div>


@endsection
