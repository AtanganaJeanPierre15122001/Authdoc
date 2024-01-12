
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
                <section class="section">
                    <div class="section-body">
                        <div class="row">
                            <div class="col-12 ">
                                @if($method==null)
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Rechercher un etudiant</h4>
                                    </div>

                                    <div class="card-body">
                                        @if(Session::has('success'))
                                            <div class=" alert alert-success" role="alert">
                                                {{Session::get('success')}}
                                            </div>
                                        @endif

                                            <div class="card-body bootstrap-select-1">
                                                <p>Chercher le matricule dont vous voulez afficher le releve</p>
                                                <form method="POST" action="{{route('admin.view_releve')}}">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label class="mb-3">Filiere</label>
                                                            <select id="matricule" name="matricule"
                                                                    class="select2 form-control mb-3 custom-select"
                                                                    style="width: 100%; height:36px;" required>
                                                                @foreach($etudiants as $key => $etudiant)
                                                                <option value="{{$etudiant->matricule}}">{{$etudiant->matricule}}</option>
                                                                @endforeach

                                                            </select>
                                                        </div>
{{--                                                        <div class="col-md-3">--}}
{{--                                                            <label class="mb-3" for="niveau">Level</label>--}}
{{--                                                            <select id="niveau" name="niveau"--}}
{{--                                                                    class="select2 form-control mb-3 custom-select"--}}
{{--                                                                    style="width: 100%; height:36px;" required>--}}
{{--                                                                <option value="L1"> L1</option>--}}
{{--                                                                <option value="L2"> L2</option>--}}
{{--                                                                <option value="L3"> L3</option>--}}
{{--                                                            </select>--}}
{{--                                                        </div>--}}

{{--                                                        <div class="col-md-3">--}}
{{--                                                            <label class="mb-3" for="anneeAcademique">Academic year</label>--}}
{{--                                                            <input type="text" class="form-control" id="anneeAcademique"--}}
{{--                                                                   name="anneeAcademique" placeholder=" Exemple : 2020/2022">--}}

{{--                                                        </div> <!-- end col -->--}}
{{--                                                        <div class="col-md-3">--}}
{{--                                                            <label class="mb-3">Addition Method</label>--}}
{{--                                                            <div class="radio-group">--}}
{{--                                                                <input type="radio" id="radio1" name="radio"--}}
{{--                                                                       value="Excel">--}}
{{--                                                                <label for="radio1">Excel</label>--}}
{{--                                                                <input type="radio" id="radio2" name="radio"--}}
{{--                                                                       value="Manuel">--}}
{{--                                                                <label for="radio2">Manual</label>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}

                                                    </div><!-- end row -->
                                                    <button id="eltb" class="btn btn-primary mb-3" type="submit">
                                                        validate</button>
                                                </form>

                                            </div>
                        </div>
                    </div>
                        @endif
                            </div>
                            @if($method=='afficherel')
                                <div class="d-flex   container-lg flex-column py-5 px-5 default_option">
                                    <header class="w-100 d-flex fle x-column">
                                        <section
                                            class="w-100 d-flex align-items-center justify-content-between">
                                            <div
                                                class="d-flex content-state-data flex-column align-items-center">
                                                <span> REPUBLIQUE DU CAMEROUN </span>
                                                <span> Paix - Travail - Patrie </span>
                                                <span> ------------------------- </span>
                                                <span> UNIVERSITE YAOUNDE 1 </span>
                                            </div>
                                            <div
                                                class="d-flex content-uy1-logo d-flex justify-content-center align-items-center">
                                                <img src="{{asset('assets_admin/img/UyLogo.png')}}"
                                                     alt="university of yaounde 1"
                                                     class="img-fluid" />

                                            </div>
                                            <div
                                                class="d-flex content-state-data flex-column align-items-center">
                                                <span> REPUBLIC OF CAMEROON </span>
                                                <span> Peace - Work - Fatherland </span>
                                                <span> ------------------------- </span>
                                                <span> UNIVERSITY OF YAOUNDE 1 </span>
                                            </div>
                                        </section>
                                    </header>
                                    <section
                                        class="w-100 d-flex flex-column align-items-center py-4"
                                        style="padding-bottom: 0px !important">
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


                                            N° : {{ isset($releve) ? $releve->id_releve : '' }}
                                        </div>
                                        <!--to change dans la table releve-->
                                    </div>
                                    <main class="w-100 d-flex flex-column align-items-center">

                                        <section class="w-100">

                                            <section
                                                class="w-100 d-flex align-items-center justify-content-between">

                                                <div class="d-flex form-item">

                                                    <div class="d-flex flex-column">
                                                                                <span class="fs-5 fw-bolder bold_part">
                                                                                    Noms et Prénoms: </span>
                                                        <span class="english_subtitle"> Surname
                                                                                    and
                                                                                    Name </span>

                                                    </div>

                                                    <div
                                                        class="form-value ps-4 pt-1 text-uppercase">
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
                                            <section
                                                class="w-100 d-flex align-items-center justify-content-start">
                                                <div class="d-flex form-item me-5 pe-5">
                                                    <div class="d-flex flex-column">
                                                                                <span class="fs-5 fw-bolder bold_part">
                                                                                    Né(e) le: </span>
                                                        <span class="english_subtitle"> Born on
                                                                                </span>
                                                    </div>
                                                    <div
                                                        class="form-value ps-4 pt-1 text-uppercase">
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
                                            <section
                                                class="w-100 d-flex align-items-center justify-content-start">
                                                <div class="d-flex form-item">
                                                    <div class="d-flex flex-column">
                                                                                <span class="fs-5 fw-bolder bold_part">
                                                                                    Domaine: </span>
                                                        <span class="english_subtitle"> Domain
                                                                                </span>
                                                    </div>
                                                    <div
                                                        class="form-value ps-4 pt-1 text-uppercase">
                                                        SCIENCES MATHEMATIQUES ET INFORMATIQUES
                                                    </div>
                                                </div>
                                            </section>
                                            <section
                                                class="w-100 d-flex align-items-center justify-content-between">
                                                <div class="d-flex form-item me-5 pe-5 ">
                                                    <div class="d-flex flex-column">
                                                                                <span
                                                                                    class="fs-5 fw-bolder bold_part">Niveau
                                                                                    : &nbsp;</span>
                                                        <span class="english_subtitle"> Level
                                                                                </span>
                                                    </div>
                                                    <div
                                                        class="form-value ps-4 pt-1 text-uppercase">
                                                        {{-- {{$releve->niveau}} --}}
                                                        {{ isset($releve) ? $releve->niveau : '' }}
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

                                            <section
                                                class="w-100 d-flex align-items-center justify-content-between">
                                                <div class="d-flex form-item">
                                                    <div class="d-flex flex-column">
                                                                                <span class="fs-5 fw-bolder bold_part">
                                                                                    Spécialité: </span>
                                                        <span class="english_subtitle"> Option
                                                                                </span>
                                                    </div>
                                                    <div
                                                        class="form-value ps-4 pt-1 text-uppercase">
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
                                                            <td>2021</td>
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
                                        <section
                                            class="w-100 d-flex flex-column align-items-center">
                                                                    <span
                                                                        class="w-100 decision-data d-flex flex-column w-auto">
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
                                        <section class="w-100 d-flex flex-column"
                                                 style="font-size: 10px">
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


                                                <div class="Qrcode" >
                                                    {{\SimpleSoftwareIO\QrCode\Facades\QrCode::size(150)->generate($hmacInfo)}}
                                                </div>
                                            </div>


                                        </section>
                                    </main>
                                    <br>



                                    <div class="col-sm-4">

                                        <button id="downloadButton">Télécharger le PDF</button>
                                    </div>
                                </div>

                            @endif


            </div>



        </div>
                </section>
            </div>
        </div>
    </div>

    <style>

        .Qrcode{
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
            font-size: 12px; /* Taille de police réduite */
        }
        .print-table th,
        .print-table td {
            padding: 5px; /* Espacement réduit entre les cellules */
        }
        .print-table1 td {
            padding: 3px; /* Espacement réduit entre les cellules */
        }

    </style>
    <script>
        $(document).ready(function() {
            $('#downloadButton').click(function() {
                var content = $('.contents').html();

                var printWindow = window.open('', 'Auth.doc');
                printWindow.document.write('<html><head><title>Auth.doc</title>');
                printWindow.document.write(
                    '<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />');
                printWindow.document.write(
                    '<link href="assets/css/card.css" rel="stylesheet" type="text/css" />');
                printWindow.document.write(
                    '<style> @page { size: A4; margin: 0; } body { margin: 1cm; }</style>');
                printWindow.document.write('</head><body>');
                printWindow.document.write('<div class="print-page">' + content + '</div>');
                printWindow.document.write('</body></html>');

                printWindow.document.close();

                // Attendre que le contenu soit chargé dans la fenêtre d'impression
                printWindow.onload = function() {
                    var printDocument = printWindow.document.documentElement;
                    var printPage = printDocument.querySelector('.print-page');

                    // Calculer la hauteur maximale d'une page A4
                    var pageHeight = 11.7 * 96; // Hauteur en pixels

                    // Réduire la hauteur des éléments pour s'adapter à une seule page
                    var elements = printPage.querySelectorAll('*');
                    for (var i = 0; i < elements.length; i++) {
                        var element = elements[i];
                        var elementHeight = element.offsetHeight;
                        if (elementHeight > pageHeight) {
                            element.style.height = pageHeight + 'px';
                        }
                    }

                    // Appeler la fonction d'impression de la fenêtre d'impression
                    printWindow.print();
                };
            });
        });
    </script>

    </body>




    @section('content')


