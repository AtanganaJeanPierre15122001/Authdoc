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
                                <li class="dropdown active"><a class="nav-link" href="{{route('admin.releve')}}">Relevé</a></li>
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

                                @if ($method=='search')
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Informations du relevé à chercher</h4>
                                        </div>
                                        <div class="card-body bootstrap-select-1">
                                            @if(Session::has('error'))
                                            <div class="alert alert-danger" role="alert">
                                                {{Session::get('error')}}
                                            </div>
                                            @endif
                        
                                            <form id="hidden_form" method="POST" action="{{route('admin.releve')}}" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-row">
                                                    <div class="col-md-12 mb-3">
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
                                                    <div class="col-md-12 d-flex justify-content-center">
                                                        <button class="btn btn-primary w-100" type="submit" id="submit_btn">Rechercher relevé</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                        
                                <div class="col-md-12 text-center my-4">
                                    <h4>ou</h4>
                                </div>
                        
                               
                            <div class="col-md-5 ">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Ajouter un relevé</h4>
                                    </div>
                                    <!--end card-header-->
                                    <div class="card-body bootstrap-select-1">
                                        <div class="row">
                                            <div class="col-md-12 mb-3">
                                                <label class="mb-2">Ajouter un relevé via fichier Excel</label>
                                                <a href="{{ route('admin.ajout_excel') }}" class="btn btn-primary w-100 mb-2">Excel</a>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label class="mb-2">Ajouter un relevé manuellement</label>
                                                <a href="{{ route('admin.ajout_manuel') }}" class="btn btn-primary w-100 mb-2">Manuel</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end card-body-->
                                </div>
                            
                                @endif
                                @if($method==null)
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Resultats pour le matricule {{ session()->get('matricule') }}</h4>
                                    </div>
                                    <div class="card-body">
                                        @if(Session::has('success'))
                                        <div class="alert alert-success" role="alert">
                                            {{ Session::get('success') }}
                                        </div>
                                        @endif

                                        <div class="table-responsive">
                                            <table class="table table-striped table-md">
                                                <thead>
                                                    <tr>
                                                        <th>Id releve</th>
                                                        <th>Matricule</th>
                                                        <th>Nom</th>
                                                        <th>Prénom</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if ($releves->isEmpty())
                                                        <tr>
                                                            <td colspan="5" class="text-center text-danger">Aucun relevé disponible pour ce matricule</td>
                                                        </tr>
                                                    @else
                                                        @foreach($releves as $releve)
                                                            <input type="hidden" id="relMat" name="relMat" value="{{ $releve->id_releve }}">
                                                            <tr id="releveRow-{{ $releve->id_releve }}">
                                                                <td class="etu-idRel">{{ $releve->id_releve }}</td>
                                                                <td class="etu-mat">{{ $releve->matricule }}</td>
                                                                <td class="etu-nom">{{ $releve->nom }}</td>
                                                                <td class="etu-prenom">{{ $releve->prenom }}</td>
                                                                <td>
                                                                    <a href="{{ route('admin.view_releve', ['mat' => $releve->matricule, 'idR' => $releve->id_releve]) }}" class="btn btn-primary">Voir relevé</a>
                                                                    <button type="button" class="btn btn-danger btn-delete2" data-rel-id="{{ $releve->id_releve }}">
                                                                        <i class="fas fa-trash"></i>
                                                                    </button>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>
                                        
                                        
                                    </div>
                                </div>
                                @endif





                                @if($method=='afficherel')
                                <div class="d-flex   container-lg flex-column py-5 px-5 default_option">
                                    <div class="contents position-relative">
                                        <style>
                                            .Qrcode {
                                                position: absolute;
                                                bottom: 0;
                                                right: 0;
                                                margin: 20px; /* Ajustez la marge si nécessaire */
                                            }

                                            #downloadButton {
                                                border: 1px solid blue;
                                                /* Ajoute un bord de 1 pixel avec la couleur bleue */
                                                padding: 5px 10px;
                                                /* Ajuste le rembourrage intérieur du bouton */
                                                background-color: white;
                                                /* Définit la couleur de fond du bouton */
                                                color: blue;

                                            }

                                            .col-sm-4 {
                                                margin-bottom: 2%;
                                            }

                                            #downloadButton:hover {
                                                background-color: blue;
                                                /* Définit la couleur de fond du bouton au survol */
                                                color: white;
                                                /* Définit la couleur du texte du bouton au survol */
                                            }

                                            * {
                                                position: relative;
                                            }

                                            .bloc {
                                                display: inline-block;
                                                margin-right: 20px;
                                            }

                                            .fs-2 {
                                                color: #000000;
                                                font-size: 43px;
                                                font-weight: bold;
                                            }

                                            .default_option {
                                                font-size: 14px;
                                                margin: 0 !important;
                                            }

                                            .bold_part {
                                                font-size: 17px !important;
                                            }

                                            .english_subtitle {
                                                font-style: italic;
                                                font-size: 13px;
                                                margin-top: -5px;
                                            }

                                            .content-uy1-logo {
                                                height: 100px;
                                                width: 80px;
                                            }

                                            .content-state-data span:nth-child(1),
                                            .content-state-data span:nth-child(4) {
                                                font-weight: bold;
                                            }

                                            table {
                                                border-top: 2px solid #000000 !important;
                                                border-right: 2px solid #000000 !important;
                                            }

                                            table th span {
                                                display: flex;
                                                justify-content: center;
                                                align-items: center;
                                                height: 30px;
                                                text-transform: capitalize;
                                            }

                                            table th,
                                            table td:not(:nth-child(2)) {
                                                text-align: center;
                                            }

                                            table thead,
                                            table tbody {
                                                border: none !important;
                                                border-bottom: 3px solid #000000 !important;
                                            }

                                            table tr {
                                                border-bottom: 1px solid #000000 !important;
                                            }

                                            table tr td,
                                            table tr th {
                                                border-left: 3px solid #000000 !important;
                                            }

                                            .content-recap {
                                                max-width: 650px;
                                            }

                                            [rowspan] span {
                                                position: absolute;
                                                height: 100%;
                                                width: 100%;
                                                left: 0px;
                                                top: 0px;
                                                display: flex;
                                                justify-content: center;
                                                align-items: center;
                                            }

                                            .content-recap table {
                                                font-size: 0.85em;
                                                width: 380px !important;
                                            }

                                            .content-recap table td,
                                            .content-recap table th {
                                                /* height: 14px !important; */
                                                padding: 0px !important;
                                                margin: 0px !important;
                                            }

                                            .content-recap table th span {
                                                height: 29px !important;
                                            }

                                            .bottom-left {
                                                position: relative;
                                                top: 0;
                                                right: 0;

                                            }

                                            .app-search-topbar.active {}



                                            .top-search:focus {
                                                outline: none;
                                            }

                                            .app-search-topbar {
                                                padding: -23px;
                                                border-radius: 700px;
                                            }

                                            .hide-phone {
                                                padding-top: 10px;
                                                margin-bottom: 10px;


                                            }

                                            .app-search-topbar {
                                                padding-left: 4px;
                                                padding-right: 8px;
                                                border-radius: 100px;
                                            }

                                            .topbar {
                                                padding-bottom: 12px;
                                                padding-left: 12px;
                                                padding-top: 12px;
                                            }

                                            body {
                                                margin: 0;
                                                padding: 0;
                                            }

                                            table {
                                                margin-bottom: 10px;
                                            }

                                            .div-suivante {
                                                margin-top: 10px;
                                            }

                                            .print-table {
                                                font-size: 12px;
                                                /* Taille de police réduite */
                                            }

                                            .print-table th,
                                            .print-table td {
                                                padding: 5px;
                                                /* Espacement réduit entre les cellules */
                                            }

                                            .print-table1 td {
                                                padding: 3px;
                                                /* Espacement réduit entre les cellules */
                                            }
                                        </style>

                                        <header class="w-100 d-flex fle x-column">
                                            <section class="w-100 d-flex align-items-center justify-content-between">
                                                <div class="d-flex content-state-data flex-column align-items-center">
                                                    <span> REPUBLIQUE DU CAMEROUN </span>
                                                    <span> Paix - Travail - Patrie </span>
                                                    <span> ------------------------- </span>
                                                    <span> UNIVERSITE YAOUNDE 1 </span>
                                                </div>
                                                <div class="d-flex content-uy1-logo d-flex justify-content-center align-items-center">
                                                    <img src="{{asset('assets_admin/img/UyLogo.png')}}" alt="university of yaounde 1" class="img-fluid" />

                                                </div>
                                                <div class="d-flex content-state-data flex-column align-items-center">
                                                    <span> REPUBLIC OF CAMEROON </span>
                                                    <span> Peace - Work - Fatherland </span>
                                                    <span> ------------------------- </span>
                                                    <span> UNIVERSITY OF YAOUNDE 1 </span>
                                                </div>
                                            </section>
                                        </header>
                                        <section class="w-100 d-flex flex-column align-items-center py-4" style="padding-bottom: 0px !important">
                                            <span class="fs-5 fw-normal"> FACULTE DES SCIENCES
                                            </span>
                                            <span>
                                                PB/P.O. Box 812 Yaoundé CAMEROUN : Tel: 222-234-496
                                                /
                                                Email:
                                                diplome@facsiences.uy1.cm
                                            </span>

                                            <span class="fs-2"> RELEVE DE NOTES/TRANSCRIPT
                                            </span>

                                        </section>
                                        <div class="container">
                                            <div class="d-flex justify-content-center text-uppercase text-center">
                                               


                                                N° : {{ isset($releve) ? $releve->id_releve : '' }}
                                            </div>
                                            <!--to change dans la table releve-->
                                        </div>
                                        <main class="w-100 d-flex flex-column align-items-center">

                                            <section class="w-100">

                                                <section class="w-100 d-flex align-items-center justify-content-between">

                                                    <div class="d-flex form-item">

                                                        <div class="d-flex flex-column">
                                                            <span class="fs-5 fw-bolder bold_part">
                                                                Noms et Prénoms: </span>
                                                            <span class="english_subtitle"> Surname
                                                                and
                                                                Name </span>

                                                        </div>

                                                        <div class="form-value ps-4 pt-1 text-uppercase">
                                                            {{ isset($etudiant) ? $etudiant->nom : '' }}
                                                            {{ isset($etudiant) ? $etudiant->prenom : '' }}
                                                        </div>

                                                    </div>

                                                    <div class="d-flex form-item">

                                                        <div class="d-flex flex-column">
                                                            {{-- <div class="form-value ps-4 pt-1 text-uppercase">N° 00097/EDG/L2/Ict/20212022 &nbsp; &nbsp;</div> --}}
                                                            <span class="fs-5 fw-bolder bold_part">
                                                                Matricule: </span>
                                                            <span class="english_subtitle">
                                                                Registration N° </span>
                                                        </div>
                                                        <div class="form-value ps-4 pt-1">
                                                            {{ isset($etudiant) ? $etudiant->matricule : '' }}
                                                        </div>
                                                    </div>
                                                </section>
                                                <section class="w-100 d-flex align-items-center justify-content-start">
                                                    <div class="d-flex form-item me-5 pe-5">
                                                        <div class="d-flex flex-column">
                                                            <span class="fs-5 fw-bolder bold_part">
                                                                Né(e) le: </span>
                                                            <span class="english_subtitle"> Born on
                                                            </span>
                                                        </div>
                                                        <div class="form-value ps-4 pt-1 text-uppercase">
                                                            {{-- {{ $etudiant->date_naissance }} --}}
                                                            {{ isset($etudiant) ? $etudiant->date_naissance : '' }}
                                                        </div>
                                                    </div>
                                                    &nbsp;
                                                    <div class="d-flex form-item ms-5 ps-5">
                                                        <div class="d-flex flex-column">
                                                            <span class="fs-5 fw-bolder bold_part">
                                                                A:
                                                            </span>
                                                            <span class="english_subtitle"> At
                                                            </span>
                                                        </div>
                                                        <div class="form-value ps-4 pt-1">
                                                            {{ isset($etudiant) ? $etudiant->lieu_naissance : '' }}
                                                        </div>
                                                    </div>
                                                </section>
                                                <section class="w-100 d-flex align-items-center justify-content-start">
                                                    <div class="d-flex form-item">
                                                        <div class="d-flex flex-column">
                                                            <span class="fs-5 fw-bolder bold_part">
                                                                Domaine: </span>
                                                            <span class="english_subtitle"> Domain
                                                            </span>
                                                        </div>
                                                        <div class="form-value ps-4 pt-1 text-uppercase">
                                                            SCIENCES MATHEMATIQUES ET INFORMATIQUES
                                                        </div>
                                                    </div>
                                                </section>
                                                <section class="w-100 d-flex align-items-center justify-content-between">
                                                    <div class="d-flex form-item me-5 pe-5 ">
                                                        <div class="d-flex flex-column">
                                                            <span class="fs-5 fw-bolder bold_part">Niveau
                                                                : &nbsp;</span>
                                                            <span class="english_subtitle"> Level
                                                            </span>
                                                        </div>
                                                        <div class="form-value ps-4 pt-1 text-uppercase">
                                                            {{-- {{$releve->niveau}} --}}
                                                            {{ isset($releve) ? $niv->nom_niveau : '' }}
                                                        </div>
                                                    </div>

                                                    <div class="d-flex form-item ms-5 ps-5">
                                                        <div class="d-flex flex-column">
                                                            <span class="fs-5 fw-bolder bold_part">
                                                                Filière : &nbsp;</span>
                                                            <span class="english_subtitle">
                                                                Discipline
                                                            </span>
                                                        </div>
                                                        <div class="form-value ps-4 pt-1">
                                                            {{-- {{$releve->filiere}} --}}
                                                            {{ isset($releve) ? $releve->filiere : '' }}
                                                        </div>
                                                    </div>
                                                </section>

                                                <section class="w-100 d-flex align-items-center justify-content-between">
                                                    <div class="d-flex form-item">
                                                        <div class="d-flex flex-column">
                                                            <span class="fs-5 fw-bolder bold_part">
                                                                Spécialité: </span>
                                                            <span class="english_subtitle"> Option
                                                            </span>
                                                        </div>
                                                        <div class="form-value ps-4 pt-1 text-uppercase">
                                                            {{ isset($releve) ? $etudiant->specialite : '' }}
                                                        </div>
                                                    </div>
                                                    <div class="d-flex form-item">
                                                        <div class="d-flex flex-column">
                                                            <span class="fs-5 fw-bolder bold_part">
                                                                Année Academique: </span>
                                                            <span class="english_subtitle">
                                                                Academic
                                                                year </span>
                                                        </div>
                                                        <div class="form-value ps-4 pt-1">
                                                            {{-- {{$releve->anneeAcademique}} --}}
                                                            {{ isset($releve) ? $releve->annee_academique : '' }}
                                                            <!--to change dans la table releve-->
                                                        </div>
                                                    </div>
                                                </section>
                                            </section>
                                            <section class="w-100 mt-2">
                                                <table class="w-100 table print-table">
                                                    <thead>
                                                        <tr>
                                                            <th>
                                                                <span> Code UE </span>
                                                            </th>
                                                            <th>
                                                                <span> Intitulé de l'UE / UE Title
                                                                </span>
                                                            </th>
                                                            <th>
                                                                <span>
                                                                    crédit <br />
                                                                    credit
                                                                </span>
                                                            </th>
                                                            <th>
                                                                <span> Moy / 100 </span>
                                                            </th>
                                                            <th>
                                                                <span>
                                                                    Mention <br />
                                                                    Grade
                                                                </span>
                                                            </th>
                                                            <th>
                                                                <span>
                                                                    Semestre <br />
                                                                    Semester
                                                                </span>
                                                            </th>
                                                            <th>
                                                                <span>
                                                                    Année <br />
                                                                    Year
                                                                </span>
                                                            </th>
                                                            <th>
                                                                <span>
                                                                    Décision <br />
                                                                    Decision
                                                                </span>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if (isset($resultats))
                                                        @foreach ($resultats as $resultat)
                                                        <tr>
                                                            <td>{{ $resultat->ue }}</td>
                                                            <td>{{ $resultat->nom_ue }}</td>
                                                            <td>{{ $resultat->credit }}</td>
                                                            <td>{{ $resultat->moyenne }}</td>
                                                            <td>{{ $resultat->mention }}</td>
                                                            <td>{{ $resultat->semestre }}</td>
                                                            <!--semestre de l ue A AJOUTER-->
                                                            <td>{{ $resultat->annee }}</td>
                                                            <!--anne que tu compose la matiere  de l ue A AJOUTER-->
                                                            <td>{{ $resultat->decision_note }}</td>
                                                        </tr>
                                                        @endforeach
                                                        @else
                                                        <tr>
                                                            <td colspan="8">Aucune note
                                                                trouvée pour cet étudiant</td>
                                                        </tr>
                                                        @endif



                                                    </tbody>
                                                </table>
                                            </section>
                                            <section class="d-flex justify-content-center  text-center">
                                                <span class="w-100 decision-data d-flex flex-column w-auto">
                                                    <span> Crédit Capitalisés: 60/60 (100.00%)
                                                    </span>
                                                    <span> Moyenne Générale Pondérée (MGP):
                                                        {{-- {{$releve->mgp}} --}}
                                                        {{ isset($releve) ? $releve->moy_gen_pon : '' }}
                                                        /4
                                                        <!--to change-->
                                                    </span>
                                                    <span> Decision: <b>
                                                            {{ isset($releve) ? $releve->decision_rel : '' }}
                                                        </b> </span>
                                                    <!--to change-->
                                                </span>
                                            </section>
                                            <section class="w-100 d-flex flex-column" style="font-size: 10px">
                                                <div class="d-flex">
                                                    <div><u> Légende: </u></div>

                                                    <div class="d-flex flex-column">
                                                        <br />
                                                        <span> CA: Capitalisé </span>
                                                        <span> CANT: Capitalisé Non transferable
                                                        </span>
                                                        <span> NC: Non Capitalisé </span>
                                                    </div>
                                                </div>

                                                <div class="d-flex ">
                                                    <div class="content-recap w-100 mt-3 bloc">
                                                        <table class="table table-sm w-100">
                                                            <thead>
                                                                <th>
                                                                    <span> Note / 100 </span>
                                                                </th>
                                                                <th>
                                                                    <span> Cote </span>
                                                                </th>
                                                                <th>
                                                                    <span>
                                                                        Qualité <br />
                                                                        de point
                                                                    </span>
                                                                </th>
                                                                <th>
                                                                    <span class="px-5">
                                                                        Mention
                                                                    </span>
                                                                </th>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>>= 80</td>
                                                                    <td class="text-center">A
                                                                    </td>
                                                                    <td>4.00</td>
                                                                    <td>Très Bien</td>
                                                                </tr>

                                                                <tr>
                                                                    <td>75 - 79</td>
                                                                    <td class="text-center">A-
                                                                    </td>
                                                                    <td>3.70</td>
                                                                    <td rowspan="2">
                                                                        <span> Bien </span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>70 - 74</td>
                                                                    <td class="text-center">B+
                                                                    </td>
                                                                    <td>3.30</td>
                                                                </tr>

                                                                <tr>
                                                                    <td>65 - 69</td>
                                                                    <td class="text-center">B
                                                                    </td>
                                                                    <td>3.00</td>
                                                                    <td rowspan="2">
                                                                        <span> Assez Bien
                                                                        </span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>60 - 64</td>
                                                                    <td class="text-center">B-
                                                                    </td>
                                                                    <td>2.70</td>
                                                                </tr>

                                                                <tr>
                                                                    <td>55 - 59</td>
                                                                    <td class="text-center">C+
                                                                    </td>
                                                                    <td>2.30</td>
                                                                    <td rowspan="2">
                                                                        <span> Passable </span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>50 - 54</td>
                                                                    <td class="text-center">C
                                                                    </td>
                                                                    <td>2.00</td>
                                                                </tr>

                                                                <tr>
                                                                    <td>45 - 49</td>
                                                                    <td class="text-center">A-
                                                                    </td>
                                                                    <td>1.70</td>
                                                                    <td rowspan="3">
                                                                        <span class="px-2">
                                                                            Crédit Capitalisé
                                                                            Mais
                                                                            non transferable
                                                                        </span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>40 - 44</td>
                                                                    <td class="text-center">B+
                                                                    </td>
                                                                    <td>1.30</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>35 - 39</td>
                                                                    <td class="text-center">D
                                                                    </td>
                                                                    <td>1.00</td>
                                                                </tr>

                                                                <tr>
                                                                    <td>30 - 35</td>
                                                                    <td class="text-center">E
                                                                    </td>
                                                                    <td rowspan="2">
                                                                        <span> 0.00 </span>
                                                                    </td>
                                                                    <td rowspan="2">
                                                                        <span> Echec </span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        < 30</td>
                                                                    <td class="text-center">F
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    

                                                    <div class="Qrcode">
                                                        {{\SimpleSoftwareIO\QrCode\Facades\QrCode::size(150)->generate($hmacInfo)}}
                                                    </div>
                                                </div>


                                            </section>
                                        </main>
                                        <br>
                                    </div>


                                    <div class="col-sm-4">

                                        <button id="downloadButton" onclick=""><a href="{{route('generatepdf')}}">downloadButton</a></button>
                                    </div>
                                </div>

                                @endif
                            </div>

                        </div>
                    </div>
                </section>
            </div>


        </div>
    </div>






</body>




@endsection