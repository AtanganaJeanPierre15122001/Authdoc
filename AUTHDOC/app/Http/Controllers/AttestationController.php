<?php

namespace App\Http\Controllers;


use App\Models\appartenir;
use App\Models\etudiant;
use App\Models\niveau;
use App\Models\attestation;
use Illuminate\Http\Request;

class AttestationController extends Controller
{
    public function attestation()
    {

        $method = 'search';

        return view('admin.attestation',compact('method'));
       
    }


    public function attestationSearch(Request $request)
    {

        $method = null;
        $mat=$request->input('matricule');
        session()->put('matricule',$mat);
        $attestations = attestation::join('etudiants', 'etudiants.matricule', '=', 'attestations.matricule')
        ->where('etudiants.matricule', $mat)
        ->select('attestations.id_attestation', 'etudiants.nom', 'etudiants.prenom', 'etudiants.matricule')
        ->get();
        
        

        return view('admin.attestation' ,compact('attestations','method'));
       
    }


    public function view_attestation(Request $request,string $mat,string $idA)  {

        
        $hmackey=env('HMAC_KEY');
        $method='afficheAttes';



        $matricule =   $mat;
        $id_attestation = $idA;

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
            ->join('regroupes', 'niveaux.id_niveau', '=', 'regroupes.niveau')
            ->join('fileres', 'regroupes.filiere', '=', 'fileres.id_filiere')
            ->join('releves', 'fileres.id_filiere', '=', 'releves.filiere')
            ->join('etudiants', 'releves.matricule', '=', 'etudiants.matricule')
            ->where('etudiants.matricule', $matricule)
            ->distinct()
            ->first();


        $etudiant=etudiant::where(['matricule'=>$matricule])->first();





        $datacont = trim($attestations->id_attestation) . '?' . trim($attestations->nom) . '?' . trim($attestations->prenom) . '?' . trim($niv->nom_niveau) . '?' . trim($attestations->mention) . '?' . trim($attestations->nom_filiere) . '?' . trim($attestations->moy_gen_pon) ;
//        $hmac = hash_hmac('sha256', $datacont, $hmackey);
        $encryptedData =$datacont . '?' . $hmackey . '?' . $matricule;
        $hmacInfo = trim($encryptedData);
            session()->put('hmacInfo',$hmacInfo);

            session()->put('hm',$hmacInfo);
            session()->put('rs',$attestations);


            return view('admin.attestation', compact('method','mention','attestations','hmacInfo','niv'));

        
    }

}
