@extends('layouts.app')
@section('title','userpage')

@section('content')

<body>
    <div class="loader"></div>
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
                        
                        <li class="menu-header">Gestion Document</li>
                        <li class="dropdown">

                        </li>
                        {{-- <li class="dropdown active"><a class="nav-link" href="{{route('admin.releve')}}"><i data-feather="file"></i><span>Generer le Document</span></a></li> --}}
                        <li class="dropdown active">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="file"></i><span>Generer Document</span></a>
                            <ul class="dropdown-menu">
                                <li class="dropdown active"><a class="nav-link" href="{{route('user.main')}}">Relevé</a></li>
                                <li><a class="nav-link" href="{{route('user.attestation')}}">Attestation</a></li>

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
            </div>        <!-- Main Content -->
            <div class="main-content">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Informations du relevé à chercher</h4>
                        <p class="text-muted mb-0"> <code class="highlighter-rouge"></code>
                        </p>
                    </div>
                    <!--end card-header-->
                    <div class="card-body bootstrap-select-1">
                        @if(Session::has('error'))
                        <div class=" alert alert-danger" role="alert">
                            {{Session::get('error')}}
                        </div>
                        @endif

                        <form id="hidden_form" method="POST" action="{{route('user.main')}}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label for="validationCustomUsername">Matricule</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend">#00A</span>
                                        </div>
                                        <input name="matricule" type="text" class="form-control" id="validationCustomUsername" placeholder="Matricule" aria-describedby="inputGroupPrepend" required>
                                        <div class="invalid-feedback">
                                            Please choose a Matricule.
                                        </div>
                                    </div>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end form-row-->

                            <!--end col-->
                            <div style="margin-top: 30px;">
                                
                                &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;  &nbsp;&nbsp;  &nbsp;&nbsp;
                                <button class="btn btn-primary" type="submit" id="submit_btn">Rechercher relevé</button>
                            </div>


                            <!--end form-row-->
                        </form>

                        <!--end form-->


                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
@endsection('content')