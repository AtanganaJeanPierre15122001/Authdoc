<?php

namespace App\Http\Controllers;

use App\Models\appartenir;
use App\Models\etudiant;
use App\Models\releve;
use Illuminate\Http\Request;

class Relevecontroller extends Controller
{

    public function releve()
    {
        $method=null;
        $etudiants= etudiant::all();


        return view('admin.releve' ,compact('etudiants','method'));
    }

    public function view_releve(Request $request)
    {

        $hmackey=env('HMAC_KEY');
        $method='afficherel';

        $matricule = $request->input('matricule');
        $releve=releve::where(['matricule'=>$matricule])->first();
        $resultats = appartenir::join('ues', 'appartenirs.ue', '=', 'ues.id_ue')
            ->join('notes', 'appartenirs.id_note', '=', 'notes.id')
            ->select('appartenirs.ue', 'ues.nom_ue', 'ues.credit', 'ues.semestre', 'notes.moyenne','notes.mention','notes.decision_note')
            ->where('appartenirs.matricule', $matricule)
            ->get();


        $etudiant=etudiant::where(['matricule'=>$matricule])->first();



            $datacont = trim($releve->id_releve) . '?' . trim($etudiant->nom) . '?' . trim($etudiant->prenom) . '?' . trim($releve->decision_rel) . '?' . trim($releve->filiere) . '?' . trim($releve->moy_gen_pon);
            $hmac = hash_hmac('sha256', $datacont, $hmackey);
            $encryptedData = $hmac . '?' . $matricule;
            $hmacInfo = base64_encode(trim($encryptedData));


            return view('admin.releve', compact('hmacInfo',  'method','resultats','releve','etudiant'));






    }



}
