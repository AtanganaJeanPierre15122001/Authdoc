
@extends('layouts.app')
@section('title','adminpage')

@section('content')

    <body>
    <div class="loader"></div>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar sticky">
                <div class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
									collapse-btn"> <i data-feather="align-justify"></i></a></li>

                    </ul>
                </div>
                <ul class="navbar-nav navbar-right">

                    <li class="dropdown"><a href="#" data-toggle="dropdown"
                                            class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img alt="image" src="  "
                                                                                                             class="user-img-radious-style"> <span class="d-sm-none d-lg-inline-block"></span></a>
                        <div class="dropdown-menu dropdown-menu-right pullDown">
                            <div class="dropdown-title">Hello Sarah Smith</div>
                            <a href="profile.html" class="dropdown-item has-icon"> <i class="far
										fa-user"></i> Profile
                            </a> <a href="timeline.html" class="dropdown-item has-icon"> <i class="fas fa-bolt"></i>
                                Activities
                            </a> <a href="#" class="dropdown-item has-icon"> <i class="fas fa-cog"></i>
                                Settings
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="auth-login.html" class="dropdown-item has-icon text-danger"> <i class="fas fa-sign-out-alt"></i>
                                Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar sidebar-style-2">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="index.html"> <img alt="image" src="assets_admin/img/logo.png" class="header-logo" /> <span
                                class="logo-name">Authdoc</span>
                        </a>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="menu-header">Gestion admin</li>
                        <li class="dropdown active">
                            <a href="index.html" class="nav-link"><i data-feather="monitor"></i><span>liste admin</span></a>
                        </li>
{{--                        <li class="dropdown">--}}
{{--                            <a href="#" class="menu-toggle nav-link has-dropdown"><i--}}
{{--                                    data-feather="briefcase"></i><span>Widgets</span></a>--}}
{{--                            <ul class="dropdown-menu">--}}
{{--                                <li><a class="nav-link" href="widget-chart.html">Chart Widgets</a></li>--}}
{{--                                <li><a class="nav-link" href="widget-data.html">Data Widgets</a></li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}

                        <li class="menu-header">Gestion releve</li>
                        <li class="dropdown">

                        </li>
                        <li><a class="nav-link" href="{{route('admin.releve')}}"><i data-feather="file"></i><span>Generer le relevé</span></a></li>
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="command"></i><span>Scan releve`</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="{{route('admin.scan')}}">Avec Qr code</a></li>
                                <li><a class="nav-link" href="{{route('admin.scanocr')}}">Avec OCR</a></li>

                            </ul>
                        </li>


                    </ul>
                </aside>
            </div>
            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-body">
                        <div class="row">
                            <div class="col-12  ">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Liste des administrateurs</h4>
                                    </div>
                                        <div class="card-body">
                                        @if(Session::has('success'))
                                            <div class=" alert alert-success" role="alert">
                                                {{Session::get('success')}}
                                            </div>
                                        @endif

                                        <div class="table-responsive">
                                            <table class="table table-striped table-md">
                                                <tr>

                                                    <th>Nom</th>
                                                    <th>Prenom</th>
                                                    <th>Email</th>
                                                    <th>Update</th>
                                                    <th>Delete</th>
                                                </tr>
                                                @foreach($utilisateurs as $key => $utilisateur)
                                                    <tr>

                                                        <td>{{$utilisateur->nom}}</td>
                                                        <td>{{$utilisateur->prenom}}</td>
                                                        <td>{{$utilisateur->email}}</td>
                                                        <td><button type="button" class="btn btn-primary" data-toggle="modal" data-admin-id="{{$utilisateur->id}}" data-target="#exampleModal">Update</button></td>
                                                        <td><a href="#" class="btn btn-danger">Delete</a></td>
                                                    </tr>
                                                @endforeach
                                            </table>

                                    </div>

                                </div>
                            </div>


                        </div>




                    </div>

                    </div>


                    <div class="row">
                        <div class="card">
                            <div class="card-header">
                                <h4>Ajouter un administrateur</h4>
                            </div>
                            <div class="card-body">


                            <form method="POST" action="{{route('admin.main')}}">
                                @csrf
                                <div class="form-group">
                                    <label for="inputAddress2">Nom</label>
                                    <input type="text" class="form-control" name="first_name" id="first_name"
                                           placeholder="">
                                    <div style="color: red">
                                        @error('first_name')
                                        {{$message}}
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputAddress2">Prenom</label>
                                    <input type="text" class="form-control" name="last_name" id="last_name"
                                           placeholder="">
                                    <div style="color: red">
                                        @error('last_name')
                                        {{$message}}
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputAddress2">Email</label>
                                    <input type="email" class="form-control" name="email" id="email"
                                           placeholder="">
                                    <div style="color: red">
                                        @error('email')
                                        {{$message}}
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Password</label>
                                        <input type="password" class="form-control" id="password" name="password"  placeholder="password">
                                        <div style="color: red">
                                            @error('password')
                                            {{$message}}
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4">Password retype</label>
                                        <input type="password" class="form-control" id="password_confirm" name="password_confirm" placeholder="Password">
                                        <div style="color: red">
                                            @error('password_retype')
                                            {{$message}}
                                            @enderror
                                        </div>
                                    </div>
                                </div>



                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Ajouter</button>
                            </div>

                            </form>
                        </div>
                        </div>
                    </div>
                </section>
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="formModal"
                     aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="formModal">Modifier les infos</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hid;den="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form class="">
                                    <div class="form-group">
                                        <label>Nom</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-lock"></i>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" value ="{{$utilisateur->nom}}" placeholder="Nom" name="first_name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Prenom</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-lock"></i>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" value="{{$utilisateur->prenom}}" placeholder="last_name" name="last_name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-envelope"></i>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" value="{{$utilisateur->email}}" placeholder="Email" name="email">
                                        </div>
                                    </div>

                                    <div class="form-group mb-0">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="remember" class="custom-control-input" id="remember-me">
                                            <label class="custom-control-label" for="remember-me">Remember Me</label>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-primary m-t-15 waves-effect" data-admin-id="{{$utilisateur->id}}">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


            </div>



        </div>
    </div>

    </body>




    @endsection('content')


