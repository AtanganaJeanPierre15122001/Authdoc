<?php

namespace App\Http\Controllers;

use App\Http\Requests\signuprequest;
use App\Models\appartenir;
use App\Models\etudiant;
use App\Models\filere;
use App\Models\note;
use App\Models\regroupe;
use App\Models\releve;
use App\Models\ue;
use App\Models\Utilisateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PhpOffice\PhpSpreadsheet\IOFactory;

class admincontroller extends Controller
{
    public function admin()
    {
        $response['utilisateurs']=Utilisateur::where(['fonction'=>'adm'])->get();
        return view('admin.main')->with($response);
    }

    public function adminPost(signuprequest $request)
    {
        $request1 = $request->validated();

        $utilisateur = new Utilisateur();
        $utilisateur->nom = $request1['first_name'];
        $utilisateur->prenom = $request1['last_name'];
        $utilisateur->email = $request1['email'];
        $utilisateur->password = Hash::make($request1['password']);
        $utilisateur->fonction = 'adm';

        $utilisateur->save();

        return to_route('admin.main')->with('success','administrateur ajouté');
    }

    public function adminUpdate(Request $request, string $id)
    {
        $utilisateur = Utilisateur::findOrFail($id);

        $utilisateur->nom  = $request->first_name;
        $utilisateur->prenom  = $request->last_name;
        $utilisateur->email  = $request->email;

        $utilisateur->save();


        return to_route('admin.main')->with('success','administrateur mis a jour');

    }


    public function ajout_manuel()
    {

        $filieres = filere::all();

        return view('admin.ajout_manuel')->with(['filieres' => $filieres]);
    }

    public function ajout_excel()
    {
        $filieres = filere::all();
        return view('admin.ajout_excel')->with(['filieres' => $filieres]);
    }


    public function rempli(Request $request)
    {

        $nom = $request->input('firstName');
        $prenom = $request->input('lastName');
        $matricule = $request->input('matricule');
        $date_nais1 = $request->input('date_nais');
        $lieu_nais = $request->input('lieu_nais');
        $filiere = $request->input('filiere');
        $niveau = $request->input('niveau');
        $domaine = $request->input('domaine');
        $annee = $request->input('annee');
        $specialite = $request->input('specialite');
        $nom_filiere = $request->input('nom_filiere');
        $nbUe = $request->input('nbUe');

        $date_nais = date('Y-m-d', strtotime($date_nais1));
        session()->put('nom', $nom);
        session()->put('prenom', $prenom);
        session()->put('matricule', $matricule);
        session()->put('date_nais', $date_nais);
        session()->put('lieu_nais', $lieu_nais);
        session()->put('filiere', $filiere);
        session()->put('annee', $annee);
        session()->put('domaine', $domaine);
        session()->put('niveau', $niveau);
        session()->put('specialite', $specialite);
        session()->put('nom_filiere', $nom_filiere);
        session()->put('nbUe', $nbUe);





        return view('admin.rempli');
    }


    public function remplirReleve(Request $request)
    {

            $etudiant = new etudiant();
            $etudiant->matricule = session()->get('matricule');
            $etudiant->nom = session()->get('nom');
            $etudiant->prenom = session()->get('prenom');
            $etudiant->date_naissance = session()->get('date_nais');
            $etudiant->lieu_naissance = session()->get('lieu_nais');
            $etudiant->domaine = session()->get('domaine');
            $etudiant->specialite = session()->get('specialite');

            $etudiant->save();


            $filiere = new filere();

            $filiere->id_filiere = session()->get('filiere');
            $filiere->nom_filiere = session()->get('nom_filiere');
            $filiere->nb_matieres = session()->get('nbUe');




        $filiereExist = filere::where(['id_filiere' => session()->get('filiere')])->first();

        if (!$filiereExist)
        {
           $filiere->save();
        }


        $nomSplitted = explode(' ', session()->get('nom'));
        $initial1 = '';
        foreach ($nomSplitted as $part) {
            $initial1 .= strtoupper(substr($part, 0, 1));
        }


        $nomSplitted = explode(' ', session()->get('prenom'));
        $initial2 = '';
        foreach ($nomSplitted as $part) {
            $initial2 .= strtoupper(substr($part, 0, 1));
        }



        $initia2 = $initial1 . $initial2;


        $birthDayDigits = preg_replace('/[^0-9]/', '', session()->get('date_nais'));

        $sum = array_sum(str_split($birthDayDigits));
        $niveau = session()->get('niveau');
        $annee = session()->get('annee');
        $id_fil = session()->get('filiere');
        $matricule = session()->get('matricule');


        $releve = new releve();


        $releve->id_releve = "000$sum/$initia2/$matricule/$niveau/FS/$id_fil/$annee";
        $releve->matricule = session()->get('matricule');
        $releve->annee_academique = session()->get('annee');
        $releve->credits_cap = $request->input('credits_cap');
        $releve->decision_rel = $request->input('decision_rel');
        $releve->filiere = session()->get('filiere');
        $releve->matricule = session()->get('matricule');
        $releve->moy_gen_pon = $request->input('mgp');




        $releve->save();


        for ($i=1; $i<=session()->get('nbUe'); $i++){

            $UeExist = ue::where(['id_ue' => $request->input('codeUE_'.$i)])->first();
             if (!$UeExist){
                 $ue = new ue();

                 $ue->id_ue = $request->input('codeUE_'.$i);
                 $ue->nom_ue = $request->input('ueName_'.$i);
                 $ue->credit = $request->input('credit_'.$i);
                 $ue->semestre = $request->input('semestre_'.$i);

                 $ue->save();
             }


             $note = new note();

             $note->moyenne = $request->input('moy_'.$i);
             $note->decision_note = $request->input('decision_'.$i);
             $note->mention = $request->input('mention_'.$i);

             $note->save();

             $appartenir = new appartenir();

             $appartenir->matricule = session()->get('matricule');
             $appartenir->ue = $request->input('codeUE_'.$i);
             $appartenir->id_note = $note->id;

             $appartenir->save();

             $regroupe = new regroupe();

             $regroupe->filiere = session()->get('filiere');
             $regroupe->niveau = session()->get('niveau');
             $regroupe->ue = $request->input('codeUE_'.$i);

             $regroupe->save();






        }

        return to_route('admin.view_releve_remp');









    }

    public function import_excel(Request $request)
    {

        $nom = $request->input('firstName');
        $prenom = $request->input('lastName');
        $matricule = $request->input('matricule');
//        $date_nais1 = $request->input('date_nais');
//        $lieu_nais = $request->input('lieu_nais');
//        $filiere = $request->input('filiere');
//        $niveau = $request->input('niveau');
//        $domaine = $request->input('domaine');
//        $annee = $request->input('annee');
//        $specialite = $request->input('specialite');
//        $nom_filiere = $request->input('nom_filiere');
//        $nbUe = $request->input('nbUe');

//        $date_nais = date('Y-m-d', strtotime($date_nais1));
        session()->put('nom', $nom);
        session()->put('prenom', $prenom);
        session()->put('matricule', $matricule);
//        session()->put('date_nais', $date_nais);
//        session()->put('lieu_nais', $lieu_nais);
//        session()->put('filiere', $filiere);
//        session()->put('annee', $annee);
//        session()->put('domaine', $domaine);
//        session()->put('niveau', $niveau);
//        session()->put('specialite', $specialite);
//        session()->put('nom_filiere', $nom_filiere);
//        session()->put('nbUe', $nbUe);


        $file = $request->file('excel_file');



        if ($file){
            $spreadsheet = IOFactory::load($file);


            $sheet = $spreadsheet->getActiveSheet();

            $isFirstRow = true;

            foreach ($sheet->getRowIterator() as $row){
                if ($isFirstRow) {
                    $isFirstRow = false;
                    continue;
                }

                $cellIterator = $row->getCellIterator();
                $cellIterator->setIterateOnlyExistingCells(false);

                $studentData = [];

                foreach ($cellIterator as $cell) {
                    $studentData[] = $cell->getValue();
                }

                $codeue = $studentData[0];
                $int_ue = $studentData[1];
                $semestre = $studentData[2];
                $credit = $studentData[3];
                $moy = $studentData[4];
                $mention = $studentData[5];
                $annee = $studentData[6];
                $decision = $studentData[7];


                if($codeue == null || $int_ue == null || $semestre == null || $credit == null){

                    return to_route('admin.ajout_excel')->with('error','fichier non valide veuillez le verifier');

                }


                if ($studentData[8] != ''){
                    $dec_fin = $studentData[8];
                }
                if ($studentData[9] != ''){
                    $mgp = $studentData[9];
                }
                if ($studentData[10] != ''){
                    $cre_cap = $studentData[10];
                }
                if ($studentData[11] != ''){
                    $date_nais = $studentData[11];
                }
                if ($studentData[12] != ''){
                    $lieu_nais = $studentData[12];
                }
                if ($studentData[13] != ''){
                    $domaine = $studentData[13];
                }
                if ($studentData[14] != ''){
                    $niveau = $studentData[14];
                }
                if ($studentData[15] != ''){
                    $specialite = $studentData[15];
                }
                if ($studentData[16] != ''){
                    $annee = $studentData[16];
                }
                if ($studentData[17] != ''){
                    $filiere = $studentData[17];
                }
                if ($studentData[18] != ''){
                    $nom_fil = $studentData[18];
                }
                if ($studentData[19] != ''){
                    $nb_ue = $studentData[19];
                }

                $EtuExist = etudiant::where(['matricule' => $matricule])->first();

                if ($date_nais && $lieu_nais && $domaine && $specialite && !$EtuExist){


                    $etudiant = new etudiant();
                    $etudiant->matricule = $matricule;
                    $etudiant->nom = $nom;
                    $etudiant->prenom = $prenom;
                    $etudiant->date_naissance = $date_nais;
                    $etudiant->lieu_naissance = $lieu_nais;
                    $etudiant->domaine = $domaine;
                    $etudiant->specialite = $specialite;

                    $etudiant->save();
                }

                $filiereExist = filere::where(['id_filiere' => $filiere])->first();

                if (!$filiereExist && $filiere && $nom_fil && $nb_ue){
                    $filiere->id_filiere = $filiere;
                    $filiere->nom_filiere = $nom_fil ;
                    $filiere->nb_matieres = $nb_ue;
                    $filiere->save();
                }


                if ($niveau && $annee && $filiere && $cre_cap && $dec_fin && $mgp){
                    $nomSplitted = explode(' ', session()->get('nom'));
                    $initial1 = '';
                    foreach ($nomSplitted as $part) {
                        $initial1 .= strtoupper(substr($part, 0, 1));
                    }


                    $nomSplitted = explode(' ', session()->get('prenom'));
                    $initial2 = '';
                    foreach ($nomSplitted as $part) {
                        $initial2 .= strtoupper(substr($part, 0, 1));
                    }



                    $initia2 = $initial1 . $initial2;


                    $birthDayDigits = preg_replace('/[^0-9]/', '', session()->get('date_nais'));

                    $sum = array_sum(str_split($birthDayDigits));
                    $niveau = $niveau;
                    $annee = $annee;
                    $id_fil = $filiere;
                    $matricule = session()->get('matricule');

                    $idr = "000$sum/$initia2/$matricule/$niveau/FS/$id_fil/$annee";


                    $releveExist = releve::where(['id_releve' => $idr])->first();


                    if (!$releveExist){
                        $releve = new releve();



                        $releve->id_releve =  "000$sum/$initia2/$matricule/$niveau/FS/$id_fil/$annee";
                        $releve->matricule = $matricule;
                        $releve->annee_academique = $annee;
                        $releve->credits_cap = $cre_cap;
                        $releve->decision_rel = $dec_fin;
                        $releve->filiere = $filiere;
                        $releve->matricule = $matricule;
                        $releve->moy_gen_pon = $mgp;




                        $releve->save();

                    }


                }

                $UeExist = ue::where(['id_ue' => $codeue])->first();
                if(!$UeExist){
                    $ue = new ue();

                    $ue->id_ue = $codeue;
                    $ue->nom_ue = $int_ue;
                    $ue->credit = $credit;
                    $ue->semestre = $semestre;

                    $ue->save();
                }


                $note = new note();

                $note->moyenne = $moy;
                $note->decision_note = $decision;
                $note->mention = $mention;

                $note->save();

                $appartenir = new appartenir();

                $appartenir->matricule = $matricule;
                $appartenir->ue = $codeue;
                $appartenir->id_note = $note->id;

                $appartenir->save();

                $regroupe = new regroupe();

                $regroupe->filiere = $filiere;
                $regroupe->niveau = $niveau;
                $regroupe->ue = $codeue;

                $regroupe->save();



            }


            return to_route('admin.view_releve_remp');
        }


    }





}
