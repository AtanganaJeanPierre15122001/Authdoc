<?php

namespace App\Http\Controllers;


use App\Models\appartenir;
use App\Models\etudiant;
use App\Models\niveau;
use App\Models\attestation;
use App\Models\filere;
use Illuminate\Http\Request;

class AttestationController extends Controller
{
    public function attestation()
    {

        $method = 'search';

        return view('admin.attestation',compact('method'));
       
    }

    public function save_attestation(Request $request)
    {

      $nom = $request->input('firstName');
      $prenom = $request->input('lastName');
      $matricule = $request->input('matricule');
      $date_nais = $request->input('date_nais');
      $lieu_nais = $request->input('lieu_nais');
      $fil = $request->input('filiere');
      $niveau = $request->input('niveau');
      $domaine = $request->input('domaine');
      $annee = $request->input('annee');
      $specialite = $request->input('specialite');
      $nom_filiere = $request->input('nom_filiere');
      $mention = $request->input('mention');
      $mgp = $request->input('mgp');



      $etudiant = new etudiant();
      $etudiant->matricule = $matricule;
      $etudiant->nom = $nom;
      $etudiant->prenom = $prenom;
      $etudiant->date_naissance = $date_nais;
      $etudiant->lieu_naissance = $lieu_nais;
      $etudiant->domaine = $domaine;
      $etudiant->specialite = $specialite;

      $etud=etudiant::where(['matricule'=>$matricule])->first();

      if(!$etud){
        return to_route('admin.ajout_manuel_attest')->with('error','Vous avez entrez un matricule n\'existant pas');
      }

      
      
      $filiere = new filere();

      $filiere->id_filiere = $fil;
      $filiere->nom_filiere = $nom_filiere;
      $filiere->nb_matieres = '12';

      // dd($fil);




      $filiereExist = filere::where(['id_filiere' => $fil])->first();

      if (!$filiereExist)
      {
        $filiere->save();
      }


      $nomSplitted = explode(' ', $nom);
      $initial1 = '';
      foreach ($nomSplitted as $part) {
          $initial1 .= strtoupper(substr($part, 0, 1));
      }


      $nomSplitted = explode(' ', $prenom);
      $initial2 = '';
      foreach ($nomSplitted as $part) {
          $initial2 .= strtoupper(substr($part, 0, 1));
      }

      $initia2 = $initial1 . $initial2;

      $attestation = new attestation();

      $idA = "$initia2-$matricule-$niveau-FS-$fil-$annee";

      session()->put('id_attestation', $idA);


        $attestation->id_attestation = $idA;
        $attestation->annee_academique = $annee;
        $attestation->mention = $mention;;
        $attestation->filiere = $fil;
        $attestation->matricule = $matricule;
        $attestation->moy_gen_pon = $mgp;


        $attestation->save();


        


        
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
          ->join('releves', 'niveaux.id_niveau', '=', 'releves.niveau')
          ->join('etudiants', 'releves.matricule', '=', 'etudiants.matricule')
          ->join('attestations', 'attestations.id_attestation', '=', 'releves.attestation')
          ->where('etudiants.matricule', $matricule)
          ->where('releves.attestation', $id_attestation)
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


            return view('admin.attestation', compact('method','mention','attestations','hmacInfo','niv'));

        
    }



    function attestation_delete(Request $request){
      $requestData = $request->all();


      $attId = $requestData['attId'];

      if ($attId) {
          $attestation = attestation::find($attId);

          $attestation->delete();

          return response()->json(['statut' => 200, 'message' => 'Success', 'data' => 'attestation  supprimé']);
      }else{
          return response()->json(['statut'=>408,'message'=>'Releve non supprimé']);

      }

  }


}
