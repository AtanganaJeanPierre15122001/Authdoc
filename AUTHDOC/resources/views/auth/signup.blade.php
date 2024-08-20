
@extends('layouts.app')
@section('title','Signup')

@section('content')

    <body>
    <div class="loader"></div>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Register</h4>
                            </div>
                            <div class="card-body">
                                @if(Session::has('success'))
                                    <div class=" alert alert-success" role="alert">
                                        {{Session::get('success')}}
                                    </div>
                                @endif
                                <form method="POST" action="{{route('auth.signup')}}">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="first_name">First Name</label>
                                            <input id="first_name" type="text" class="form-control" value="{{old('first_name')}}" name="first_name" autofocus>
                                            <div style="color: red">
                                                @error('first_name')
                                                {{$message}}
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="last_name">Last Name</label>
                                            <input id="last_name" type="text" class="form-control" value="{{old('last_name')}}" name="last_name">
                                            <div style="color: red">
                                                @error('last_name')
                                                {{$message}}
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input id="email" type="email" value="{{old('email')}}" class="form-control" name="email2">
                                        <div style="color: red">
                                            @error('email')
                                            {{$message}}
                                            @enderror
                                        </div>
                                        <div class="invalid-feedback">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="password" class="d-block">Password</label>
                                            <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator"
                                                   name="password">
                                            <div style="color: red">
                                                @error('password')
                                                {{$message}}
                                                @enderror
                                            </div>
                                            <div id="pwindicator" class="pwindicator">
                                                <div class="bar"></div>
                                                <div class="label"></div>
                                            </div>
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="password_confirm" class="d-block">Password Confirmation</label>
                                            <input id="password_confirm" type="password" class="form-control" name="password_confirm">
                                            <div style="color: red">
                                                @error('password_confirm')
                                                {{$message}}
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="agree" class="custom-control-input" id="agree">
                                            <label class="custom-control-label" for="agree">I agree with the terms and conditions</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                                            Register
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="mb-4 text-muted text-center">
                                Already Registered? <a href="{{route('auth.login')}}">Login</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    </body>


    @endsection


