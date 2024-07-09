<?php

namespace App\Http\Controllers;

use App\Models\appartenir;
use App\Models\etudiant;
use App\Models\niveau;
use App\Models\releve;
use Illuminate\Http\Request;

class   Relevecontroller extends Controller
{

    public function releve()
    {
        $method=null;
        $etudiants= etudiant::all();
        $releves = releve::join('etudiants', 'releves.matricule', '=', 'etudiants.matricule')
            ->select('releves.id_releve', 'releves.matricule', 'etudiants.nom', 'etudiants.prenom')
            ->get();
            
           

        return view('admin.releve' ,compact('releves','method'));
    }

    public function view_releve(Request $request,string $mat)
    {

        $hmackey=env('HMAC_KEY');
        $method='afficherel';



        $matricule =   $mat;

        session()->put('matricule',$matricule);



        $releve=releve::where(['matricule'=>$matricule])->first();
        $resultats = appartenir::join('ues', 'appartenirs.ue', '=', 'ues.id_ue')
            ->join('notes', 'appartenirs.id_note', '=', 'notes.id')
            ->select('appartenirs.ue', 'ues.nom_ue', 'ues.credit', 'ues.semestre', 'notes.moyenne','notes.mention','notes.decision_note')
            ->where('appartenirs.matricule', $matricule)
            ->get();
        $niv = niveau::select('niveaux.nom_niveau')
            ->join('regroupes', 'niveaux.id_niveau', '=', 'regroupes.niveau')
            ->join('fileres', 'regroupes.filiere', '=', 'fileres.id_filiere')
            ->join('releves', 'fileres.id_filiere', '=', 'releves.filiere')
            ->join('etudiants', 'releves.matricule', '=', 'etudiants.matricule')
            ->where('etudiants.matricule', $matricule)
            ->first();


        $etudiant=etudiant::where(['matricule'=>$matricule])->first();



        $resultatsFormatted = '';
        foreach ($resultats as $resultat) {
            $resultatsFormatted .= trim($resultat->ue) . ',' . trim($resultat->nom_ue) . ',' . trim($resultat->credit) . ',' . trim($resultat->moyenne) . ',' . trim($resultat->mention) . ',' . trim($resultat->semestre) . ',' . trim($resultat->decision_note) . ';';
        }

        $datacont = trim($releve->id_releve) . '?' . trim($etudiant->nom) . '?' . trim($etudiant->prenom) . '?' . trim($niv->nom_niveau) . '?' . trim($releve->decision_rel) . '?' . trim($releve->filiere) . '?' . trim($releve->moy_gen_pon) ;
//        $hmac = hash_hmac('sha256', $datacont, $hmackey);
        $encryptedData =$datacont . '?' . $hmackey . '?' . $matricule;
        $hmacInfo = trim($encryptedData);
            session()->put('hmacInfo',$hmacInfo);

            session()->put('hm',$hmacInfo);
            session()->put('rs',$resultats);


            return view('admin.releve', compact('hmacInfo',  'method','resultats','releve','etudiant','niv'));







    }


    public function view_releve_remp(Request $request)
    {

        $hmackey=env('HMAC_KEY');
        $method='afficherel';


        $matricule =  session()->get('matricule') ;

        $releve=releve::where(['matricule'=>$matricule])->first();
        $resultats = appartenir::join('ues', 'appartenirs.ue', '=', 'ues.id_ue')
            ->join('notes', 'appartenirs.id_note', '=', 'notes.id')
            ->select('appartenirs.ue', 'ues.nom_ue', 'ues.credit', 'ues.semestre', 'notes.moyenne','notes.mention','notes.decision_note')
            ->where('appartenirs.matricule', $matricule)
            ->get();
        $niv = niveau::select('niveaux.nom_niveau')
            ->join('regroupes', 'niveaux.id_niveau', '=', 'regroupes.niveau')
            ->join('fileres', 'regroupes.filiere', '=', 'fileres.id_filiere')
            ->join('releves', 'fileres.id_filiere', '=', 'releves.filiere')
            ->join('etudiants', 'releves.matricule', '=', 'etudiants.matricule')
            ->where('etudiants.matricule', $matricule)
            ->first();


        $etudiant=etudiant::where(['matricule'=>$matricule])->first();



        $resultatsFormatted = '';
        foreach ($resultats as $resultat) {
            $resultatsFormatted .= trim($resultat->ue) . ',' . trim($resultat->nom_ue) . ',' . trim($resultat->credit) . ',' . trim($resultat->moyenne) . ',' . trim($resultat->mention) . ',' . trim($resultat->semestre) . ',' . trim($resultat->decision_note) . ';';
        }

        $datacont = trim($releve->id_releve) . '?' . trim($etudiant->nom) . '?' . trim($etudiant->prenom) . '?' . trim($niv->nom_niveau) . '?' . trim($releve->decision_rel) . '?' . trim($releve->filiere) . '?' . trim($releve->moy_gen_pon) ;
//        $hmac = hash_hmac('sha256', $datacont, $hmackey);
        $encryptedData =$datacont . '?' . $hmackey . '?' . $matricule;
        $hmacInfo = base64_encode(trim($encryptedData));


        return view('admin.releve', compact('hmacInfo',  'method','resultats','releve','etudiant','niv'));






    }


    function releve_delete(Request $request){
        $requestData = $request->all();


        $relId = $requestData['relId'];

        if ($relId) {
            $releve = releve::find($relId);

            $releve->delete();

            return response()->json(['statut' => 200, 'message' => 'Success', 'data' => 'Releve  supprimé']);
        }else{
            return response()->json(['statut'=>408,'message'=>'Releve non supprimé']);

        }

    }





}

