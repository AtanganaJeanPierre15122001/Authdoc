<?php

namespace App\Http\Controllers;

use App\Http\Requests\signuprequest;
use App\Models\Utilisateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class admincontroller extends Controller
{
    public function admin()
    {
        $response['utilisateurs']=Utilisateur::all();
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
            return view('admin.ajout_manuel');
        }
        public function ajout_excel()
        {
            return view('admin.ajout_excel');
        }
        public function rempli()
        {
            return view('admin.rempli');
        }



}
