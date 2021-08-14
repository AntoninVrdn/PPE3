<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ConnexionMod;
use App\Models\ConnexionMod as ModelsConnexionMod;
use Illuminate\Support\Facades\DB;

class WelcomeController extends Controller
{
    public function VerifConnexion(Request $request){
        $userName = $request->inputUserName;
        $mdpCon = $request->inputMdpCon;
        $ConnexionMod = new ModelsConnexionMod();
        $user = $ConnexionMod->verifConnexion($userName, $mdpCon);
        $ok = 1;
        if($user == 1){
            return view('accueil');
        }else{
            return view('connexion', compact('ok'));
        }
    }

    public function Profil(){
        session_start();
        $id = $_SESSION['login'][0]->ID;
        $Profil = new ModelsConnexionMod();
        $user2 = $Profil->Deconnexion($id);
        return view('profil', compact('user2'));
    }

    public function Deconnexion(){
        session_start();
        session_unset();
        session_destroy();
        return view('connexion');
    }
}
