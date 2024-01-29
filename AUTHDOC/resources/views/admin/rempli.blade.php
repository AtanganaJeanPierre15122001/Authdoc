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
                                            class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img alt="image" src=""
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
                        <li >
                            <a href="{{route('admin.main')}}" class="nav-link"><i data-feather="monitor"></i><span>liste admin</span></a>
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
                        <li class="dropdown active"><a class="nav-link" href="{{route('admin.releve')}}"><i data-feather="file"></i><span>Generer le relevé</span></a></li>


                    </ul>
                </aside>
            </div>
            <!-- Main Content -->
            <div class="main-content">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Veillez remplir les notes de l'étudiant {{ session()->get('nom')}}</h4>
                        <p class="text-muted mb-0"> <code
                                class="highlighter-rouge"></code>
                        </p>
                    </div>
                    <!--end card-header-->
                    <div class="card-body bootstrap-select-1">

                        <form id="hidden_form" method="POST" action="{{route('admin.remplir_releve')}}">
                            @csrf
                            @for ($i = 1; $i <= session()->get('nbUe'); $i++)
                                <p class="text-muted mb-0"> <code
                                        class="highlighter-rouge"> Matiere {{$i}}</code>
                                </p>

                            <div class="form-row">
                                <div class="col-md-1 mb-3">
                                    <label for="validationCustom01">Code UE</label>
                                    <input type="text" class="form-control"
                                           id="validationCustom01" name="codeUE_{{$i}}"
                                           placeholder="" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-md-2 mb-3">
                                    <label for="validationCustom02">Intitule de l'UE</label>
                                    <input type="text" class="form-control"
                                           id="validationCustom02" name="ueName_{{$i}}"
                                           placeholder="" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-md-1 mb-3">
                                    <label for="validationCustomUsername">Credit</label>
                                    <div class="input-group">

                                        <input name="credit_{{$i}}" type="number"
                                               class="form-control" id="validationCustomUsername"
                                               placeholder=""
                                               aria-describedby="inputGroupPrepend" required>
                                        <div class="invalid-feedback">
                                            Please choose a credit.
                                        </div>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-md-1 mb-3">
                                    <label for="validationCustomUsername">Moy/100</label>
                                    <div class="input-group">

                                        <input name="moy_{{$i}}" type="number"
                                               class="form-control" id="validationCustomUsername"
                                               placeholder=""
                                               aria-describedby="inputGroupPrepend" required>
                                        <div class="invalid-feedback">
                                            Please choose a average.
                                        </div>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-md-1 mb-3">
                                    <label for="validationCustomUsername">Mention</label>
                                    <div class="input-group">

                                        <select class="custom-select" id="inputGroupSelect05" name="mention_{{$i}}" required>
                                            <option value="A" selected>A</option>
                                            <option value="A">A</option>
                                            <option value="A-">A-</option>
                                            <option value="B">B</option>
                                            <option value="B+">B+</option>
                                            <option value="B-">B-</option>
                                            <option value="C">C</option>
                                            <option value="C+">C+</option>
                                            <option value="C-">C-</option>
                                            <option value="D">D</option>
                                            <option value="E">E</option>
                                            <option value="F">F</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Please choose a average.
                                        </div>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-md-1 mb-3">
                                    <label for="validationCustomUsername">Semestre</label>
                                    <div class="input-group">

                                        <select class="custom-select" id="inputGroupSelect05" name="semestre_{{$i}}" required>
                                            <option value="S1" selected>S1</option>
                                            <option value="S1">S1</option>
                                            <option value="S2">S2</option>
                                            <option value="S3">S3</option>
                                            <option value="S4">S4</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Please choose a average.
                                        </div>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-md-2 mb-3">
                                    <label for="validationCustomUsername">Annee</label>
                                    <div class="input-group">

                                        <input name="annee_{{$i}}" type="text"
                                               class="form-control" id="validationCustomUsername"
                                               placeholder=""
                                               aria-describedby="inputGroupPrepend" required>
                                        <div class="invalid-feedback">
                                            Please choose a average.
                                        </div>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-md-2 mb-3">
                                    <label for="validationCustomUsername">Decision</label>
                                    <div class="input-group">

                                        <select class="custom-select" id="inputGroupSelect05" name="decision_{{$i}}" required>
                                            <option alue="CA" selected>CA</option>
                                            <option value="CA">CA</option>
                                            <option value="CANT">CANT</option>
                                            <option value="EL">EL</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Please choose a average.
                                        </div>
                                    </div>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end form-row-->






                                <!--end col-->
                            @endfor
                            <div class="col-md-3 mb-3">
                                <label for="validationCustomUsername">Decision finale</label>
                                <div class="input-group">

                                    <select class="custom-select" id="inputGroupSelect05" name="decision_rel" required>

                                        <option value="ADMIS" selected>ADMIS</option>
                                        <option value="ADMIS">ADMIS</option>
                                        <option value="ADMIS">ECHEC</option>

                                    </select>
                                    <div class="invalid-feedback">
                                        Please choose a average.
                                    </div>
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-md-3 mb-3">
                                <label for="validationCustomUsername">Moyenne generale ponderée</label>
                                <div class="input-group">

                                    <input name="mgp" type="text"
                                           class="form-control" id="validationCustomUsername"
                                           placeholder=""
                                           aria-describedby="inputGroupPrepend" required>


                                    <div class="invalid-feedback">
                                        Please choose a average.
                                    </div>
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-md-3 mb-3">
                                <label for="validationCustomUsername">Credits capitalise</label>
                                <div class="input-group">

                                    <input name="credits_cap" type="text"
                                           class="form-control" id="validationCustomUsername"
                                           placeholder=""
                                           aria-describedby="inputGroupPrepend" required>


                                    <div class="invalid-feedback">
                                        Please choose a average.
                                    </div>
                                </div>
                            </div>
                            <!--end col-->


                            <button class="btn btn-primary" type="submit">Generer le releve</button>
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
