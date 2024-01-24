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
            
            <div class="col-lg-12" id="excel-form">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Soumetre Via Excel</h4>
                                    <!-- <p class="text-muted mb-0">Vous pouvez Soumetre Le(s) Etudiant(s) en utilisant<code class="highlighter-rouge"></code>
                                        <code class="highlighter-rouge">Excel. </code>Mais d abord charger ces <code class="highlighter-rouge">informations du formulaire</code>.
                                    </p> -->
                                </div>
                                <!--end card-header-->
                                <div class="card-body">
                                    <form id="eltb" method="POST" action="{{ route('import_excel') }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">


                                            <div class="col-md-3">
                                                
                                            
    <label for="dynamicCombo">Matricule</label>
    <input list="dynamicOptions" id="dynamicCombo" class="form-control">
    <datalist id="dynamicOptions">
      <option value="1023">
      <option value="1064">
    </datalist>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
      document.getElementById('dynamicCombo').addEventListener('change', function() {
        var currentValue = this.value;
        var optionExists = false;
        var options = document.getElementById('dynamicOptions').getElementsByTagName('option');
        for (var i = 0; i < options.length; i++) {
          if (options[i].value === currentValue) {
            optionExists = true;
            break;
          }
        }
        if (!optionExists) {
          var newOption = document.createElement('option');
          newOption.value = currentValue;
          document.getElementById('dynamicOptions').appendChild(newOption);
        }
      });
    </script>
                                                    </div>

                                            <div class="col-md-2">
                                            <label for="dynamicCombo">Filiere:</label>
    <input list="dynamicOptions" id="dynamicCombo" class="form-control">
    <datalist id="dynamicOptions">
      <option value="ICT4D">
      <option value="CHIMIE">
    </datalist>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
      document.getElementById('dynamicCombo').addEventListener('change', function() {
        var currentValue = this.value;
        var optionExists = false;
        var options = document.getElementById('dynamicOptions').getElementsByTagName('option');
        for (var i = 0; i < options.length; i++) {
          if (options[i].value === currentValue) {
            optionExists = true;
            break;
          }
        }
        if (!optionExists) {
          var newOption = document.createElement('option');
          newOption.value = currentValue;
          document.getElementById('dynamicOptions').appendChild(newOption);
        }
      });
    </script>
                           
                                            </div>

                                            <div class="col-md-2">
                                            <label for="dynamicCombo">Nom</label>
    <input list="dynamicOptions" id="dynamicCombo" class="form-control">
    <datalist id="dynamicOptions">
      <option value="Mataga Emma">
      <option value="Atangana Jp">
    </datalist>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
      document.getElementById('dynamicCombo').addEventListener('change', function() {
        var currentValue = this.value;
        var optionExists = false;
        var options = document.getElementById('dynamicOptions').getElementsByTagName('option');
        for (var i = 0; i < options.length; i++) {
          if (options[i].value === currentValue) {
            optionExists = true;
            break;
          }
        }
        if (!optionExists) {
          var newOption = document.createElement('option');
          newOption.value = currentValue;
          document.getElementById('dynamicOptions').appendChild(newOption);
        }
      });
    </script>
                           
                                            </div>
                                            <div class="col-md-2">
                                            <label for="dynamicCombo">Prenom</label>
    <input list="dynamicOptions" id="dynamicCombo" class="form-control">
    <datalist id="dynamicOptions">
      <option value="Mataga Emma">
      <option value="Atangana Jp">
    </datalist>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
      document.getElementById('dynamicCombo').addEventListener('change', function() {
        var currentValue = this.value;
        var optionExists = false;
        var options = document.getElementById('dynamicOptions').getElementsByTagName('option');
        for (var i = 0; i < options.length; i++) {
          if (options[i].value === currentValue) {
            optionExists = true;
            break;
          }
        }
        if (!optionExists) {
          var newOption = document.createElement('option');
          newOption.value = currentValue;
          document.getElementById('dynamicOptions').appendChild(newOption);
        }
      });
    </script>
                           
                                            </div>
                                           
                                    


                                        <div class="col-md-2">
                                            <label for="dynamicCombo">Nombre UEs</label>
    <input list="dynamicOptions" id="dynamicCombo" class="form-control">
    <datalist id="dynamicOptions">
      <option value="L1">
      <option value="L2">
    </datalist>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
      document.getElementById('dynamicCombo').addEventListener('change', function() {
        var currentValue = this.value;
        var optionExists = false;
        var options = document.getElementById('dynamicOptions').getElementsByTagName('option');
        for (var i = 0; i < options.length; i++) {
          if (options[i].value === currentValue) {
            optionExists = true;
            break;
          }
        }
        if (!optionExists) {
          var newOption = document.createElement('option');
          newOption.value = currentValue;
          document.getElementById('dynamicOptions').appendChild(newOption);
        }
      });
    </script>
                           
                                            </div>
                                           
                                        </div>
                                        <div style="margin-top: 30px;">
                                            <input class="btn btn-sm btn-soft-primary " value="Import Fichier Excel"
                                                type="file" accept=".xlsx, .xls" name="excel_file"
                                                id="excel_file" required>
                                            &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
                                            <button class="btn btn-primary" type="submit"
                                                id="submit_btn">Upload/.xlsx, .xls</button>
                                        </div>
                                        <!-- Code HTML du formulaire -->
                                    </form>
                                </div>
                                <!--end card-body-->
                            </div>
                            <!--end card-->
                        </div>



            </div>
            </div>
                
            </body>
            @section('content')