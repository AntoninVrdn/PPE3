<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EquipeMod;


class EquipeController extends Controller
{
    // public function viewEquipe(){
    //     session_start();
    //     $equipe = EquipeMod::GetAllEquipe();
    //     return view('equipe', compact('equipe'));
    // }

    public function viewEquipe($idJeu){
        session_start();
        $equipes = EquipeMod::GetEquipesFromJeu($idJeu);
        $_SESSION['IdJeu']= $idJeu;
        return view('equipe', compact('equipes','idJeu'));
    }

    // public function nomEquipe(Request $request){
    //     session_start();
    //     $nomequipe = $request->inputnomEquipe;
    //     $nom = new EquipeMod();
    //     $nom -> creationEquipe($nomequipe);
    //     $equipe = EquipeMod::GetAllEquipe();
    //     return view('equipe', compact('equipe'));
    // }

    public function creerEquipe(Request $request,$idJeu){
        session_start();
        $nomequipe = $request->inputnomEquipe;
        EquipeMod::creationEquipe($nomequipe,$idJeu);
        $equipes = EquipeMod::getEquipesFromJeu($idJeu);
        return view('equipe', compact('equipes','idJeu'));
    }

    public function suppEquipe($idEquipe){
        session_start();
        $nomequipe = new EquipeMod();
        $nomequipe -> suppEquipe($idEquipe);
        $idJeu = $_SESSION['IdJeu'];
        $equipes = EquipeMod::GetEquipesFromJeu($idJeu);
        return view('equipe', compact('equipes','idJeu'));
    }

}
