<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jeu;
use App\Models\Parcour;

class JeuController extends Controller
{
    /// Fonction qui permet de retourner la vue, en introduisant les parcours de l'organisateur
    public function CreationJeu()
    {
        session_start();
        $idCreator = $_SESSION['login'][0]->ID;

        $parcours = Parcour::GetCreatorParcours($idCreator);
        $jeux = Jeu::GetCreatorJeux($idCreator);
        return view('creationJeu', compact('parcours', 'jeux'));
    }

    /// Fonction qui permet d'ajouter un jeu à l'organisateur
    public function CreerJeu(Request $request)
    {
        session_start();
        $parcoursJeu = $request->parcoursJeu;
        $dateDJeu = $request->dateDJeu;
        $dateFJeu = $request->dateFJeu;

        Jeu::CreerJeu($parcoursJeu, $dateFJeu, $dateDJeu);
        return redirect()->route('creationJeu');
    }

    /// Fonction qui permet de supprimer un jeu
    public function DeleteJeu($idJeu)
    {
        session_start();
        Jeu::DeleteJeu($idJeu);
        return redirect()->route('creationJeu');
    }

    // Fonction pour aller sur la view de modification du jeu
    public function GoModifyJeu($idJeu)
    {
        session_start();
        $equipesJeu = Jeu::GetEquipesFromJeu($idJeu);
        return view('equipe', compact('equipesJeu'));
    }
}
