<?php

namespace App\Http\Controllers;

use App\Models\appartenir;
use App\Models\etudiant;
use App\Models\niveau;
use App\Models\releve;
use Dotenv\Util\Str;
use Illuminate\Http\Request;

class   Relevecontroller extends Controller
{

    public function releve()
    {
        $method='search';
        return view('admin.releve' ,compact('method'));
    }


    public function relevesSeach(Request $request)
    {
        $method = null;
        $mat=$request->input('matricule');
        session()->put('matricule',$mat);
        $releves = releve::join('etudiants', 'releves.matricule', '=', 'etudiants.matricule')
            ->join('appartenirs', 'releves.id_releve', '=', 'appartenirs.id_releve')
            ->select('releves.id_releve', 'releves.matricule', 'etudiants.nom', 'etudiants.prenom')
            ->distinct()
            ->where('etudiants.matricule','=',$mat)
            ->get();
        

        return view('admin.releve' ,compact('releves','method'));
    }





    public function view_releve(Request $request,string $mat,string $idR)
    {

        $hmackey=env('HMAC_KEY');
        $method='afficherel';



        $matricule =   $mat;
        $id_releve = $idR;

        session()->put('matricule',$matricule);
        session()->put('id_releve',$id_releve);



        $releve=releve::select('releves.id_releve','releves.annee_academique','releves.credits_cap','releves.moy_gen_pon','releves.decision_rel','releves.filiere','releves.matricule')
        ->where('releves.matricule', $matricule)
        ->where('releves.id_releve', $id_releve)
        ->first();
        $resultats = appartenir::join('ues', 'appartenirs.ue', '=', 'ues.id_ue')
            ->join('notes', 'appartenirs.id_note', '=', 'notes.id')
            ->select('appartenirs.ue', 'ues.nom_ue', 'ues.credit', 'ues.semestre','ues.annee', 'notes.moyenne','notes.mention','notes.decision_note')
            ->where('appartenirs.matricule', $matricule)
            ->where('appartenirs.id_releve', $id_releve)
            ->get();
        $niv = niveau::select('niveaux.nom_niveau')
            ->join('releves', 'niveaux.id_niveau', '=', 'releves.niveau')
            ->join('etudiants', 'releves.matricule', '=', 'etudiants.matricule')
            ->where('etudiants.matricule', $matricule)
            ->where('releves.id_releve', $id_releve)
            ->distinct()
            ->first();


        $etudiant=etudiant::where(['matricule'=>$matricule])->first();



        $resultatsFormatted = '';
        foreach ($resultats as $resultat) {
            $resultatsFormatted .= trim($resultat->ue) . ',' . trim($resultat->nom_ue) . ',' . trim($resultat->credit) . ',' . trim($resultat->moyenne) . ',' . trim($resultat->mention) . ',' . trim($resultat->semestre) . ',' . trim($resultat->annee) . ',' . trim($resultat->decision_note) . ';';
        }

        $datacont = trim($releve->id_releve) . '?' . trim($etudiant->nom) . ' ' . trim($etudiant->prenom) . '?' . trim($niv->nom_niveau) . '?' . trim($releve->decision_rel) . '?' . trim($releve->filiere) . '?' . trim($releve->moy_gen_pon) . '?' . trim($resultatsFormatted) ;
        // dd($datacont);
        $hmac = hash_hmac('sha256', $datacont, $hmackey);
       
        $encryptedData = $hmac . '?' . $matricule . '?' . $releve->id_releve;
        // dd($encryptedData);
        $hmacInfo = base64_encode(trim($encryptedData));
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
        $id_releve =  session()->get('id_releve') ;

        $releve=releve::select('releves.id_releve','releves.annee_academique','releves.credits_cap','releves.moy_gen_pon','releves.decision_rel','releves.filiere','releves.matricule')
        ->where('releves.matricule', $matricule)
        ->where('releves.id_releve', $id_releve)
        ->first();
        $resultats = appartenir::join('ues', 'appartenirs.ue', '=', 'ues.id_ue')
            ->join('notes', 'appartenirs.id_note', '=', 'notes.id')
            ->select('appartenirs.ue', 'ues.nom_ue', 'ues.credit', 'ues.semestre', 'ues.annee', 'notes.moyenne','notes.mention','notes.decision_note')
            ->where('appartenirs.matricule', $matricule)
            ->where('appartenirs.id_releve', $id_releve)
            ->get();
            $niv = niveau::select('niveaux.nom_niveau')
            ->join('releves', 'niveaux.id_niveau', '=', 'releves.niveau')
            ->join('etudiants', 'releves.matricule', '=', 'etudiants.matricule')
            ->where('etudiants.matricule', $matricule)
            ->where('releves.id_releve', $id_releve)
            ->distinct()
            ->first();


        $etudiant=etudiant::where(['matricule'=>$matricule])->first();



        $resultatsFormatted = '';
        foreach ($resultats as $resultat) {
            $resultatsFormatted .= trim($resultat->ue) . ',' . trim($resultat->nom_ue) . ',' . trim($resultat->credit) . ',' . trim($resultat->moyenne) . ',' . trim($resultat->mention) . ',' . trim($resultat->semestre) . ',' . trim($resultat->annee) . ',' . trim($resultat->decision_note) . ';';
        }

        $datacont = trim($releve->id_releve) . '?' . trim($etudiant->nom) . ' ' . trim($etudiant->prenom) . '?' . trim($niv->nom_niveau) . '?' . trim($releve->decision_rel) . '?' . trim($releve->filiere) . '?' . trim($releve->moy_gen_pon) . '?' . trim($resultatsFormatted) ;
        // dd($datacont);
        $hmac = hash_hmac('sha256', $datacont, $hmackey);
       
        $encryptedData = $hmac . '?' . $matricule . '?' . $releve->id_releve;
        // dd($encryptedData);
        $hmacInfo = base64_encode(trim($encryptedData));
            session()->put('hmacInfo',$hmacInfo);

            session()->put('hm',$hmacInfo);
            session()->put('rs',$resultats);


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

