@extends('admin.layouts.master')

@section('content')

    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="ik ik-edit bg-blue"></i>
                    <div class="d-inline">
                        <h5>Add Doctor</h5>
                        <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span>
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
                        <li class="breadcrumb-item active" aria-current="page">Add</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header"><h3>Doctor add form </h3></div>
                <div class="card-body">
                    <form class="forms-sample" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputName1">Full name</label>
                                    <input type="text" class="form-control" id="exampleInputName1" placeholder="Name" name="name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Email address</label>
                                    <input type="email" class="form-control" id="exampleInputEmail3" placeholder="Email">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Password</label>
                                    <input type="password" name="password" class="form-control" id="" placeholder="password">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleSelectGender">Gender</label>
                                    <select name="gender" class="form-control" id="exampleSelectGender">
                                        <option value="">Please select gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword4">Highest education</label>
                                    <input type="text" class="form-control" id="exampleInputPassword4" name="education" placeholder="education">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword4">Address</label>
                                    <input type="text" class="form-control" id="exampleInputPassword4" name="address" placeholder="address">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Specialist</label>
                                    <input type="text" name="department" class="form-control">

                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Phone number</label>
                                    <input type="text" name="phone_number" class="form-control">

                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="form-group">
                                <label>File upload</label>

                                <div class="col-md-6">
                                    <input type="file" name="image" class="form-control file-upload-info"  placeholder="Upload Image">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-primary" type="button">Choose Image</button>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <select name="role_id" class="form-control">
                                        <option value="">select role</option>

                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleTextarea1">About</label>
                                <textarea class="form-control" id="exampleTextarea1" rows="4" name="description"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <button class="btn btn-light">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
