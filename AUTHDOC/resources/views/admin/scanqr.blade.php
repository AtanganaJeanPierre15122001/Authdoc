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

                    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img alt="image" src="  " class="user-img-radious-style"> <span class="d-sm-none d-lg-inline-block"></span></a>
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
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="file"></i><span>Generer Document</span></a>
                            <ul class="dropdown-menu">
                                <li class="dropdown"><a class="nav-link" href="{{route('admin.releve')}}">Relevé</a></li>
                                <li><a class="nav-link" href="{{route('admin.attestation')}}">Attestation</a></li>

                            </ul>
                        </li>

                        <li class="dropdown active">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="command"></i><span>Scan Document</span></a>
                            <ul class="dropdown-menu">
                                <li class="dropdown active"><a class="nav-link" href="{{route('admin.scan')}}">Relevé</a></li>
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
                        @if(Session::has('error'))
                        <div class="alert alert-danger" role="alert">
                            {{Session::get('error')}}
                        </div>
                        @endif
                        @if($method==null)
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
                                                {{-- <input name="ok">--}}

                                                <button class="btn btn-primary" type="button" id="scanButton" onclick="scanner()">Scanner le document</button>
                                                <button class="btn btn-danger" type="button" id="continue" data-url="{{ route('admin.continuescan') }}" disabled>Continuer</button>

                                            </form>
                                        </div>
                                        <div id="result"></div>


                                        {{-- <input type="hidden" name="image" class="image-tag">--}}


                                    </div>

                                </div>
                            </div>

                            @endif


                            <div class="container">

                                <!-- Formulaires de téléchargement de fichiers -->
                                @if($method=='continue')
                                <!-- Image d'exemple centrée en haut -->
                                <div class="row justify-content-center">

                                    <div class="col-lg-8 text-center">
                                        <h4>Exemple de releve</h4>
                                        <img src="assets_admin/img/Releve.JPG" class="img-fluid" alt="Exemple d'image" style="max-width: 300px; margin: 20px 0;">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="card">
                                            <form action="{{route('admin.ocr')}}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="card-header">
                                                    <h4 class="card-title">Choisir une image</h4>
                                                    <input type="file" class="form-control-file" name="image" id="image" required>
                                                </div>
                                                <div class="card-footer">
                                                    <button class="btn btn-primary" type="submit">Upload</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="card">
                                            <form action="{{route('admin.ocr2')}}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="card-header">
                                                    <h4 class="card-title">Choisir un PDF</h4>
                                                    <input type="file" class="form-control-file" name="file" id="file" required>
                                                </div>
                                                <div class="card-footer">
                                                    <button class="btn btn-primary" type="submit">Upload</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>


                                <!-- Section d'affichage des informations extraites -->
                                <div class="col-lg-12">
                                    <div class="card">
                                        @isset($studentInfo)
                                        <h2>Texte extrait :</h2>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-dark">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Nom et prénoms</th>
                                                            <th scope="col">Id relevé</th>
                                                            <th scope="col">Matricule</th>
                                                            <th scope="col">Date de Naissance</th>
                                                            <th scope="col">Filière</th>
                                                            <th scope="col">Spécialité</th>
                                                            <th scope="col">MGP</th>
                                                            <th scope="col">Décision</th>
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

                                    <div class="card">
                                        @isset($results)
                                        <div class="card-header">
                                            <h4>Notes de l'étudiant</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-dark">
                                                    <thead>
                                                        <tr>
                                                            <th>Code UE</th>
                                                            <th>Intitulé</th>
                                                            <th>Crédit</th>
                                                            <th>Note</th>
                                                            <th>Mention</th>
                                                            <th>Semestre</th>
                                                            <th>Année</th>
                                                            <th>Décision</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($results as $result)
                                                        <tr>
                                                            <td>{{ $result['code_ue'] }}</td>
                                                            <td>{{ $result['intitule'] }}</td>
                                                            <td>{{ $result['credit'] }}</td>
                                                            <td>{{ $result['note'] }}</td>
                                                            <td>{{ $result['mention'] }}</td>
                                                            <td>{{ $result['semestre'] }}</td>
                                                            <td>{{ $result['annee'] }}</td>
                                                            <td>{{ $result['decision'] }}</td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        @endisset
                                    </div>
                                </div>

                                <!-- Bouton Vérifier -->
                                @if($ver=='one')
                                <div class="row justify-content-center">
                                    <div class="col-lg-4 text-center">
                                        <button id="verifyButton" class="btn btn-danger" onclick="verification1('{{ session()->get('encodedData')}}')">Vérifier</button>
                                    </div>
                                </div>
                                @endif
                                @if($ver=='two')
                                <div class="row justify-content-center">
                                    <div class="col-lg-4 text-center">
                                        <button id="verifyButton" class="btn btn-danger" onclick="verification2('{{ session()->get('encodedData')}}')">Vérifier</button>
                                    </div>
                                </div>
                                @endif

                                <!-- Loader -->
                                <div id="loader" style="display:none;">Chargement...</div>
                            </div>
                        </div>
                        @endif
                    </div>
                </section>
            </div>
            </section>
        </div>
    </div>
    </div>





</body>




@endsection('content')