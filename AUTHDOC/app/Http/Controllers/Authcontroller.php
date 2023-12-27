<?php

namespace App\Http\Controllers;

use App\Http\Requests\signuprequest;
use App\Models\Utilisateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Authcontroller extends Controller
{

        public function login()
        {
            return view('auth.login');
        }

        public function signup()
        {
            return view('auth.signup');
        }

        public function signupPost(signuprequest $request)
        {
            $request1 = $request->validated();

            $utilisateur = new Utilisateur();
            $utilisateur->nom = $request1['first_name'];
            $utilisateur->prenom = $request1['last_name'];
            $utilisateur->email = $request1['email'];
            $utilisateur->password = Hash::make($request1['password']);
            $utilisateur->fonction = 'uti';

            $utilisateur->save();

            return back()->with('success','Register suceffuly');


        }

}
