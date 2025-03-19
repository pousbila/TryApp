<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // un constructeur qui permet d'avoir la variable request globalement,Il est unique en php dans une class

    protected $request; //variable disponible dans toute les classes (globale)
    function __construct(Request $request ){
        $this->request = $request;
    }


    //le controller de la page dashbord !
    public function dashbord(){
        return view('home.dashbord');
    }

    public function login(){
        return view('auth.login');
    }

    public function register(){
        return view('auth.register');
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }

    public function existEmail(Request $request)
    {
        try {
            // Vérifie si l'email est bien envoyé
            if (!$request->has('email')) {
                return response()->json(['error' => 'Email non fourni'], 400);
            }

            $email = $request->input('email');

            // Vérifie dans la base de données (exemple avec la table 'users')
            $exists = DB::table('users')->where('email', $email)->exists();

            return response()->json([
                'code' => 200,
                'response' => $exists ? "exist" : "notexist"
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Erreur serveur',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
