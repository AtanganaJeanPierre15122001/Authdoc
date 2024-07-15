<?php

namespace App\Http\Controllers;

use App\Http\Requests\loginrequest;
use App\Http\Requests\signuprequest;
use App\Models\User;
use App\Models\Utilisateur;
use Hamcrest\Util;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
            $utilisateur->email = $request1['email2'];
            $utilisateur->password = Hash::make($request1['password']);
            $utilisateur->fonction = 'uti';

            $utilisateur->save();

            return back()->with('success','Register suceffuly');


        }

        public function loginPost(loginrequest $request)
        {
            $credentials = $request->validated();


            $utilisateur = Utilisateur::where([
                'email' => $credentials['email'],
            ])->first();
            if ($utilisateur && Hash::check($credentials['password'],$utilisateur->password))
            {
//                $user = Auth::user();
                if ($utilisateur->fonction === 'adm') {
                    $request->session()->regenerate();
                    return redirect()->intended(route('admin.main'));
                } else {
                    return redirect()->intended(route('user.main'));
                }
            }

            return redirect()->route('auth.login')->with('error', 'Adresse e-mail ou mot de passe incorrect.');


        }





}
