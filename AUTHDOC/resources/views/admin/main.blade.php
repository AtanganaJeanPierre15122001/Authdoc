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
                    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <i data-feather="user"></i> <span class="d-sm-none d-lg-inline-block"></span></a>
                        <div class="dropdown-menu dropdown-menu-right pullDown">
                            <div class="dropdown-title">Hello {{session('name')}}</div>
                            <div class="dropdown-divider"></div>
                            <a href="{{ route('auth.logout') }}" class="dropdown-item has-icon text-danger"> <i class="fas fa-sign-out-alt"></i>
                                Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar sidebar-style-2">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="{{ route('home') }}"> <img alt="image" src="assets_admin/img/logo.png" class="header-logo" />
                            <span class="logo-name">Authdoc</span>
                        </a>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="menu-header">Gestion admin</li>
                        <li class="dropdown active">
                            <a href="index.html" class="nav-link"><i data-feather="monitor"></i><span>liste admin</span></a>
                        </li>
                        <li class="menu-header">Gestion releve</li>
                        <li class="dropdown">

                        </li>
                        {{-- <li class="dropdown active"><a class="nav-link" href="{{route('admin.releve')}}"><i data-feather="file"></i><span>Generer le Document</span></a></li> --}}
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="file"></i><span>Generer Document</span></a>
                            <ul class="dropdown-menu">
                                <li class="dropdown"><a class="nav-link" href="{{route('admin.releve')}}">Relevé</a></li>
                                <li><a class="nav-link" href="{{route('admin.attestation')}}">Attestation</a></li>

                            </ul>
                        </li>

                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="command"></i><span>Scan Document</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="{{route('admin.scan')}}">Relevé</a></li>
                                <li><a class="nav-link" href="{{route('admin.scanAttestation')}}">Attestation</a></li>

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
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Liste des administrateurs</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="d-flex justify-content-center mb-3">
                                            <button type="submit" class="btn btn-primary rounded-pill">
                                                <a href="#" data-toggle="modal" data-target="#addAdminModal" style="color: white;">Ajouter un administrateur</a>
                                            </button>
                                        </div>
                                        @if(Session::has('success'))
                                        <div class="alert alert-success" role="alert">
                                            {{ Session::get('success') }}
                                        </div>
                                        @endif

                                        <div class="table-responsive">
                                            <table class="table table-striped table-md">
                                                <thead>
                                                    <tr>
                                                        <th>Nom</th>
                                                        <th>Prénom</th>
                                                        <th>Email</th>
                                                        <th>Update</th>
                                                        <th>Delete</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($utilisateurs as $utilisateur)
                                                    <tr id="adminRow-{{ $utilisateur->id }}">
                                                        <td class="admin-nom">{{ $utilisateur->nom }}</td>
                                                        <td class="admin-prenom">{{ $utilisateur->prenom }}</td>
                                                        <td class="admin-email">{{ $utilisateur->email }}</td>
                                                        <td>
                                                            <button type="button" class="btn btn-primary btn-update" data-toggle="modal" data-target="#exampleModal" data-admin-nom="{{ $utilisateur->nom }}" data-admin-id="{{ $utilisateur->id }}" data-admin-prenom="{{ $utilisateur->prenom }}" data-admin-email="{{ $utilisateur->email }}">
                                                                <i class="fas fa-edit"></i>
                                                            </button>
                                                        </td>
                                                        <td>
                                                            <button type="button" class="btn btn-danger btn-delete" data-admin-id="{{ $utilisateur->id }}">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    </div>

    </section>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="formModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formModal">Modifier les infos</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hid;den="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="" method="POST" action="{{route('admin.main.update')}}" id="updateForm">
                        <div class="form-group">
                            <input type="hidden" name="adminId" id="adminId">
                            <label>Nom</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-lock"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control" id="nom" name="nom" required>
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
                                <input type="text" class="form-control" id="prenom" name="prenom" required>
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
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary updateForm">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    </div>
    <div class="modal fade" id="addAdminModal" tabindex="-1" role="dialog" aria-labelledby="addAdminModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addAdminModalLabel">Ajouter un administrateur</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Votre formulaire ici -->
                    <form method="POST" action="{{ route('admin.mainPost') }}">
                        @csrf
                        <!-- Reste de votre formulaire inchangé -->
                        <div class="form-group">
                            <label for="inputAddress2">Nom</label>
                            <input type="text" class="form-control" name="first_name" id="first_name" placeholder="">
                            <div style="color: red">
                                @error('first_name')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress2">Prenom</label>
                            <input type="text" class="form-control" name="last_name" id="last_name" placeholder="">
                            <div style="color: red">
                                @error('last_name')
                                {{$message}}
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputAddress2">Email</label>
                            <input type="email" class="form-control" name="email2" id="email2" placeholder="">
                            <div style="color: red">
                                @error('email2')
                                {{$message}}
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="password">
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
                                    @error('password_confirm')
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
    </div>
    </div>
    </div>

</body>





@endsection('content')
