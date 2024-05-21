
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>releve</title>
    <style>


        table th:nth-child(2) {
            width: 300px; /* Ajustez la valeur selon vos besoins */
            min-width: 300px; /* Ajustez la valeur selon vos besoins */
        }
        .content-recap table th:nth-child(2) {
            /* Laissez cette colonne avec la larg
            eur par défaut */
            width: 20px; /* Ajustez la valeur selon vos besoins */
            min-width: 20px;
        }

        .content-recap table th:nth-child(1) {
            /* Laissez cette colonne avec la larg
            eur par défaut */
            width: 25px; /* Ajustez la valeur selon vos besoins */
            min-width: 25px;
        }
        .content-recap table th:nth-child(3) {
            /* Laissez cette colonne avec la larg
            eur par défaut */
            width: 25px; /* Ajustez la valeur selon vos besoins */
            min-width: 25px;
        }
        .content-recap table th:nth-child(4) {
            /* Laissez cette colonne avec la larg
            eur par défaut */
            width: 45px; /* Ajustez la valeur selon vos besoins */
            min-width: 45px;
        }


        header{
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .logo{
            position: absolute;
            width:50%;
            height: auto;
            left: 45%;
            right: 50%;
            top: -25px;

            display: flex;
            justify-content: center;
            align-items: center;

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
            font-size: 30px;
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
            width: 250px ;
            height:100px

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
            max-width: 100%;
            overflow-x: hidden;

        }

        table {
            margin-bottom: 10px;
        }

        .div-suivante {
            margin-top: 10px;
        }
        .print-table {
            font-size: 12px;
            background-color: #f0f8ff; /* Taille de police réduite */
        }
        .print-table th,
        .print-table td {
            padding: 5px; /* Espacement réduit entre les cellules */
        }
        .print-table1 td {
            padding: 3px; /* Espacement réduit entre les cellules */
        }

        #contentDiv {
            position: absolute;
            top: -30px; /* Adjust as needed */
            right: 20px; /* Adjust as needed */
        }

        #contentDiv2 {
            position: absolute;
            top: -75px; /* Adjust as needed */
            right: 220px; /* Adjust as needed */
        }
        #contentDiv3 {
            top: -30px;
            right:0px;
            text-align:right;
        }
        #section1 {

            left: 20px; /* Adjust as needed */
            line-height: 13px;
        }
        #section 0 {

        /* Adjust as needed */
            line-height: 12px;
        }
        #contentDiv1 {
            position: absolute;
            top: -55px; /* Adjust as needed */
            right: 100px; /* Adjust as needed */
            left :1000px;
        }

        #contentDiv4{
            position: absolute;
            top: 0px; /* Adjust as needed */
            right:28em;


        }
        #contentDiv10{
            position: absolute;
            top: -15px; /* Adjust as needed */
            right: 6em; /* Adjust as needed */
            /* left :550px; */
        }

        #contentDiv5{
            position: absolute;
            top: -5px; /* Adjust as needed */
            right: 2em; /* Adjust as needed */
            /* left :550px; */
        }


        #contentDiv6 {
            position: absolute;
            top: -10px; /* Adjust as needed */
            right: 2em;
            /* Adjust as needed */
        }
        .print-table {
            width: 80%; /* occuper 80% de la page */
            margin: 0 auto; /* pour centrer la table */


        }


        table {
            border-collapse: collapse;
            background-color: #f0f8ff;
        }

        table, th, td{
            border: 1px solid black;
            width: 100%;
            height: 5px;
        }

        #contentDiv7{
            position: absolute;
            top: 350px; /* Adjust as needed */
            right: 90px; /* Adjust as needed */
            left :600px;
        }

        #contentDiv8 img {
            position: absolute;
            margin-bottom: 300px;

            left: 500px;
            bottom: 10px;
        }
        #con {
            position: fixed;
            margin-bottom: 300px;

            left: 500px;
            bottom: -5px;
        }









    </style>
</head>
<body>

<div class="d-flex   container-lg flex-column py-5 px-5 default_option">
    <div class="contents">


        <header class="w-100 d-flex fle x-column header">
            <section
                class="w-100 d-flex align-items-center justify-content-between">
                <div id="contentDiv3"
                     class="d-flex content-state-data flex-column align-items-center">
                    <span> REPUBLIQUE DU CAMEROUN <br> </span>
                    <span> Paix - Travail - Patrie <br></span>
                    <span> ---------------------------<br> </span>
                    <span> UNIVERSITE YAOUNDE 1 </span>
                </div>
                <div
                    class="d-flex logo content-uy1-logo d-flex justify-content-center align-items-center">
                    <img src="assets_admin/img/UyLogo.png"
                         alt="university of yaounde 1"
                         class="img-fluid" />

                </div>

                <div
                    id="contentDiv" class="d-flex content-state-data flex-column align-items-center">
                    <span> REPUBLIC OF CAMEROON <br> </span>
                    <span> Peace - Work - Fatherland <br> </span>
                    <span> --------------------------- <br> </span>
                    <span> UNIVERSITY OF YAOUNDE 1 </span>
                </div>
            </section>
        </header>
        <section id="section 0"
                 class="w-100 d-flex flex-column align-items-center py-4"
                 style="padding-bottom: 0px !important">
            <h3 style="text-align: center; font-weight: normal; margin-bottom: -5;"> FACULTE DES SCIENCES</h3>
            <p style="text-align: center;">
                PB/P.O. Box 812 Yaoundé CAMEROUN : Tel: 222-234-496
                /
                Email:
                diplome@facsiences.uy1.cm
                <br>

                <span class="fs-2"> RELEVE DE NOTES/TRANSCRIPT
                                                               <br> </span>
                <span id=""class="fs-6 fw-bolder bold_part align-items-center ">
                                                                                   <strong>N° : </strong>
                                                                                   {{ isset($releve) ? $releve->id_releve : '' }}
                                                                                   </span>

            </p>


        </section>

        <main class="w-100 d-flex flex-column align-items-center">

            <section id="section1"  class="w-100">

                <section
                    class="w-100 d-flex align-items-center justify-content-between">


                    <div class="d-flex form-item">

                        <div id=""class="d-flex flex-column">


                            <span class="fs-5 fw-bolder bold_part">
                                                                                   <strong> Noms et Prénoms: </strong>{{ isset($etudiant) ? $etudiant->nom : '' }}
                                {{ isset($etudiant) ? $etudiant->prenom : '' }}</span><br>
                            <span class="english_subtitle"> Surname
                                                                                    and
                                                                                    Name </span> <br>


                        </div>
                        <div id="contentDiv5" class="form-value ps-4 pt-1 text-uppercase">
                        <span class="fs-5 fw-bolder bold_part">
                                                                                   <strong> Matricule: </strong>{{ isset($etudiant) ? $etudiant->matricule : '' }}</span> <br>
                            <span class="english_subtitle">
                                                                                    Registration N° </span> <br>

                            <div
                                class="form-value ps-4 pt-1 text-uppercase">


                            </div>

                        </div>
                    </div>


                </section>
                <div class="d-flex form-item">

                    <div class="d-flex flex-column">
                        <span class="fs-5 fw-bolder bold_part">
                                                                                   <strong> Né(e) le: </strong>{{ isset($etudiant) ? $etudiant->date_naissance : '' }}</span> <br>
                        <span class="english_subtitle"> Born on
                                                                                </span> <br>
                        <div
                            class="form-value ps-4 pt-1 text-uppercase">
                            {{-- {{ $etudiant->date_naissance }} --}}

                        </div>

                    </div>
                    <div id="contentDiv4" class="form-value ps-4 pt-1 text-uppercase">
                        <span class="fs-5 fw-bolder bold_part">




                            <span class="fs-5 fw-bolder bold_part">
                                                                                                                                       A: </span> {{ isset($etudiant) ? $etudiant->lieu_naissance : '' }}<br>
                                <span class="english_subtitle">
                                </span>

                                                                                                                                       At</span> <br>
                    </div>

                </div>

                <section
                    class="w-100 d-flex align-items-center justify-content-start">
                    <div class="d-flex form-item">
                        <div class="d-flex flex-column">
                                                                                <span class="fs-5 fw-bolder bold_part">
                                                                                  <strong>  Domaine:</strong> SCIENCES MATHEMATIQUES ET INFORMATIQUES </span> <br>
                            <span class="english_subtitle"> Domain
                                                                                </span> <br>
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
                                                                                    class="fs-5 fw-bolder bold_part"> <strong>Niveau
                                                                                    : </strong>&nbsp;</span> {{ isset($releve) ? $niv->nom_niveau : '' }}<br>
                            <span class="english_subtitle"> Level
                                                                                </span>
                        </div>
                        <div
                            class="form-value ps-4 pt-1 text-uppercase">

                        </div>
                    </div>

                    <div id="contentDiv10" class="form-value ps-4 pt-1 text-uppercase">
                            <span class="fs-5 fw-bolder bold_part">
                                                                              <strong> Filiere: </strong></span>{{ isset($releve) ? $releve->filiere : '' }} <br>
                        <span class="english_subtitle">
                            <div class="form-value ps-4 pt-1">


                            </div>
                                                                            Discipline</span> <br>
                    </div>
                </section>

                <section
                    class="w-100 d-flex align-items-center justify-content-between">
                    <div class="d-flex form-item">
                        <div class="d-flex flex-column">
                                                                                <span class="fs-5 fw-bolder bold_part">
                                                                                 <strong>   Spécialité:</strong>{{ isset($releve) ? $etudiant->specialite : '' }} </span> <br>
                            <span class="english_subtitle"> Option
                                                                                </span>
                        </div>
                        <div
                            class="form-value ps-4 pt-1 text-uppercase">

                        </div>
                    </div>
                    <div id="contentDiv6" class="form-value ps-4 pt-1 text-uppercase">
                            <span class="fs-5 fw-bolder bold_part">
                                                                             <strong>  Annee Academic:</strong> {{ isset($releve) ? $releve->annee_academique : '' }}</span> <br>
                        <span class="english_subtitle">
                            <div class="form-value ps-4 pt-1">
                                {{-- {{$releve->anneeAcademique}} --}}

                                <!--to change dans la table releve-->
                            </div>
                                                                            Academic Year</span>
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
                class=" w-100 d-flex flex-column align-items-center"style="text-align:center;">
                                                                    <span
                                                                        class="w-100 decision-data d-flex flex-column w-auto">
                                                                        <span> Crédit Capitalisés: <b>60/60 (100.00%)</b>
                                                                        </span><br>
                                                                        <span> Moyenne Générale Pondérée (MGP):

                                                                            <!--to change-->
                                                                        </span><strong>{{ isset($releve) ? $releve->moy_gen_pon : '' }}</strong><br>
                                                                        <span> Decision: <b>
                                                                                {{ isset($releve) ? $releve->decision_rel : '' }}
                                                                            </b> </span>
                                                                        <!--to change-->
                                                                    </span>
            </section>

            <section id="section1" class="w-100 d-flex flex-column"
                     style="font-size: 10px;">
                <div class="d-flex">
                    <div><u> Légende: </u></div>
                    <div class="d-flex flex-column">
                        <span> CA: Capitalisé </span><br>
                        <span> CANT: Capitalisé Non transferable
                                                                            </span><br>
                        <span> NC: Non Capitalisé </span><br>
                    </div>
                </div>

                <div class="d-flex ">
                    <div class="content-recap w-100 mt-2 bloc">
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
                                <td><30</td>
                                <td>F</td>

                            </tr>
                            </tbody>
                        </table>
                        <div id="con" >Yaounde le : {{ \Carbon\Carbon::now()->toDateString() }}</div>


                        <div id="contentDiv8"
                             class="Qrcode" >

                            <img src="data:image/png;base64,{{ base64_encode(\SimpleSoftwareIO\QrCode\Facades\QrCode::size(150)->generate($hmacInfo)) }}" alt="QR Code">
                        </div>

                    </div>


                </div>

                {{--                <div id="contentDiv8">--}}
                {{--                    <div>Yaounde le ..................</div><br>--}}
                {{--                    <div>Le Chef de Departement</div>--}}
                {{--                    <div>The Head of Departement</div>--}}
                {{--                </div>--}}


                <div style="font-size: medium;">NB:il n'est delivre qu'un seul exemplaire de releve de notes.Le titulaire peut etablir et faire certifier des copies conformes.Only one transcript shall be delivered.It is the owner's interest to make certified true copies</div>


            </section>
        </main>

    </div>
</div>
</body>
</html>
