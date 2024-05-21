
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
                        <li >
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
                        <li class="dropdown active"  >
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="command"></i><span>Scan releve`</span></a>
                            <ul class="dropdown-menu">
                                <li class="dropdown active"><a class="nav-link" href="{{route('admin.scan')}}">Avec Qr code</a></li>
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
                        @if(Session::has('error'))
                            <div class="alert alert-danger" role="alert">
                                {{Session::get('error')}}
                            </div>
                        @endif
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
                                            <form action="{{route('admin.qr')}}" method="post" id="formQr">
                                                @csrf
                                                <input type="hidden" name="data" id="data">
                                                <br />
{{--                                                <input name="ok">--}}

                                                <button class="btn btn-primary" type="button" id="scanButton" onclick="scanner()">Scanner le document</button>

                                            </form>
                                        </div>
                                        <div id = "result"></div>


{{--                                        <input type="hidden" name="image" class="image-tag">--}}


                                    </div>

                                </div>
                        </div>
                            <div class="col-lg-6">
                                <div class="card">
                                    <form action="{{route('admin.ocr')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="card-header">
                                            <h4 class="card-title">choisir une image </h4>
                                        </br>
                                            <input type="file" class="form-control-file" name="image" id="image"  required>
                                            <br />
                                            <button class="btn btn-primary" type="submit" >Upload</button>


                                            <span class="text-muted mb-0"></span>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-lg-12">
                                    <div class="card">
                                        <form action="{{route('admin.ocr2')}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="card-header">
                                                <h4 class="card-title">choisir un pdf</h4>
                                                </br>
                                                <input type="file" class="form-control-file" name="file" id="file" required>
                                                <br />
                                                <button class="btn btn-primary" type="submit" >Upload</button>




                                                <span class="text-muted mb-0"></span>
                                            </div>
                                        </form>
                                    </div>

                            </div>
                                <div class="col-lg-12">
                                    <div class="card">

{{--                                        @if(session()->get('extractedText'))--}}
{{--                                            <h2>Texte extrait :</h2>--}}
{{--                                            <p>{{ session()->get('extractedText') }}</p>--}}
{{--                                        @endif--}}

                                    </div>

                                </div>

                            </div>

                    </div>
                    </div>
                </section>
                <section class="section">
                    <div class="section-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="card-body">
{{--                                    @isset($extractedText)--}}
                                        <h2>Texte extrait :</h2>
{{--                                        {!! nl2br($extractedText) !!}--}}
{{--                                    @php--}}
{{--                                        $studentInfo[]=session()->get('studentInfo');--}}
{{--//                                        echo $studentInfo['nom_prenom'];--}}
{{--//                                        echo $studentInfo['matieres']['matieres'];--}}
{{--//                                        echo $studentInfo['matieres']['note'];--}}
{{--//                                        echo$studentInfo['matieres']['credit'];--}}

{{--                                     @endphp--}}
                                    @isset($studentInfo)
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4>Invert</h4>
                                                </div>
                                                <div class="card-body">
                                                    <table class="table table-dark">
                                                        <thead>
                                                        <tr>
                                                            <th scope="col">Nom et prenoms</th>
                                                            <th scope="col">Id releve</th>
                                                            <th scope="col">Matricule</th>
                                                            <th scope="col">Date de Naissance</th>
                                                            <th scope="col">Filiere</th>
                                                            <th scope="col">Specialité</th>
                                                            <th scope="col">MGP</th>
                                                            <th scope="col">Decision</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>

                                                        <tr>
                                                            <td>{{$studentInfo['nom_prenom']}}</td>
                                                            <td>{{$studentInfo['Id_releve']}}</td>
                                                            <td>{{$studentInfo['matricule']}}</td>
                                                            <td>{{$studentInfo['Date_de_naissance']}}</td>
                                                            <td>{{$studentInfo['Filiere']}}</td>
                                                            <td>{{$studentInfo['Specialite']}}</td>
                                                            <td>{{$studentInfo['mgp']}}</td>
                                                            <td>{{$studentInfo['decision']}}</td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                    @endisset
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </section>
                    </div>
                </section>
            </div>
        </div>
    </div>





    </body>




@endsection('content')


