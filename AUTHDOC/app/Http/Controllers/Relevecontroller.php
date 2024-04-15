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
        $etudiants= releve::all();


        return view('admin.releve' ,compact('etudiants','method'));
    }

    public function view_releve(Request $request)
    {

        $hmackey=env('HMAC_KEY');
        $method='afficherel';


        $matricule =   $request->input('matricule');

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



        $datacont = trim($releve->id_releve) . '?' . trim($etudiant->nom) . '?' . trim($etudiant->prenom) . '?' . trim($niv->nom_niveau) . '?' . trim($releve->decision_rel) . '?' . trim($releve->filiere) . '?' . trim($releve->moy_gen_pon);
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



        $datacont = trim($releve->id_releve) . '?' . trim($etudiant->nom) . '?' . trim($etudiant->prenom) . '?' . trim($niv->nom_niveau) . '?' . trim($releve->decision_rel) . '?' . trim($releve->filiere) . '?' . trim($releve->moy_gen_pon);
//        $hmac = hash_hmac('sha256', $datacont, $hmackey);
        $encryptedData =$datacont . '?' . $hmackey . '?' . $matricule;
        $hmacInfo = base64_encode(trim($encryptedData));


        return view('admin.releve', compact('hmacInfo',  'method','resultats','releve','etudiant','niv'));






    }





}

