
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
                                            class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img alt="image" src="assets_admin/img/user.png"
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
                        <a href=""> <img alt="image" src="assets_admin/img/logo.png" class="header-logo" /> <span
                                class="logo-name">Authdoc</span>
                        </a>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="menu-header">Gestion admin</li>
                        <li class="dropdown active">
                            <a href="{{route('admin.main')}}" class="nav-link"><i data-feather="monitor"></i><span>liste admin</span></a>
                        </li>


                        <li class="menu-header">Gestion releve</li>
                        <li class="dropdown">

                        </li>
                        <li><a class="nav-link" href="{{route('admin.ajoutreleve')}}"><i data-feather="file"></i><span>Ajout d'un releve</span></a></li>
                        <li><a class="nav-link" href="blank.html"><i data-feather="file"></i><span>Ajout QR code a un Releve</span></a></li>
                        <li><a class="nav-link" href="blank.html"><i data-feather="file"></i><span>Ajout OCR a un releve</span></a></li>
                        <li><a class="nav-link" href="blank.html"><i data-feather="file"></i><span>Tout les Releves</span></a></li>
                    </ul>
                </aside>
            </div>
            <div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-6 col-md-6 col-lg-6">
                <div class="card">
                  <div class="card-header">
                    <h4>Ajouter le releve d'un etudiant</h4>
                  </div>
                  <div class="card-body">
                <div class="row"> 
                  <div class="col-md-3">
                                                <label class="mb-3">Filiere</label>
                                                <select id="filiere_select" name="filiere"
                                                    class="select2 form-control mb-3 custom-select"
                                                    style="width: 100%; height:36px;" required>

                                                    <option value="ICT4D">ICT4D</option>
                                                    <option value="INFO">INFO</option>
                                                    <option value="MATHS">MATHS</option>
                                                    <option value="PHYSIQUE">PHYSIQUE</option>
                                                    <option value="CHIMIE">CHIMIE</option>
                                                    <option value="BIOS">BIOS</option>

                                                </select>
                                            

                    </div>
                    <div class="col-md-3">
                                                <label class="mb-3" for="niveau">Niveau</label>
                                                <select id="niveau" name="niveau"
                                                    class="select2 form-control mb-3 custom-select"
                                                    style="width: 100%; height:36px;" required>
                                                    <option value="L1"> L1</option>
                                                    <option value="L2"> L2</option>
                                                    <option value="L3"> L3</option>
                                                </select>
                                            

                  </div>
                  <div class="col-md-3">
                                                <label class="mb-3" for="anneeAcademique">Academic year</label>
                                                <input type="text" class="form-control" id="anneeAcademique"
                                                    name="anneeAcademique" placeholder=" Exemple : 2020/2022">
                </div>
                <div class="col-md-3">
                                                <label class="mb-3" for="matricule">Matricule</label>
                                                <input type="text" class="form-control" id="anneeAcademique"
                                                    name="matricule" placeholder=" Exemple : 21Q2443">
                </div>    

            </div>
            <button id="eltb" class="btn btn-primary mb-3" type="submit">
                                            validate</button>

        </div>


        </div>
        </div>
    </div>

    </body>




    @section('content')


