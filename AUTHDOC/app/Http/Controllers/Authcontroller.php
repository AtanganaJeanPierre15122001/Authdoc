<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Authcontroller extends Controller
{

        public function home()
        {
        return view('Home.home');
        }
        public function login()
        {
            return view('auth/login');
        }

        public function signup()
        {
            return view('auth/signup');
        }
<<<<<<< Updated upstream
=======

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

            return view('user.main')->with('success','Registered successffuly');


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

>>>>>>> Stashed changes
}
