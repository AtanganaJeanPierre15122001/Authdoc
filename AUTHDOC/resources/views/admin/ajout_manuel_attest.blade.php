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

                    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img alt="image" src="" class="user-img-radious-style"> <span class="d-sm-none d-lg-inline-block"></span></a>
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
                        <a href="index.html"> <img alt="image" src="assets_admin/img/logo.png" class="header-logo" /> <span class="logo-name">Authdoc</span>
                        </a>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="menu-header">Gestion admin</li>
                        <li>
                            <a href="{{route('admin.main')}}" class="nav-link"><i data-feather="monitor"></i><span>liste admin</span></a>
                        </li>
                        {{-- <li class="dropdown">--}}
                        {{-- <a href="#" class="menu-toggle nav-link has-dropdown"><i--}}
                        {{-- data-feather="briefcase"></i><span>Widgets</span></a>--}}
                        {{-- <ul class="dropdown-menu">--}}
                        {{-- <li><a class="nav-link" href="widget-chart.html">Chart Widgets</a></li>--}}
                        {{-- <li><a class="nav-link" href="widget-data.html">Data Widgets</a></li>--}}
                        {{-- </ul>--}}
                        {{-- </li>--}}

                        <li class="menu-header">Gestion releve</li>
                        <li class="dropdown">

                        </li>
                        {{-- <li class="dropdown active"><a class="nav-link" href="{{route('admin.releve')}}"><i data-feather="file"></i><span>Generer le Document</span></a></li> --}}
                        <li class="dropdown active">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="file"></i><span>Generer Document</span></a>
                            <ul class="dropdown-menu">
                                <li ><a class="nav-link" href="{{route('admin.releve')}}">Relevé</a></li>
                                <li class="dropdown active"><a class="nav-link" href="{{route('admin.attestation')}}">Attestation</a></li>

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
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Informations de L'etudiant</h4>
                        <p class="text-muted mb-0"> <code class="highlighter-rouge"></code>
                        </p>
                    </div>
                    <!--end card-header-->
                    <div class="card-body bootstrap-select-1">

                        <form id="hidden_form" method="POST" action="{{route('admin.rempli')}}">
                            @csrf

                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label for="validationCustom01">Nom</label>
                                    <input type="text" class="form-control" id="validationCustom01" name="firstName" placeholder="First name" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-md-4 mb-3">
                                    <label for="validationCustom02">Prenom</label>
                                    <input type="text" class="form-control" id="validationCustom02" name="lastName" placeholder="Last name" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <!--end col-->
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
                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label for="validationCustom01">Date de naisssance</label>
                                    <input name="date_nais" type="date" class="form-control" id="date_naissance" placeholder="04/04/2003" value="" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-md-4 mb-3">
                                    <label for="validationCustom02">Lieu de naissance</label>
                                    <input name="lieu_nais" type="text" class="form-control" id="lieu_naissance" placeholder="Doula" value="" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <!--end col-->
                                
                            </div>
                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label for="validationCustom01">Niveau</label>
                                    <select class="custom-select" id="inputGroupSelect05" name="niveau" required>
                                        <option value="L1">Licence 1</option>
                                        <option value="L2">Licence 2</option>
                                        <option value="L3">Licence 3</option>
                                    </select>

                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-md-4 mb-3">
                                    <label for="validationCustom02">Specialite(facultatif)</label>
                                    <input type="text" class="form-control" id="validationCustom02" name="specialite" placeholder="specialite" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-md-4 mb-3">
                                    <label for="validationCustomUsername">Annee academique</label>
                                    <div class="input-group">

                                        <input name="annee" type="text" class="form-control" id="validationCustomUsername" placeholder="2021/2022" aria-describedby="inputGroupPrepend" required>
                                        <div class="invalid-feedback">
                                            Please choose a year.
                                        </div>
                                    </div>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end form-row-->
                            <div class="form-row">
                                <div class="col-md-2 mb-2">
                                    <label for="dynamicCombo">Filiere:</label>
                                    <input list="dynamicOptions" id="dynamicCombo" name="filiere" class="form-control">
                                    <datalist id="dynamicOptions">
                                        @foreach($filieres as $key => $filiere )
                                        <option value="{{$filiere->id_filiere}}">
                                            {{$filiere->id_filiere}}
                                        </option>
                                        @endforeach
                                    </datalist>
                                    {{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>--}}

                                    <div class="invalid-feedback">
                                        Please provide a valid state.
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-md-3 mb-3">
                                    <label for="validationCustom05">Nom filiere</label>
                                    <input list="dynamicOptions1" id="dynamicCombo1" name="nom_filiere" class="form-control">
                                    <datalist id="dynamicOptions1">
                                        @foreach($filieres as $key => $filiere )
                                        <option value="{{$filiere->nom_filiere}}">
                                            {{$filiere->nom_filiere}}
                                        </option>
                                        @endforeach
                                    </datalist>
                                    <div class="invalid-feedback">
                                        Please provide a valid number.
                                    </div>

                                </div>
                                <!--end col-->

                                <div class="col-md-3 mb-3">
                                    <label for="validationCustom05">Nombre d'UEs</label>
                                    <input type="numerics" class="form-control" id="validationCustom05" placeholder="12" name="nbUe" required style="font-weight: bold;">
                                    <div class="invalid-feedback">
                                        Please provide a valid number.
                                    </div>
                                </div>
                                <!--end col-->



                                <!--end col-->
                            </div>
                            <button class="btn btn-primary" type="submit">Enregistrer les notes</button>
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