<?php

namespace App\Http\Controllers;

use App\Models\appartenir;
use App\Models\etudiant;
use App\Models\niveau;
use App\Models\releve;
use App\Models\attestation;
use Barryvdh\DomPDF\Facade\Pdf;
use Barryvdh\Snappy\Facades\SnappyPdf;
use Illuminate\Http\Request;

class pdfController extends Controller
{
    public function genererPDF()
    {
      $hmackey=env('HMAC_KEY');
        $method='afficherel';


        $matricule =  session()->get('matricule');
        $id_releve =session()->get('id_releve');
  
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


   
//        $pdf = SnappyPdf::loadView('admin.releve_partial', compact('hmacInfo',  'resultats','releve','etudiant','niv'));
//
//
//        return $pdf->download('resultats.pdf');


    return Pdf::loadView('admin.releve_partial',compact('hmacInfo',  'resultats','releve','etudiant','niv') )->download('releve.pdf');
    }



    public function genererPDF2()
    {
        $hmackey=env('HMAC_KEY');





        $matricule=session()->get('matricule');
        $idA = session()->get('idA');





        $hmackey=env('HMAC_KEY');
        $method='afficheAttes';



    

        session()->put('idA',$idA);

        $attestation = attestation::join('etudiants', 'etudiants.matricule', '=', 'attestations.matricule')
        ->join('fileres','attestations.filiere','=','fileres.id_filiere')
        ->where('etudiants.matricule', $matricule)
        ->where('attestations.id_attestation',$idA)
        ->select('attestations.id_attestation', 'etudiants.nom', 'etudiants.prenom', 'etudiants.matricule', 'etudiants.date_naissance','etudiants.lieu_naissance', 'etudiants.specialite','fileres.nom_filiere','attestations.mention','attestations.moy_gen_pon')
        ->get();


        $attestations = $attestation->first();


        $mgp=$attestations->moy_gen_pon;
        
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
          } elseif ($mgp >=2.30 && $mgp < 2.70) {
            $mention = 'C+';
          } elseif ($mgp >= 2 && $mgp < 2.30) {
            $mention = 'C';
          }

            
          $niv = niveau::select('niveaux.nom_niveau')
          ->join('releves', 'niveaux.id_niveau', '=', 'releves.niveau')
          ->join('etudiants', 'releves.matricule', '=', 'etudiants.matricule')
          ->join('attestations', 'attestations.id_attestation', '=', 'releves.attestation')
          ->where('etudiants.matricule', $matricule)
          ->where('releves.attestation', $idA)
          ->distinct()
          ->first();


        $etudiant=etudiant::where(['matricule'=>$matricule])->first();





        $datacont = trim($attestations->id_attestation) . '?' . trim($attestations->nom) . '?' . trim($attestations->prenom) . '?' . trim($niv->nom_niveau) . '?' . trim($attestations->mention) . '?' . trim($attestations->nom_filiere) . '?' . trim($attestations->moy_gen_pon) ;
        $hmac = hash_hmac('sha256', $datacont, $hmackey);
        $encryptedData =$hmac . '?' . $matricule . '?' . $attestations->id_attestation;
        $hmacInfo = base64_encode(trim($encryptedData));
        session()->put('hmacInfo',$hmacInfo);

        session()->put('hm',$hmacInfo);
        session()->put('rs',$attestations);


          



    return Pdf::loadView('admin.attestation_partial',compact('mention','attestations','hmacInfo','niv') )->download('attestation.pdf');
    }
}
