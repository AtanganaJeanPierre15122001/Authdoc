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
                                        <h4 class="card-title" style="center">Remplir un Releve De Notes</h4>
                                        <p class="text-muted mb-0"> <code
                                                class="highlighter-rouge"></code> 
                                        </p>
                                    </div>
                                    <!--end card-header-->
                                    <div class="card-body bootstrap-select-1">
                                        

                                            <form id="hidden_form" method="POST"
                                                action="">
                                                
                                                <div class="form-row">
                                                    <div class="col-md-4 mb-3">
                                                        <label for="validationCustom01">Nom et Prenom</label>
                                                        <input type="text" class="form-control"
                                                            id="validationCustom01" name="firstName"
                                                            placeholder="First name" required>
                                                        <div class="valid-feedback">
                                                            Looks good!
                                                        </div>
                                                    </div>
                                                    <!--end col-->
                                                    <div class="col-md-4 mb-3">
                                                        
                                                    </div>
                                                    <!--end col-->
                                                    <div class="col-md-4 mb-3">
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
                                                    <!--end col-->
                                                </div>
                                                <!--end form-row-->
                                                <div class="form-row">
                                                    <div class="col-md-4 mb-3">
                                                        <label for="validationCustom01">Ne(e) le</label>
                                                        <input name="birthDay" type="text" class="form-control"
                                                            id="date_naissance" placeholder="04/04/2003"
                                                            value="" required>
                                                        <div class="valid-feedback">
                                                            Looks good!
                                                        </div>
                                                    </div>
                                                    <!--end col-->
                                                    <div class="col-md-4 mb-3">
                                                        <label for="validationCustom02">A/at</label>
                                                        <input name="placeBirth" type="text" class="form-control"
                                                            id="lieu_naissance" placeholder="Doula" value=""
                                                            required>
                                                        <div class="valid-feedback">
                                                            Looks good!
                                                        </div>
                                                    </div>
                                                    <!--end col-->
                                                </div>
                                                <div class="form row">
                                                <div class="col-md-4 mb-4">
                                                            <label for="code_ue_input">Domaine</label>
                                                            <input type="text" class="form-control"
                                                                id="validationCustom05" value=""
                                                                name="" required
                                                                style="font-weight: bold;">
                                                            <div class="invalid-feedback">
                                                                Please provide a valid state.
                                                            </div>
                                                        </div>

                                                </div>

                                                <div class="form row">
                                                <div class="col-md-4 mb-4">
                                                            <label for="code_ue_input">Niveau</label>
                                                            <input type="text" class="form-control"
                                                                id="validationCustom05" value=""
                                                                name="" required
                                                                style="font-weight: bold;">
                                                            <div class="invalid-feedback">
                                                                Please provide a valid state.
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4 mb-4">
                                                          
                                                        </div>

                                                        <div class="col-md-4 mb-4">
                                                            <label for="code_ue_input">Filiere</label>
                                                            <input type="text" class="form-control"
                                                                id="validationCustom05" value=""
                                                                name="" required
                                                                style="font-weight: bold;">
                                                            <div class="invalid-feedback">
                                                                Please provide a valid state.
                                                            </div>
                                                        </div>

                                                </div>

                                                <div class="form row">
                                                <div class="col-md-4 mb-4">
                                                            <label for="code_ue_input">Specialite</label>
                                                            <input type="text" class="form-control"
                                                                id="validationCustom05" value=""
                                                                name="" required
                                                                style="font-weight: bold;">
                                                            <div class="invalid-feedback">
                                                                Please provide a valid state.
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4 mb-4">
                                                            
                                                        </div>

                                                        <div class="col-md-4 mb-4">
                                                            <label for="code_ue_input">Annee Academique</label>
                                                            <input type="text" class="form-control"
                                                                id="validationCustom05" value=""
                                                                name="" required
                                                                style="font-weight: bold;">
                                                            <div class="invalid-feedback">
                                                                Please provide a valid state.
                                                            </div>
                                                        </div>

                                                </div>
                                                <div class="form-row">

                                                    
                                                        <div class="col-md-1 mb-1">
                                                            <label for="code_ue_input">Code Ue</label>
                                                            <input type="text" class="form-control"
                                                                id="validationCustom05" value=""
                                                                name="" required
                                                                style="font-weight: bold;">
                                                            <div class="invalid-feedback">
                                                                Please provide a valid state.
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2 mb-2">
                                                            <label for="code_ue_input">Intitule de L'UE</label>
                                                            <input type="text" class="form-control"
                                                                id="validationCustom05" value=""
                                                                name="" required
                                                                style="font-weight: bold;">
                                                            <div class="invalid-feedback">
                                                                Please provide a valid state.
                                                            </div>
                                                        </div>
                                                        <!--end col-->
                                                        <div class="col-md-1 mb-1">
                                                            <label for="credit_input">Credit</label>
                                                            <input type="text" class="form-control"
                                                                id="validationCustom05" value=""
                                                                name="" required
                                                                style="font-weight: bold;">
                                                            <div class="invalid-feedback">
                                                                Please provide a valid zip.
                                                            </div>
                                                        </div>
                                                        <div class="col-md-1 mb-1">
                                                            <label for="credit_input">Moy/100</label>
                                                            <input type="text" class="form-control"
                                                                id="validationCustom05" value=""
                                                                name="" required
                                                                style="font-weight: bold;">
                                                            <div class="invalid-feedback">
                                                                Please provide a valid zip.
                                                            </div>
                                                        </div>
                                                        <div class="col-md-1 mb-1">
                                                            <label for="validationCustom04">Mention</label>
                                                            <input type="numerics" class="form-control"
                                                                id="validationCustom04" placeholder="A"
                                                                name="" required
                                                                style="font-weight: bold;">
                                                            <div class="invalid-feedback">
                                                                Please provide a valid state.
                                                            </div>
                                                        </div>
                                                        <!--end col-->
                                                        <div class="col-md-2 mb-2">
                                                            <label for="credit_input">Semestre</label>
                                                            <select id="niveau_select"
                                                                name=""
                                                                class="select2 form-control mb-3 custom-select"
                                                                style="font-weight: bold;" required>
                                                                <option value="" style="font-weight: bold;">
                                                                    Semestre</option>

                                                                <optgroup label="Le 1er semestre">
                                                                    <option class="option" value="1">Semestre 1
                                                                    </option>
                                                                    <option class="option" value="2">Semestre 2
                                                                    </option>
                                                                </optgroup>
                                                                <optgroup label="Le 2ème semestre">
                                                                    <option class="option" value="3">Semestre 3
                                                                    </option>
                                                                    <option class="option" value="4">Semestre 4
                                                                    </option>
                                                                </optgroup>


                                                            </select>
                                                        </div>
                                                        <!--end col-->
                                                        
                                                        <!--end col-->
                                                        <div class="col-md-1 mb-1">
                                                            <label for="validationCustom05">Annee</label>
                                                            <input type="numerics" class="form-control"
                                                                id="validationCustom05" placeholder=""
                                                                name="" required
                                                                style="font-weight: bold;">
                                                            <div class="invalid-feedback">
                                                                Please provide a valid zip.
                                                            </div>
                                                        </div>
                                                        <!--end col-->
                                                        <div class="col-md-2 mb-2">
                                                            <label for="validationCustom05">Decision</label>
                                                            <input type="numerics" class="form-control"
                                                                id="validationCustom05" placeholder="CA"
                                                                name=""
                                                                style="font-weight: bold;">
                                                            <div class="invalid-feedback">
                                                                Please provide a valid zip.
                                                            </div>
                                                        </div>
                                                    
                                                   
                                                
                                                    <!--end col-->
                                        

                                                
                                    
                                    
                                    <!--end form-row-->
                                    </form>

                                    <!--end form-->

                                 <p>c"est le nombre d'ue qui determine le nombre de cases a afficher pour remplir</p>
                                </div>
                                <a href="{{route('admin.releve')}}"  class="btn btn-primary mb-3">Submit</a>
            </div>
            </body>
            @section('content')