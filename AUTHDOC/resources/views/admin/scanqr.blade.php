
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
                                <li><a class="nav-link" href="{{route('admin.scanqr')}}">Avec Qr code</a></li>
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
                        <div class="row" style="justify-content: center;">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Scan Qr-code </h4>
                                        <span class="text-muted mb-0">Scan Qr-code here</span>
                                    </div>


                                    <div class="card-body">
                                        <div class="description wow fadeInLeft">
                                            <div name="reader" id="reader" width="600px"></div>
                                            <form action="" method="post" id="formQr">
                                                @csrf
                                                <input type="hidden" name="data" id="data">
                                            </form>
                                        </div>

                                        <br />
                                        <button class="btn btn-primary" type="button" id="scanButton" onclick="scanner()">Scanner le document</button>
                                        <input type="hidden" name="image" class="image-tag">


                                    </div>

                                </div>
                        </div>
                    </div>
                    </div>
                </section>
            </div>
        </div>
    </div>


    <script>




    </script>




    </body>




@endsection('content')


