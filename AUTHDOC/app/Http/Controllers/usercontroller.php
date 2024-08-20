<?php

namespace App\Http\Controllers;



use App\Models\appartenir;
use App\Models\etudiant;
use App\Models\niveau;
use Illuminate\Http\Request;
use App\Models\releve;

class usercontroller extends Controller
{
    public function user()
    {
        return view('user.main');
    }


    public function userAttestation()
    {
        return view('user.user_attestation');
    }

    public function userPost(Request $request)
    {
        $method= null;
        $mat=$request->input('matricule');
        session()->put('matricule',$mat);
        $releves = releve::join('etudiants', 'releves.matricule', '=', 'etudiants.matricule')
            ->join('appartenirs', 'releves.id_releve', '=', 'appartenirs.id_releve')
            ->select('releves.id_releve', 'releves.matricule', 'etudiants.nom', 'etudiants.prenom')
            ->distinct()
            ->where('etudiants.matricule','=',$mat)
            ->get();

        return view('user.releve_util',compact('mat','releves','method'));
    }


    public function vieWRelUti(Request $request,string $mat,string $idR)
    {


        $hmackey=env('HMAC_KEY');
        $method='afficherel';



        $matricule =   $mat;
        $id_releve = $idR;

        session()->put('matricule',$matricule);



        $releve=releve::where(['matricule'=>$matricule])->first();
        $resultats = appartenir::join('ues', 'appartenirs.ue', '=', 'ues.id_ue')
            ->join('notes', 'appartenirs.id_note', '=', 'notes.id')
            ->select('appartenirs.ue', 'ues.nom_ue', 'ues.credit', 'ues.semestre', 'notes.moyenne','notes.mention','notes.decision_note')
            ->where('appartenirs.matricule', $matricule)
            ->where('appartenirs.id_releve', $id_releve)
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


            return view('user.releve_util', compact('hmacInfo',  'method','resultats','releve','etudiant','niv'));

        
    }


}
