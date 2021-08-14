<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Accueil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AccueilController extends Controller
{
    public function GetParcoursByCreator($id){
        session_start();
        $Parcours = new Accueil();
        $Choix = $Parcours->GetParcoursByCreator($id);
        return view('choixParcours',compact('Choix'));
    }

    public function PageParcours(){
        session_start();
        return view('creationParcours');
    }

    public function PageAccueil(){
        session_start();
        return view('accueil');
    }

    public function Connexion(){
        $ok = 1;
        return view('connexion',compact('ok'));
    }
}
