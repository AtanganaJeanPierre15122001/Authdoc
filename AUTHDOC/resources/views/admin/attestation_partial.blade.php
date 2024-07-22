<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Attestation</title>
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
        #section  {

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
           

            <header class="w-100 d-flex fle x-column">
                <section class="w-100 d-flex align-items-center justify-content-between">
                    <div class="d-flex content-state-data flex-column align-items-center">
                        <span> REPUBLIQUE DU CAMEROUN </span>
                        <span> Paix - Travail - Patrie </span>
                        <span> ------------------------- </span>
                        <span> UNIVERSITE YAOUNDE 1 </span>
                    </div>
                    <div class="d-flex content-uy1-logo d-flex justify-content-center align-items-center">
                        <img src="assets_admin/img/UyLogo.png" alt="university of yaounde 1" class="img-fluid" />

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
                            <img src="data:image/png;base64,{{ base64_encode(\SimpleSoftwareIO\QrCode\Facades\QrCode::size(150)->generate($hmacInfo)) }}" alt="QR Code">
                        </div>
                    </div>


                </section>
            </main>
            <br>
        </div>


        
    </div>

    
</body>
</html>