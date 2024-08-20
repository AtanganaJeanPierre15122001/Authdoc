@extends('layouts.app')
@section('title', 'adminpage')

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
									collapse-btn"> <i
                                        data-feather="align-justify"></i></a></li>

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
                                <a href="{{ route('admin.main') }}" class="nav-link"><i
                                        data-feather="monitor"></i><span>liste admin</span></a>
                            </li>
                            {{-- <li class="dropdown"> --}}
                            {{-- <a href="#" class="menu-toggle nav-link has-dropdown"><i --}}
                            {{-- data-feather="briefcase"></i><span>Widgets</span></a> --}}
                            {{-- <ul class="dropdown-menu"> --}}
                            {{-- <li><a class="nav-link" href="widget-chart.html">Chart Widgets</a></li> --}}
                            {{-- <li><a class="nav-link" href="widget-data.html">Data Widgets</a></li> --}}
                            {{-- </ul> --}}
                            {{-- </li> --}}

                            <li class="menu-header">Gestion</li>
                            <li class="dropdown">

                            </li>
                            {{-- <li class="dropdown active"><a class="nav-link" href="{{route('admin.releve')}}"><i data-feather="file"></i><span>Generer le Document</span></a></li> --}}
                            <li class="dropdown active">
                                <a href="#" class="menu-toggle nav-link has-dropdown"><i
                                        data-feather="file"></i><span>Generer Document</span></a>
                                <ul class="dropdown-menu">
                                    <li><a class="nav-link" href="{{ route('admin.releve') }}">Relevé</a></li>
                                    <li class="dropdown active"><a class="nav-link"
                                            href="{{ route('admin.attestation') }}">Attestation</a></li>

                                </ul>
                            </li>

                            <li class="dropdown">
                                <a href="#" class="menu-toggle nav-link has-dropdown"><i
                                        data-feather="command"></i><span>Scan Document</span></a>
                                <ul class="dropdown-menu">
                                    <li><a class="nav-link" href="{{ route('admin.scan') }}">Relevé</a></li>
                                    <li><a class="nav-link" href="{{ route('admin.scanAttestation') }}">Attestation</a></li>

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

                                    @if ($method == 'search')
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title">Informations de l'attestation à chercher</h4>
                                                </div>
                                                <div class="card-body bootstrap-select-1">
                                                    @if (Session::has('error'))
                                                        <div class="alert alert-danger" role="alert">
                                                            {{ Session::get('error') }}
                                                        </div>
                                                    @endif

                                                    <form id="hidden_form" method="POST"
                                                        action="{{ route('admin.attestationSearch') }}"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="form-row">
                                                            <div class="col-md-12 mb-3">
                                                                <label for="validationCustomUsername">Matricule</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"
                                                                            id="inputGroupPrepend">#00A</span>
                                                                    </div>
                                                                    <input name="matricule" type="text"
                                                                        class="form-control" id="validationCustomUsername"
                                                                        placeholder="Matricule"
                                                                        aria-describedby="inputGroupPrepend" required>
                                                                    <div class="invalid-feedback">
                                                                        Please choose a Matricule.
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 d-flex justify-content-center">
                                                                <button class="btn btn-primary w-100" type="submit"
                                                                    id="submit_btn">Rechercher attestation </button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        


                                       
                                    @endif
                                    @if ($method == null)
                                        <div class="card">
                                            <div class="card-header">
                                                <h4>Resultats pour le matricule {{ session()->get('matricule') }}</h4>
                                            </div>
                                            <div class="card-body">
                                                @if (Session::has('success'))
                                                    <div class="alert alert-success" role="alert">
                                                        {{ Session::get('success') }}
                                                    </div>
                                                @endif

                                                <div class="table-responsive">
                                                    <table class="table table-striped table-md">
                                                        <thead>
                                                            <tr>
                                                                <th>Id attestation</th>
                                                                <th>Matricule</th>
                                                                <th>Nom</th>
                                                                <th>Prénom</th>
                                                                <th>Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @if ($attestations->isEmpty())
                                                                <tr>
                                                                    <td colspan="5" class="text-center text-danger">
                                                                        Aucunes attestations disponible pour ce matricule
                                                                    </td>
                                                                </tr>
                                                            @else
                                                                @foreach ($attestations as $attestation)
                                                                    <input type="hidden" id="AttMat" name="AttMat"
                                                                        value="{{ $attestation->id_attestation }}">
                                                                    <tr id="AttestationRow-{{ $attestation->id_attestation }}">
                                                                        <td class="etu-idAtt">
                                                                            {{ $attestation->id_attestation }}</td>
                                                                        <td class="etu-mat">{{ $attestation->matricule }}
                                                                        </td>
                                                                        <td class="etu-nom">{{ $attestation->nom }}</td>
                                                                        <td class="etu-prenom">{{ $attestation->prenom }}
                                                                        </td>
                                                                        <td>
                                                                            <a href="{{ route('admin.view_attestation', ['mat' => $attestation->matricule, 'idA' => $attestation->id_attestation]) }}"
                                                                                class="btn btn-primary">Voir
                                                                                attestation</a>
                                                                            <button type="button"
                                                                                class="btn btn-danger btn-delete3"
                                                                                data-att-id="{{ $attestation->id_attestation }}">
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





                                    @if ($method == 'afficheAttes')
                                    
                                    <div class="d-flex   container-lg flex-column py-5 px-5 default_option">
                                        <div class="contents">
                                            <style>
                                                .Qrcode {
                                                    margin-top: 50px;
                                                    margin-left: -100px;
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
                                                .bold {
                                                    font-weight: bold;
                                                }
                                                .underline {
                                                    text-decoration: underline;
                                                }
                                                .bordered {
                                                    border: 1px solid #000;
                                                    padding: 10px;
                                                }
                                                .highlight {
                                                    background-color: #e9ecef;
                                                    padding: 10px;
                                                    margin-bottom: 20px;
                                                }
                                                hr {
                                                    border: 0;
                                                    height: 1px;
                                                    background: #000;
                                                    margin: 20px 0;
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

                                                .header, .footer {
                                                    text-align: center;
                                                    margin-bottom: 20px;
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
    
                                                <span class="fs-2"> ATTESTATION DE REUSSITE
                                                </span>
    
                                            </section>
                                            <div class="bottom-left">
                                                <div class="form-value ps-4 pt-1 text-uppercase">
                                                    &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
                                                    &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp;
                                                    &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;
                                                    &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
                                                    &nbsp;&nbsp; &nbsp;
                                                    &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
                                                    &nbsp;&nbsp; &nbsp;
                                                    &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
                                                    &nbsp;&nbsp; &nbsp;
                                                    &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
                                                    &nbsp;&nbsp; &nbsp;
                                                    &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
                                                    &nbsp;&nbsp; &nbsp;
                                                    &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
                                                    &nbsp;&nbsp; &nbsp;
                                                    &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
                                                    &nbsp;&nbsp; &nbsp;
                                                    &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
                                                    &nbsp;&nbsp; &nbsp;
    
    
                                                    N° : {{ isset($attestations) ? $attestations->id_attestation : '' }}
                                                </div>
                                                <!--to change dans la table releve-->
                                            </div>
                                            <main class="w-100 d-flex flex-column align-items-center">
    
                                                <p>Le doyen de la faculté des Sciences de l'Université de Yaoundé, soussigné,</p>
                                        <p><em>The Dean of the Faculty of Science of the University of Yaounde I, undersigned,</em></p>
                                        <p>Atteste que:</p>
                                        <p class="bordered"><span class="bold">M./Mme/Mlle</span> <span class="underline">{{ isset($attestations) ? $attestations->nom : '' }} {{ isset($attestations) ? $attestations->prenom : '' }}</span></p>
                                        <p>Né(e) le <span class="underline">{{ isset($attestations) ? $attestations->date_naissance : '' }}</span> à <span class="underline">{{ isset($attestations) ? $attestations->lieu_naissance : '' }}</span></p>
                                        <p>a subi avec succès, les épreuves sanctionnant l'examen de la</p>
                                        <p><span class="bold">Licence de</span> <span class="underline">{{ isset($attestations) ? $attestations->nom_filiere : '' }}</span></p>
                                        <p><span class="bold">Spécialité/Option</span> <span class="underline">{{ isset($attestations) ? $attestations->specialite : '' }}</span></p>
                                        <p>avec une moyenne générale pondérée (MGP) de: <span class="underline">{{ isset($attestations) ? $attestations->moy_gen_pon : '' }}</span>, crédit(s): 180 et la decision <span class="underline">{{ isset($mention) ? $mention : '' }}</span></p>
                                        <p><em>with a cumulative grade point Average (GPA) of: {{ isset($attestations) ? $attestations->moy_gen_pon : '' }}/4.00, credit: 180 and Grade: {{ isset($mention) ? $mention : '' }}</em></p>
                                      
                                                <section class="w-100 mt-2">
                                                   
                                                </section>
                                                <section class="w-100 d-flex flex-column align-items-center">
                                                    <span class="w-100 decision-data d-flex flex-column w-auto">
                                                        
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
                                                          <div class="footer">
                                                            <p>Yaoundé le {{ date('d/m/Y') }}</p>
                                                            <p>Le chef de département de</p>
                                                            <p><span class="underline">Information and Communication Technology</span></p>
                                                            <p><span class="bold">Le Doyen/The Dean</span></p>
                                                        </div>
                                                        &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
                                                        &nbsp;&nbsp; &nbsp;
                                                        &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
                                                        &nbsp;&nbsp; &nbsp;
                                                        &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
                                                        &nbsp;&nbsp; &nbsp;
                                                        &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
                                                        &nbsp;&nbsp; &nbsp;
                                                        &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
                                                        &nbsp;&nbsp; &nbsp;
                                                        &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
                                                        &nbsp;&nbsp; &nbsp;
                                                        &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
                                                        &nbsp;&nbsp; &nbsp;
                                                        &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
                                                        &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
                                                        &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
                                                        &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
                                                        &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
                                                        &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
                                                        &nbsp;&nbsp; &nbsp;
                                                        &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
                                                        &nbsp;&nbsp; &nbsp;
                                                        &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
                                                        &nbsp;&nbsp; &nbsp;
                                                        &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
                                                        &nbsp;&nbsp; &nbsp;
                                                        &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
                                                        &nbsp;&nbsp; &nbsp;
                                                        &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
                                                        &nbsp;&nbsp; &nbsp;
                                                        &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
                                                        &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
                                                        &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
                                                        &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
                                                        &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
                                                        &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
                                                        &nbsp;&nbsp; &nbsp;
                                                        &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
                                                        &nbsp;&nbsp; &nbsp;
                                                        &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
                                                        &nbsp;&nbsp; &nbsp;
                                                        &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
                                                        &nbsp;&nbsp; &nbsp;
                                                        &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
                                                        &nbsp;&nbsp; &nbsp;
                                                        &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
                                                        &nbsp;&nbsp; &nbsp;
                                                        &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
                                                        &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
                                                        &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
                                                        &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
                                                        &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
                                                        &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
                                                        &nbsp;&nbsp; &nbsp;
                                                        &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
                                                        &nbsp;&nbsp; &nbsp;
                                                        &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
                                                        &nbsp;&nbsp; &nbsp;
                                                        &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
                                                        &nbsp;&nbsp; &nbsp;
                                                        &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
                                                        &nbsp;&nbsp; &nbsp;
                                                        &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
                                                        &nbsp;&nbsp; &nbsp;
                                                        &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
                                                        &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
                                                        &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
                                                        &nbsp;&nbsp;

                                                      
    
    
                                                        <div class="Qrcode">
                                                            {{\SimpleSoftwareIO\QrCode\Facades\QrCode::size(150)->generate($hmacInfo)}}
                                                        </div>
                                                    </div>
    
    
                                                </section>
                                            </main>
                                            <br>
                                        </div>
    
    
                                        <div class="col-sm-4">
                                            <button id="downloadButton" onclick=""><a href="{{route('generatepdf2')}}">downloadButton</a></button>
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
