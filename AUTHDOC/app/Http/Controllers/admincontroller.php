<?php

namespace App\Http\Controllers;

//require '../vendor/autoload.php';

use App\Http\Requests\signuprequest;
use App\Models\appartenir;
use App\Models\etudiant;
use App\Models\filere;
use App\Models\niveau;
use App\Models\note;
use App\Models\regroupe;
use App\Models\releve;
use App\Models\ue;
use App\Models\attestation;
use App\Models\Utilisateur;
use Aws\Textract\TextractClient;
use Google\Cloud\Vision\V1\ImageAnnotatorClient;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Smalot\PdfParser\Parser;
use Spatie\PdfToText\Pdf;
use thiagoalessio\TesseractOCR\TesseractOCR;

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
        $utilisateur->email = $request1['email2'];
        $utilisateur->password = Hash::make($request1['password']);
        $utilisateur->fonction = 'adm';

        $utilisateur->save();

        return to_route('admin.main')->with('success','administrateur ajouté');
    }

    public function adminUpdate(Request $request)
    {
        $requestData = $request->all();


        $id = $requestData['adminId'];
        $nom = $requestData['nom'];
        $prenom = $requestData['prenom'];
        $email = $requestData['email'];


        if ($id) {
            $utilisateur = Utilisateur::find($id);

            $utilisateur->nom = $nom;
            $utilisateur->prenom = $prenom;
            $utilisateur->email = $email;

            $utilisateur->save();

            return response()->json(['statut' => 200, 'message' => 'Success', 'data' => 'ok']);
        }else{
            return response()->json(['statut'=>408,'message'=>'Admin non ajouté']);

        }

    }

    function adminDelete(Request $request){
        $requestData = $request->all();


        $id = $requestData['adminId'];

        if ($id) {
            $utilisateur = Utilisateur::find($id);

            $utilisateur->delete();

            return response()->json(['statut' => 200, 'message' => 'Success', 'data' => 'Admin  supprimé']);
        }else{
            return response()->json(['statut'=>408,'message'=>'Admin non supprimé']);

        }

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


    public function ajout_manuel_attest(Request $request)
    {

        $filieres = filere::all();
        $etudiants = etudiant::all();
        return view('admin.ajout_manuel_attest',compact('filieres','etudiants'));
       

        
    }


    public function ajout_excel_attest()
    {
        $filieres = filere::all();
        return view('admin.ajout_excel_attest')->with(['filieres' => $filieres]);
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
        if (!$filiereExist) {
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
    
        $idr = "000$sum-$initia2-$matricule-$niveau-FS-$id_fil-$annee";
        $idA = "$initia2-$matricule-$niveau-FS-$id_fil-$annee";
    
        session()->put('id_releve', $idr);
        session()->put('id_attestation', $idA);
    
        $mgp = $request->input('mgp');
    
        if ($mgp == 4) {
            $mention = 'A';
        } elseif ($mgp >= 3.70 && $mgp < 4) {
            $mention = 'A-';
        } elseif ($mgp >= 3.30 && $mgp < 3.70) {
            $mention = 'B+';
        } elseif ($mgp >= 3 && $mgp < 3.30) {
            $mention = 'B';
        } elseif ($mgp >= 2.70 && $mgp < 3) {
            $mention = 'B-';
        } elseif ($mgp >= 2.30 && $mgp < 2.70) {
            $mention = 'C+';
        } elseif ($mgp >= 2 && $mgp < 2.30) {
            $mention = 'C';
        } else {
            $mention = 'D';
        }
    
        $releveExist = releve::where(['id_releve' => $idr])->first();
        $attestationExist = attestation::where(['id_attestation' => $idA])->first();
    
        if (!$releveExist) {
            if (!$attestationExist) {
                $attestation = new attestation();
                $attestation->id_attestation = $idA;
                $attestation->matricule = session()->get('matricule');
                $attestation->annee_academique = session()->get('annee');
                $attestation->filiere = session()->get('filiere');
                $attestation->moy_gen_pon = $request->input('mgp');
                $attestation->mention = $mention;
                $attestation->save();
            }
    
            $releve = new releve();
            $releve->id_releve = $idr;
            $releve->matricule = session()->get('matricule');
            $releve->annee_academique = session()->get('annee');
            $releve->credits_cap = $request->input('credits_cap');
            $releve->decision_rel = $request->input('decision_rel');
            $releve->filiere = session()->get('filiere');
            $releve->moy_gen_pon = $request->input('mgp');
            $releve->attestation = $idA;
            $releve->niveau = $niveau;
            $releve->save();
        } else {
            return to_route('admin.ajout_manuel')->with('error', 'Releve deja existant');
        }
    
        for ($i = 1; $i <= session()->get('nbUe'); $i++) {
            $UeExist = ue::where(['id_ue' => $request->input('codeUE_' . $i)])->first();
            if (!$UeExist) {
                $ue = new ue();
                $ue->id_ue = $request->input('codeUE_' . $i);
                $ue->nom_ue = $request->input('ueName_' . $i);
                $ue->credit = $request->input('credit_' . $i);
                $ue->semestre = $request->input('semestre_' . $i);
                $ue->save();
            }
    
            $note = new note();
            $note->moyenne = $request->input('moy_' . $i);
            $note->decision_note = $request->input('decision_' . $i);
            $note->mention = $request->input('mention_' . $i);
            $note->save();
    
            $appartenir = new appartenir();
            $appartenir->matricule = session()->get('matricule');
            $appartenir->ue = $request->input('codeUE_' . $i);
            $appartenir->id_note = $note->id;
            $appartenir->id_releve = $idr;
            $appartenir->save();
    
            $regroupe = new regroupe();
            $regroupe->filiere = session()->get('filiere');
            $regroupe->ue = $request->input('codeUE_' . $i);
            $regroupe->save();
        }
    
        return to_route('admin.view_releve_remp');
    }
    

    public function import_excel(Request $request)
    {
        $nom = $request->input('firstName');
        $prenom = $request->input('lastName');
        $matricule = $request->input('matricule');
    
        session()->put('nom', $nom);
        session()->put('prenom', $prenom);
        session()->put('matricule', $matricule);
    
        $file = $request->file('excel_file');
    
        if ($file) {
            $spreadsheet = IOFactory::load($file);
            $sheet = $spreadsheet->getActiveSheet();
    
            $isFirstRow = true;
    
            foreach ($sheet->getRowIterator() as $row) {
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
                    $anneeAca = $studentData[16];
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
    
                // Vérifier l'existence de l'étudiant
                $EtuExist = etudiant::where(['matricule' => $matricule])->first();
    
                if (isset($date_nais, $lieu_nais, $domaine, $specialite) && !$EtuExist) {
                    $etudiant = new etudiant();
                    $etudiant->matricule = $matricule;
                    $etudiant->nom = $nom;
                    $etudiant->prenom = $prenom;
                    $etudiant->date_naissance = $date_nais;
                    $etudiant->lieu_naissance = $lieu_nais;
                    $etudiant->domaine = $domaine;
                    $etudiant->specialite = $specialite;
                    $etudiant->save();
                    // dd($etudiant);
                }
    
                $filiereExist = filere::where(['id_filiere' => $filiere])->first();
    
                if (!$filiereExist && isset($filiere, $nom_fil, $nb_ue)) {
                    $Filiere = new filere();
                    $Filiere->id_filiere = $filiere;
                    $Filiere->nom_filiere = $nom_fil;
                    $Filiere->nb_matieres = $nb_ue;
                    $Filiere->save();
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
                $idr = "000$sum-$initia2-$matricule-$niveau-FS-$filiere-$anneeAca";
                $idA = "$initia2-$matricule-$niveau-FS-$filiere-$anneeAca";
    
                session()->put('id_releve', $idr);
                session()->put('id_attestation', $idA);
    
                // Vérifier si l'attestation existe déjà
                $attestationExist = attestation::where(['id_attestation' => $idA])->first();
    
                if (!$attestationExist) {
                    $attestation = new attestation();
                    $attestation->id_attestation = $idA;
                    $attestation->matricule = $matricule;
                    $attestation->annee_academique = $anneeAca;
                    $attestation->filiere = $filiere;
                    $attestation->moy_gen_pon = $mgp;
                    $attestation->mention = $mention;
                    $attestation->save();
                } else {
                    $attestation = $attestationExist;
                }
    
                $releveExist = releve::where(['id_releve' => $idr])->first();
    
                if (!$releveExist) {
                    $releve = new releve();
                    $releve->id_releve = $idr;
                    $releve->matricule = $matricule;
                    $releve->annee_academique = $anneeAca;
                    $releve->credits_cap = $cre_cap;
                    $releve->decision_rel = $dec_fin;
                    $releve->filiere = $filiere;
                    $releve->moy_gen_pon = $mgp;
                    $releve->attestation = $idA;
                    $releve->niveau = $niveau;
                    $releve->save();
                }
    
                $UeExist = ue::where(['id_ue' => $codeue])->first();
                if (!$UeExist) {
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
                $appartenir->id_releve = session()->get('id_releve');
                // dd($appartenir);
                $appartenir->save();
    
                $regroupe = new regroupe();
                $regroupe->filiere = $filiere;
                $regroupe->ue = $codeue;
                $regroupe->save();
            }
    
            return to_route('admin.view_releve_remp');
        }
    }
    


    public function scanqr(){

            return view('admin.scanqr');

    }

    public function qr(Request $request){


       
        $requestData = $request->all();


        $encodedData = $requestData['data'];

        $decryptedData = base64_decode(trim($encodedData));
        session()->put('decryptedData', $decryptedData);

        $datas=explode("?",$decryptedData);



        // $id_rel=$datas[0];
        // $nom=$datas[1];
        // $prenom=$datas[2];
        // $niveau=$datas[3];
        // $decision=$datas[4];
        // $filiere=$datas[5];
        // $mgp=$datas[6];
        // $matricule=$datas[8];

        $hmac = $datas[0];
        $matricule = $datas[1];
        $id_rel = $datas[2];

        
        // $name = etudiant::where(['nom'=>$nom]);
        // $surname = etudiant::where(['prenom'=>$prenom]);
        // $level = niveau::where(['nom_niveau'=>$niveau]);
        // $dec = releve::where(['decision_rel'=>$decision]);
        // $fil = releve::where(['id_filiere'=>$filiere]);
        // $moy = releve::where(['moy_gen_pon'=>$mgp]);
        $rel = releve::where(['id_releve'=>$id_rel]);
        $mat = etudiant::where(['matricule'=>$matricule]);

        if ($rel && $mat){


                if (!empty($id_rel)&&!empty($matricule)&&!empty($hmac)){

                    $hmackey= env('HMAC_KEY');
                    $releve=releve::select('releves.id_releve','releves.annee_academique','releves.credits_cap','releves.moy_gen_pon','releves.decision_rel','releves.filiere','releves.matricule')
                    ->where('releves.matricule', $matricule)
                    ->where('releves.id_releve', $id_rel)
                    ->first();
                    $resultats = appartenir::join('ues', 'appartenirs.ue', '=', 'ues.id_ue')
                        ->join('notes', 'appartenirs.id_note', '=', 'notes.id')
                        ->select('appartenirs.ue', 'ues.nom_ue', 'ues.credit', 'ues.semestre','ues.annee', 'notes.moyenne','notes.mention','notes.decision_note')
                        ->where('appartenirs.matricule', $matricule)
                        ->where('appartenirs.id_releve', $id_rel)
                        ->get();
                        $niv = niveau::select('niveaux.nom_niveau')
                        ->join('releves', 'niveaux.id_niveau', '=', 'releves.niveau')
                        ->join('etudiants', 'releves.matricule', '=', 'etudiants.matricule')
                        ->where('etudiants.matricule', $matricule)
                        ->where('releves.id_releve', $id_rel)
                        ->distinct()
                        ->first();
            
            
                    $etudiant=etudiant::where(['matricule'=>$matricule])->first();
            
            
            
                    $resultatsFormatted = '';
                    foreach ($resultats as $resultat) {
                        $resultatsFormatted .= trim($resultat->ue) . ',' . trim($resultat->nom_ue) . ',' . trim($resultat->credit) . ',' . trim($resultat->moyenne) . ',' . trim($resultat->mention) . ',' . trim($resultat->semestre) . ',' . trim($resultat->annee) . ',' . trim($resultat->decision_note) . ';';
                    }
            
                    $datacont = trim($releve->id_releve) . '?' . trim($etudiant->nom) . ' ' . trim($etudiant->prenom) . '?' . trim($niv->nom_niveau) . '?' . trim($releve->decision_rel) . '?' . trim($releve->filiere) . '?' . trim($releve->moy_gen_pon) . '?' . trim($resultatsFormatted) ;
                    $hmac2 = hash_hmac('sha256', $datacont, $hmackey);
                   
                  

                    if($hmac==$hmac2){
                        $DataSend=(['hmac'=>$hmac,'hmacInfo2'=>$hmac2]);

                        
                        return response()->json(['statut' => 200, 'message' => 'Success', 'data' => $DataSend]);
                    } 
                    else{
                        return response()->json(['statut'=>400,'message'=>'le haché ne correspond pas']);
                    }


                    




                }
                else{
                    return response()->json(['statut'=>401,'message'=>'Mauvais format du QR code']);
                }

        }
        else{
            return response()->json(['statut'=>402,'message'=>'Informations du QR non valide']);
        }
    }





    public function qr2(Request $request){


       
        $requestData = $request->all();


        $encodedData = $requestData['data'];

        $decryptedData = base64_decode(trim($encodedData));
        session()->put('decryptedData', $decryptedData);

        $datas=explode("?",$decryptedData);




        $hmac = $datas[0];
        $matricule = $datas[1];
        $idA = $datas[2];

        
     
        $att = attestation::where(['id_attestation'=>$idA]);
        $mat = etudiant::where(['matricule'=>$matricule]);

        if ($att && $mat){


                if (!empty($idA)&&!empty($matricule)&&!empty($hmac)){

                    $hmackey= env('HMAC_KEY');
                    $attestation = attestation::join('etudiants', 'etudiants.matricule', '=', 'attestations.matricule')
                    ->join('fileres','attestations.filiere','=','fileres.id_filiere')
                    ->where('etudiants.matricule', $matricule)
                    ->where('attestations.id_attestation',$idA)
                    ->select('attestations.id_attestation', 'etudiants.nom', 'etudiants.prenom', 'etudiants.matricule', 'etudiants.date_naissance','etudiants.lieu_naissance', 'etudiants.specialite','fileres.nom_filiere','attestations.mention','attestations.moy_gen_pon')
                    ->get();


                    $attestations = $attestation->first();
                   
                   
                    
                    $niv = niveau::select('niveaux.nom_niveau')
                    ->join('releves', 'niveaux.id_niveau', '=', 'releves.niveau')
                    ->join('etudiants', 'releves.matricule', '=', 'etudiants.matricule')
                    ->join('attestations', 'attestations.id_attestation', '=', 'releves.attestation')
                    ->where('etudiants.matricule', $matricule)
                    ->where('releves.attestation', $idA)
                    ->distinct()
                    ->first();
            
            
            
            
                    $datacont = trim($attestations->id_attestation) . '?' . trim($attestations->nom) . '?' . trim($attestations->prenom) . '?' . trim($niv->nom_niveau) . '?' . trim($attestations->mention) . '?' . trim($attestations->nom_filiere) . '?' . trim($attestations->moy_gen_pon) ;
                    // dd($datacont);
                    $hmac2 = hash_hmac('sha256', $datacont, $hmackey);
                    $encryptedData =$datacont . '?' . $matricule . '?' . $attestations->id_attestation;
                    $hmacInfo = trim($encryptedData);
                    session()->put('hmacInfo',$hmacInfo);


                    if($hmac==$hmac2){
                        $DataSend=(['hmac'=>$hmac,'hmacInfo2'=>$hmac2]);

                        
                        return response()->json(['statut' => 200, 'message' => 'Success', 'data' => $DataSend]);
                    } 
                    else{
                        return response()->json(['statut'=>400,'message'=>'le haché ne correspond pas']);
                    }


                    




                }
                else{
                    return response()->json(['statut'=>401,'message'=>'Mauvais format du QR code']);
                }

        }
        else{
            return response()->json(['statut'=>402,'message'=>'Informations du QR non valide']);
        }
    }


    public  function verification1(Request $request)
    {

        $hmackey= env('HMAC_KEY');
        $requestData = $request->all();
//        $encodedData = '458447?Atangana?jean pierre?Licence 3?ADMIS?ICT4D?3.4?authdoc2.0?21Q2529';
        $decryptedData = session()->get('decryptedData');
        $datas = explode("?", $decryptedData);

        // $id_rel = $datas[0];
        // $nom = $datas[1];
        // $prenom = $datas[2];
        // $niveau = $datas[3];
        // $decision = $datas[4];
        // $filiere = $datas[5];
        // $mgp = $datas[6];
        // $matricule = $datas[8];
        // $secondText = '';

        // // Vérification des informations du QR code dans la base de données
        // $rel = releve::where(['id_releve' => $id_rel])->first();
        // $name = etudiant::where(['nom' => $nom])->first();
        // $surname = etudiant::where(['prenom' => $prenom])->first();
        // $level = niveau::where(['nom_niveau' => $niveau])->first();
        // $dec = releve::where(['decision_rel' => $decision])->first();
        // $fil = releve::where(['filiere' => $filiere])->first();
        // $moy = releve::where(['moy_gen_pon' => $mgp])->first();
        // $mat = etudiant::where(['matricule' => $matricule])->first();

        $hmac = $datas[0];
        $matricule = $datas[1];
        $id_rel = $datas[2];

        $rel = releve::where(['id_releve'=>$id_rel]);
        $mat = etudiant::where(['matricule'=>$matricule]);


        if ($rel && $mat) {
            if (!empty($id_rel)&&!empty($matricule)&&!empty($hmac)) {
                // $releve = releve::where(['matricule' => $matricule])->first();
                // $resultats = appartenir::join('ues', 'appartenirs.ue', '=', 'ues.id_ue')
                //     ->join('notes', 'appartenirs.id_note', '=', 'notes.id')
                //     ->select('appartenirs.ue', 'ues.nom_ue', 'ues.credit', 'ues.semestre', 'notes.moyenne', 'notes.mention', 'notes.decision_note')
                //     ->where('appartenirs.matricule', $matricule)
                //     ->where('appartenirs.id_releve', $id_rel)
                //     ->get();
                // $niv = niveau::select('niveaux.nom_niveau')
                //     ->join('regroupes', 'niveaux.id_niveau', '=', 'regroupes.niveau')
                //     ->join('fileres', 'regroupes.filiere', '=', 'fileres.id_filiere')
                //     ->join('releves', 'fileres.id_filiere', '=', 'releves.filiere')
                //     ->join('etudiants', 'releves.matricule', '=', 'etudiants.matricule')
                //     ->where('etudiants.matricule', $matricule)
                //     ->first();
                // $etudiant = etudiant::where(['matricule' => $matricule])->first();

                // $DataSend = (['niv' => $niv, 'resultats' => $resultats, 'etudiant' => $etudiant, 'releve' => $releve, 'matricule' => $matricule]);


                $path = session()->get('image');

                if ($path) {

                    $filePath = storage_path('app/' . $path);
                    // Configuration du client Textract
                    $textract = new TextractClient([
                        'version' => 'latest',
                        'region' => env('AWS_REGION'),
                        'credentials' => [
                            'key' => env('AWS_ACCESS_KEY_ID'),
                            'secret' => env('AWS_SECRET_ACCESS_KEY'),
                        ],
                    ]);

                    // Lire le contenu de l'image
                    $fileContent = file_get_contents($filePath);


                        // Appel à Textract pour extraire le texte de l'image
                        $result = $textract->detectDocumentText([
                            'Document' => [
                                'Bytes' => $fileContent,
                            ],
                        ]);

                        // Récupérer le texte extrait
                        $extractedText = '';
                        foreach ($result['Blocks'] as $block) {
                            if ($block['BlockType'] == 'LINE') {
                                $extractedText .= $block['Text'] . PHP_EOL;
                            }


                        }


                //    dd($extractedText);
                        $studentInfo = [];


                        if (preg_match('/Noms et Prénoms:\s*(.*?)\s*Matricule/', $extractedText, $matches)) {
                            $studentInfo['nom_prenom'] = trim($matches[1]);

                        }


                        if (preg_match('/N° :\s*(.*?)\s*Noms et Prénoms:/', $extractedText, $matches)) {
                            $studentInfo['Id_releve'] = trim($matches[1]);
                            // dd($studentInfo['Id_releve']);
                        }

                        if (preg_match('/Matricule: \s*(.*?)\s*Surname and Name/', $extractedText, $matches)) {
                            $studentInfo['matricule'] = trim($matches[1]);
                        }

                        if (preg_match('/le: \s*(.*?)\s* A:/', $extractedText, $matches)) {
                            $studentInfo['Date_de_naissance'] = trim($matches[1]);
                        }

                        if (preg_match('/Filiere:\s*(.*?)\s*Niveau :/', $extractedText, $matches)) {
                            $studentInfo['Filiere'] = trim($matches[1]);
                        }

                        if (preg_match('/Niveau :\s*(.*?)\s*Discipline/', $extractedText, $matches)) {
                            $studentInfo['niveau'] = trim($matches[1]);
                        }

                        

                        if (preg_match('/Spécialité:\s*(.*?)\s*Academic Year/', $extractedText, $matches)) {
                            $studentInfo['Specialite'] = trim($matches[1]);
                        }

                        if (preg_match('/: \s*(.*?)\s*Decision:/', $extractedText, $matches)) {
                            $studentInfo['mgp'] = trim($matches[1]);
                        }

                        if (preg_match('/Decision:\s*(.*?)\s*Légende:/', $extractedText, $matches)) {
                            $studentInfo['decision'] = trim($matches[1]);
                        }

                        $pattern = '/
                            (?P<code_ue>\w+)\s+                                 # Code UE
                            (?P<intitule>.*?)\s{2,}                             # Intitulé de l\'UE
                            (?P<credit>\d+)\s+                                  # Crédit
                            (?P<note>\d+\.\d+|\d+)\s+                           # Note
                            (?P<mention>[A-Za-z\+\-]+)\s+                       # Mention
                            (?P<semestre>S\d+)\s+                               # Semestre
                            (?P<annee>\d+)\s+                                   # Année
                            (?P<decision>[A-Z]+)                                # Décision
                        /x';

                        preg_match_all($pattern, $extractedText, $matches, PREG_SET_ORDER);

                        $image_results = [];
                        foreach ($matches as $match) {
                            $image_results[] = [
                                'code_ue' =>trim($match['code_ue']),
                                'intitule' => trim($match['intitule']),
                                'credit' => trim($match['credit']),
                                'note' => trim($match['note']),
                                'mention' => trim($match['mention']),
                                'semestre' => trim($match['semestre']),
                                'annee' => trim($match['annee']),
                                'decision' => trim($match['decision'])
                            ];
                        }


                        // Concaténer les informations en une seule chaîne de caractères
                        $concatenated_results = '';
                        foreach ($image_results as $result) {
                            $concatenated_results .= implode(',', $result) . ';';
                        }

                        // Supprimer le dernier point-virgule si nécessaire
                        // $concatenated_results = rtrim($concatenated_results, ';');
                        // dd($concatenated_results);



                        $datacont = trim($studentInfo['Id_releve']) . '?' . trim($studentInfo['nom_prenom']) . '?' . trim($studentInfo['niveau']) . '?' . trim($studentInfo['decision']) . '?' . trim($studentInfo['Filiere']) . '?' . trim($studentInfo['mgp']) . '?' . trim($concatenated_results) ;
                        $hmac2 = hash_hmac('sha256', $datacont, $hmackey);
                        // dd($datacont);


//                dd($resultats,$pdf_results);
                        // Comparaison des informations
                        // $is_valid = true;
                        // $a = 0;
                        // foreach ($resultats as $result) {
                        //     $match_found = false;
                        //     foreach ($image_results as $image_result) {
                        //         if ($result->ue = $image_result['code_ue'] &&
                        //             $result->nom_ue = $image_result['intitule'] &&
                        //                 $result->credit = $image_result['credit'] &&
                        //                     $result->moyenne = $image_result['note'] &&
                        //                         $result->mention = $image_result['mention'] &&
                        //                             $result->semestre = $image_result['semestre'] &&
                        //                                 $result->decision_note = $image_result['decision']) {
                        //             $match_found = true;
                        //             break;
                        //         }

                        //     }

                        //     if (!$match_found) {
                        //         $is_valid = false;
                        //         break;
                        //     }
                        // }

                        // if ($studentInfo['matricule'] == $etudiant->matricule) {
                        //     $is_valid2 = true;
                        // }

                        $DataSend=(['hmac'=>$hmac,'hmacInfo2'=>$hmac2]);
                        if ($hmac==$hmac2) {
                            return response()->json(['statut' => 200, 'message' => 'Success', 'data' => $DataSend]);
                        } else {
                            return response()->json(['statut' => 408, 'message' => 'Les informations de l\'image et du QR code ne correspondent pas']);
                        }




            }else {
                return response()->json(['statut' => 408, 'message' => 'Informations du QR non valide']);
            }
        }
        }
    }

    public  function verification2(Request $request)
    {

//         $hmacKey = env('HMAC_KEY');
//         $requestData = $request->all();
// //        $encodedData = '458447?Atangana?jean pierre?Licence 3?ADMIS?ICT4D?3.4?authdoc2.0?21Q2529';
//         $encodedData = session()->get('encodedData');
//         $datas = explode("?", $encodedData);

//         $id_rel = $datas[0];
//         $nom = $datas[1];
//         $prenom = $datas[2];
//         $niveau = $datas[3];
//         $decision = $datas[4];
//         $filiere = $datas[5];
//         $mgp = $datas[6];
//         $matricule = $datas[8];
//         $secondText ='';

//         // Vérification des informations du QR code dans la base de données
//         $rel = releve::where(['id_releve' => $id_rel])->first();
//         $name = etudiant::where(['nom' => $nom])->first();
//         $surname = etudiant::where(['prenom' => $prenom])->first();
//         $level = niveau::where(['nom_niveau' => $niveau])->first();
//         $dec = releve::where(['decision_rel' => $decision])->first();
//         $fil = releve::where(['filiere' => $filiere])->first();
//         $moy = releve::where(['moy_gen_pon' => $mgp])->first();
//         $mat = etudiant::where(['matricule' => $matricule])->first();

        $hmackey= env('HMAC_KEY');
        $requestData = $request->all();
//        $encodedData = '458447?Atangana?jean pierre?Licence 3?ADMIS?ICT4D?3.4?authdoc2.0?21Q2529';
        $decryptedData = session()->get('decryptedData');
        $datas = explode("?", $decryptedData);
        $hmac = $datas[0];
        $matricule = $datas[1];
        $id_rel = $datas[2];

        $rel = releve::where(['id_releve'=>$id_rel]);
        $mat = etudiant::where(['matricule'=>$matricule]);

        if ($rel && $mat) {
            if (!empty($id_rel)&&!empty($matricule)&&!empty($hmac)) {
                // $releve = releve::where(['matricule' => $matricule])->first();
                // $resultats = appartenir::join('ues', 'appartenirs.ue', '=', 'ues.id_ue')
                //     ->join('notes', 'appartenirs.id_note', '=', 'notes.id')
                //     ->select('appartenirs.ue', 'ues.nom_ue', 'ues.credit', 'ues.semestre', 'notes.moyenne', 'notes.mention', 'notes.decision_note')
                //     ->where('appartenirs.matricule', $matricule)
                //     ->get();
                // $niv = niveau::select('niveaux.nom_niveau')
                //     ->join('regroupes', 'niveaux.id_niveau', '=', 'regroupes.niveau')
                //     ->join('fileres', 'regroupes.filiere', '=', 'fileres.id_filiere')
                //     ->join('releves', 'fileres.id_filiere', '=', 'releves.filiere')
                //     ->join('etudiants', 'releves.matricule', '=', 'etudiants.matricule')
                //     ->where('etudiants.matricule', $matricule)
                //     ->first();
                // $etudiant = etudiant::where(['matricule' => $matricule])->first();

                // $DataSend = (['niv' => $niv, 'resultats' => $resultats, 'etudiant' => $etudiant, 'releve' => $releve, 'matricule' => $matricule]);


                $parser = new Parser();

                $file = session()->get('file');

//                dd($file);

                // Extraire le texte du fichier PDF
                $pdf = $parser->parseFile(storage_path('app/' . $file));


                // Récupérer le texte extrait
                $extractedText = $pdf->getText();
                $hello = 'hello';

//                    dd($extractedText);
                session()->put('extractedText', $extractedText);
                $studentInfo = [];


                if (preg_match('/N° :\s*(.*?)\s*Noms et Prénoms:/', $extractedText, $matches)) {
                    $studentInfo['nom_prenom'] = trim($matches[1]);

                }



                if (preg_match('/TRANSCRIPT\s*(.*?)\s*N° :/', $extractedText, $matches)) {
                    $studentInfo['Id_releve'] = trim($matches[1]);
                }

                if (preg_match('/Surname and Name\s*(.*?)\s*Matricule:/', $extractedText, $matches)) {
                    $studentInfo['matricule'] = trim($matches[1]);

                }


                if (preg_match('/N° \s*(.*?)\s*Né/', $extractedText, $matches)) {
                    $studentInfo['Date_de_naissance'] = trim($matches[1]);
                }

                if (preg_match('/Level \s*(.*?)\s*Filiere:/', $extractedText, $matches)) {
                    $studentInfo['Filiere'] = trim($matches[1]);
                }

                if (preg_match('/ \s*(.*?)\s*Niveau/', $extractedText, $matches)) {
                    $studentInfo['niveau'] = trim($matches[1]);
                    // dd($studentInfo['niveau']);
                }

                

                if (preg_match('/Discipline\s*(.*?)\s*Spécialité:/', $extractedText, $matches)) {
                    $studentInfo['Specialite'] = trim($matches[1]);
                }

                if (preg_match('/:\s*(.*?)\s*Decision:/', $extractedText, $matches)) {
                    $studentInfo['mgp'] = trim($matches[1]);
                }

                if (preg_match('/Decision:\s*(.*?)\s*Légende:/', $extractedText, $matches)) {
                    $studentInfo['decision'] = trim($matches[1]);
                }


                $pattern = '/
                           (?P<code_ue>\w+)\t                                # Code UE
                            (?P<intitule>[^\t]+)\t                            # Intitulé de l\'UE (capture tout jusqu\'à la prochaine tabulation)
                            (?P<credit>\d+)\t                                 # Crédit
                            (?P<note>\d+\.\d+|\d+)\t                          # Note (peut être un nombre décimal ou entier)
                            (?P<mention>[A-Za-z\+\-]+)\t                      # Mention
                            (?P<semestre>S\d+)\t                              # Semestre
                            (?P<annee>\d+)\t                                  # Année
                            (?P<decision>[A-Z]+)                              # Décision
                        /x';

                preg_match_all($pattern, $extractedText, $matches, PREG_SET_ORDER);


                $pdf_results = [];
                foreach ($matches as $match) {
                    $pdf_results[] = [
                        'code_ue' => $match['code_ue'],
                        'intitule' => trim($match['intitule']),
                        'credit' => $match['credit'],
                        'note' => $match['note'],
                        'mention' => $match['mention'],
                        'semestre' => $match['semestre'],
                        'annee' => $match['annee'],
                        'decision' => $match['decision']
                    ];
                }


                // Concaténer les informations en une seule chaîne de caractères
                $concatenated_results = '';
                foreach ($pdf_results as $result) {
                    $concatenated_results .= implode(',', $result) . ';';
                }

                // Supprimer le dernier point-virgule si nécessaire
                // $concatenated_results = rtrim($concatenated_results, ';');
                // dd($concatenated_results);



                $datacont = trim($studentInfo['Id_releve']) . '?' . trim($studentInfo['nom_prenom']) . '?' . trim($studentInfo['niveau']) . '?' . trim($studentInfo['decision']) . '?' . trim($studentInfo['Filiere']) . '?' . trim($studentInfo['mgp']) . '?' . trim($concatenated_results) ;
                $hmac2 = hash_hmac('sha256', $datacont, $hmackey);
                // dd($datacont);



//               

                $DataSend=(['hmac'=>$hmac,'hmacInfo2'=>$hmac2]);
                if ($hmac==$hmac2) {
                    return response()->json(['statut' => 200, 'message' => 'Success', 'data' => $DataSend]);
                } else {
                    return response()->json(['statut' => 408, 'message' => 'Les informations du PDF et du QR code ne correspondent pas']);
                }
            } else {
                return response()->json(['statut' => 400, 'message' => 'Mauvais format du QR code']);
            }
        } else {
            return response()->json(['statut' => 408, 'message' => 'Informations du QR non valide']);
        }
    }


    /**
     * @throws GuzzleException
     */
    public function ocr(Request $request)
    {
        $ver = 'one';
        $method = 'continue';

       


        // Récupérer le fichier image du formulaire
        $image = $request->file('image');

        $path = $image->store('temp');
        session()->put('image', $path);

        // dd($image);

        // Vérifiez si une image a été téléchargée
        if (!$image) {
            return redirect()->back()->with('error', 'Veuillez sélectionner une image.');
        }

        $filePath = $image->path();

        // Configuration du client Textract
        $textract = new TextractClient([
            'version' => 'latest',
            'region' => env('AWS_REGION'),
            'credentials' => [
                'key' => env('AWS_ACCESS_KEY_ID'),
                'secret' => env('AWS_SECRET_ACCESS_KEY'),
            ],
        ]);

        
        // Lire le contenu de l'image
        $fileContent = file_get_contents($filePath);

        try {
            // Appel à Textract pour extraire le texte de l'image
            $result = $textract->detectDocumentText([
                'Document' => [
                    'Bytes' => $fileContent,
                ],
            ]);

            // Récupérer le texte extrait
            $extractedText = '';
            foreach ($result['Blocks'] as $block) {
                if ($block['BlockType'] == 'LINE') {
                    $extractedText .= $block['Text'] . PHP_EOL;
                }
            }
        //    dd($extractedText);

            $studentInfo = [];


            if (preg_match('/Noms et Prénoms:\s*(.*?)\s*Matricule/', $extractedText, $matches) ){
                $studentInfo['nom_prenom'] = trim($matches[1]);

            }



            if (preg_match('/N° :\s*(.*?)\s*Noms et Prénoms:/', $extractedText, $matches) ){
                $studentInfo['Id_releve'] = trim($matches[1]);
            }

            if (preg_match('/Matricule: \s*(.*?)\s*Surname and Name/', $extractedText, $matches) ){
                $studentInfo['matricule'] = trim($matches[1]);
            }

            if (preg_match('/le: \s*(.*?)\s*A:/', $extractedText, $matches) ){
                $studentInfo['Date_de_naissance'] = trim($matches[1]);
            }

            if (preg_match('/Filiere:\s*(.*?)\s*Niveau :/', $extractedText, $matches) ){
                $studentInfo['Filiere'] = trim($matches[1]);
            }

            if (preg_match('/Niveau :\s*(.*?)\s*Discipline/', $extractedText, $matches)) {
                $studentInfo['niveau'] = trim($matches[1]);
                // dd($studentInfo['niveau']);
            }


            if (preg_match('/Spécialité:\s*(.*?)\s*Academic Year/', $extractedText, $matches) ){
                $studentInfo['Specialite'] = trim($matches[1]);
            }

            if (preg_match('/: \s*(.*?)\s*Decision:/', $extractedText, $matches) ){
                $studentInfo['mgp'] = trim($matches[1]);
            }

            if (preg_match('/Decision:\s*(.*?)\s*Légende:/', $extractedText, $matches) ){
                $studentInfo['decision'] = trim($matches[1]);
                // dd($studentInfo['decision']);
            }

            $pattern = '/
                            (?P<code_ue>\w+)\s+                                 # Code UE
                            (?P<intitule>.*?)\s{2,}                             # Intitulé de l\'UE
                            (?P<credit>\d+)\s+                                  # Crédit
                            (?P<note>\d+\.\d+|\d+)\s+                           # Note
                            (?P<mention>[A-Za-z\+\-]+)\s+                       # Mention
                            (?P<semestre>S\d+)\s+                               # Semestre
                            (?P<annee>\d+)\s+                                   # Année
                            (?P<decision>[A-Z]+)                                # Décision
                        /x';

            preg_match_all($pattern, $extractedText, $matches, PREG_SET_ORDER);



            foreach ($matches as $match) {
                $results[] = [
                    'code_ue' => $match['code_ue'],
                    'intitule' => $match['intitule'],
                    'credit' => $match['credit'],
                    'note' => $match['note'],
                    'mention' => $match['mention'],
                    'semestre' => $match['semestre'],
                    'annee' => $match['annee'],
                    'decision' => $match['decision']
                ];
            }

            // dd($studentInfo);




          


            if ($studentInfo['nom_prenom'] && $studentInfo['Id_releve'] && $studentInfo['matricule'] && $studentInfo['Date_de_naissance'] && $studentInfo['niveau'] && $studentInfo['Filiere'] && $studentInfo['Specialite'] && $studentInfo['mgp'] && $studentInfo['decision'] ){
                return view('admin.scanqr',compact('studentInfo','results','extractedText','ver','method'));
            }

            // Afficher le texte extrait


        } catch (\Exception $e) {
        //    dd($studentInfo);
            return redirect()->back()->with('error', 'Une erreur s\'est produite lors de l\'extraction du texte Cela peut etre Due a cause de la mauvaise qualité de l\'image ou d\'un mauvais fichier entré en paramètre selectionner une autre image ou utiliser un pdf ' );
        }
    }

    public function getreleve(){
        return view('admin.scanqr');
    }

    public function ocr2( Request $request)
    {

        $ver = 'two';
        $method ='continue';
        $file = $request->file('file');
        $path = $file->store('temp');
        session()->put('file', $path);

        if ($file) {


            try {
                $mimeType = $file->getMimeType();
                if ($mimeType === 'application/pdf') {
                    $parser = new Parser();

                    // Extraire le texte du fichier PDF
                    $pdf = $parser->parseFile($file->path());



                    // Récupérer le texte extrait
                    $extractedText = $pdf->getText();
                    $hello = 'hello';

                //    dd($extractedText);
                    session()->put('extractedText', $extractedText);
                    $studentInfo = [];


                    if (preg_match('/N° :\s*(.*?)\s*Noms et Prénoms:/', $extractedText, $matches) ){
                        $studentInfo['nom_prenom'] = trim($matches[1]);

                    }



                    if (preg_match('/TRANSCRIPT\s*(.*?)\s*N° :/', $extractedText, $matches) ){
                        $studentInfo['Id_releve'] = trim($matches[1]);
                    }

                    if (preg_match('/Surname and Name\s*(.*?)\s*Matricule:/', $extractedText, $matches) ){
                        $studentInfo['matricule'] = trim($matches[1]);
                    }

                    if (preg_match('/N° \s*(.*?)\s*Né/', $extractedText, $matches) ){
                        $studentInfo['Date_de_naissance'] = trim($matches[1]);
                    }

                    if (preg_match('/Level \s*(.*?)\s*Filiere:/', $extractedText, $matches) ){
                        $studentInfo['Filiere'] = trim($matches[1]);
                    }

                    if (preg_match('/ \s*(.*?)\s*Niveau/', $extractedText, $matches)) {
                        $studentInfo['niveau'] = trim($matches[1]);
                        // dd($studentInfo['niveau']);
                    }

                    if (preg_match('/Discipline\s*(.*?)\s*Spécialité:/', $extractedText, $matches) ){
                        $studentInfo['Specialite'] = trim($matches[1]);
                    }

                    if (preg_match('/:\s*(.*?)\s*Decision:/', $extractedText, $matches) ){
                        $studentInfo['mgp'] = trim($matches[1]);
                    }

                    if (preg_match('/Decision:\s*(.*?)\s*Légende:/', $extractedText, $matches) ){
                        $studentInfo['decision'] = trim($matches[1]);
                    }

                    $pattern = '/
                           (?P<code_ue>\w+)\t                                # Code UE
                            (?P<intitule>[^\t]+)\t                            # Intitulé de l\'UE (capture tout jusqu\'à la prochaine tabulation)
                            (?P<credit>\d+)\t                                 # Crédit
                            (?P<note>\d+\.\d+|\d+)\t                          # Note (peut être un nombre décimal ou entier)
                            (?P<mention>[A-Za-z\+\-]+)\t                      # Mention
                            (?P<semestre>S\d+)\t                              # Semestre
                            (?P<annee>\d+)\t                                  # Année
                            (?P<decision>[A-Z]+)                              # Décision
                        /x';

                    preg_match_all($pattern, $extractedText, $matches, PREG_SET_ORDER);


                    $results = [];

                    foreach ($matches as $match) {
                        $results[] = [
                            'code_ue' => $match['code_ue'],
                            'intitule' => trim($match['intitule']),
                            'credit' => $match['credit'],
                            'note' => $match['note'],
                            'mention' => $match['mention'],
                            'semestre' => $match['semestre'],
                            'annee' => $match['annee'],
                            'decision' => $match['decision']
                        ];
                    }
//                    dd($results);

//                    dd($studentInfo);


                    //session()->put('extractedText', $extractedText);


                    if ($studentInfo['nom_prenom'] && $studentInfo['Id_releve'] && $studentInfo['matricule'] && $studentInfo['Date_de_naissance'] && $studentInfo['Filiere'] && $studentInfo['niveau'] && $studentInfo['Specialite'] && $studentInfo['mgp'] && $studentInfo['decision'] ){

                        return view('admin.scanqr',compact('studentInfo','results','extractedText','method','ver'));
                    }

                } else {
                    return redirect()->route('admin.scan')->with('error', 'Le fichier doit etre sous format pdf');
                }

            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Une erreur s\'est produite lors de l\'extraction du texte ' . $e->getMessage());
            }
        }else {
            return redirect()->back()->with('error', 'choisissez le fichier');
        }
    }





    public function ocrattestation( Request $request)
    {

        $ver = 'two';
        $method ='continue';
        $file = $request->file('file');
        $path = $file->store('temp');
        session()->put('file', $path);

        if ($file) {


            try {
                $mimeType = $file->getMimeType();
                if ($mimeType === 'application/pdf') {
                    $parser = new Parser();

                    // Extraire le texte du fichier PDF
                    $pdf = $parser->parseFile($file->path());



                    // Récupérer le texte extrait
                    $extractedText = $pdf->getText();
                    $hello = 'hello';

                   dd($extractedText);
                    session()->put('extractedText', $extractedText);
                    $studentInfo = [];


                    if (preg_match('/Mlle\s*(.*?)\s*Né(e)/', $extractedText, $matches) ){
                        $studentInfo['nom_prenom'] = trim($matches[1]);

                    }



                    if (preg_match('/TRANSCRIPT\s*(.*?)\s*N° :/', $extractedText, $matches) ){
                        $studentInfo['Id_attestation'] = trim($matches[1]);
                    }

                    // if (preg_match('/Surname and Name\s*(.*?)\s*Matricule:/', $extractedText, $matches) ){
                    //     $studentInfo['matricule'] = trim($matches[1]);
                    // }

                    if (preg_match('/N° \s*(.*?)\s*Né/', $extractedText, $matches) ){
                        $studentInfo['Date_de_naissance'] = trim($matches[1]);
                    }

                    if (preg_match('/Level \s*(.*?)\s*Filiere:/', $extractedText, $matches) ){
                        $studentInfo['Filiere'] = trim($matches[1]);
                    }

                    if (preg_match('/ \s*(.*?)\s*Niveau/', $extractedText, $matches)) {
                        $studentInfo['niveau'] = trim($matches[1]);
                        // dd($studentInfo['niveau']);
                    }

                    if (preg_match('/Discipline\s*(.*?)\s*Spécialité:/', $extractedText, $matches) ){
                        $studentInfo['Specialite'] = trim($matches[1]);
                    }

                    if (preg_match('/:\s*(.*?)\s*Decision:/', $extractedText, $matches) ){
                        $studentInfo['mgp'] = trim($matches[1]);
                    }

                    if (preg_match('/Decision:\s*(.*?)\s*Légende:/', $extractedText, $matches) ){
                        $studentInfo['decision'] = trim($matches[1]);
                    }

                    $pattern = '/
                           (?P<code_ue>\w+)\t                                # Code UE
                            (?P<intitule>[^\t]+)\t                            # Intitulé de l\'UE (capture tout jusqu\'à la prochaine tabulation)
                            (?P<credit>\d+)\t                                 # Crédit
                            (?P<note>\d+\.\d+|\d+)\t                          # Note (peut être un nombre décimal ou entier)
                            (?P<mention>[A-Za-z\+\-]+)\t                      # Mention
                            (?P<semestre>S\d+)\t                              # Semestre
                            (?P<annee>\d+)\t                                  # Année
                            (?P<decision>[A-Z]+)                              # Décision
                        /x';

                    preg_match_all($pattern, $extractedText, $matches, PREG_SET_ORDER);


                    $results = [];

                    foreach ($matches as $match) {
                        $results[] = [
                            'code_ue' => $match['code_ue'],
                            'intitule' => trim($match['intitule']),
                            'credit' => $match['credit'],
                            'note' => $match['note'],
                            'mention' => $match['mention'],
                            'semestre' => $match['semestre'],
                            'annee' => $match['annee'],
                            'decision' => $match['decision']
                        ];
                    }
//                    dd($results);

//                    dd($studentInfo);


                    //session()->put('extractedText', $extractedText);


                    if ($studentInfo['nom_prenom'] && $studentInfo['Id_releve'] && $studentInfo['matricule'] && $studentInfo['Date_de_naissance'] && $studentInfo['Filiere'] && $studentInfo['niveau'] && $studentInfo['Specialite'] && $studentInfo['mgp'] && $studentInfo['decision'] ){

                        return view('admin.scanqr',compact('studentInfo','results','extractedText','method','ver'));
                    }

                } else {
                    return redirect()->route('admin.scan')->with('error', 'Le fichier doit etre sous format pdf');
                }

            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Une erreur s\'est produite lors de l\'extraction du texte ' . $e->getMessage());
            }
        }else {
            return redirect()->back()->with('error', 'choisissez le fichier');
        }
    }







    public function scan(){

            $method=null;
            $ver= null;


            return view('admin.scanqr', compact('method','ver'));


    }

    public function scanAttestation(){
        $method=null;
        $ver= null;


        return view('admin.scanqr2', compact('method','ver'));

       


    }

    public function continuescan(){

        $method='continue';
        $ver= null;

        return view('admin.scanqr', compact('method','ver'));


    }


    public function continuescan2(){

        $method='continue';
        $ver= null;

        return view('admin.scanqr2', compact('method','ver'));


    }

   






}
