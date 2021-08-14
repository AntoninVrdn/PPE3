<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Joueur;
use Illuminate\Support\Facades\DB;

class JoueurController extends Controller
{
    public function afficherJoueur($idEquipe){
        session_start();
        $joueur = new Joueur();
        $joueurAfficher = $joueur -> AffichageJoueur($idEquipe);
        $musiqueAfficher = $joueur -> getMusique($idEquipe);
        return view('joueur', compact('joueurAfficher', 'musiqueAfficher', 'idEquipe'));
    }

    public function ajouterJoueur($idJoueur, $idEquipe){
        session_start();
        $joueur = new Joueur();
        $joueur->AjouterJoueur($idEquipe, $idJoueur) ; //Faire la requete insert
        $joueur->AffichageJoueur($idEquipe);
        return redirect(route('afficherJoueurEquipe', ['id'=>$idEquipe]));
    }

    public function suppJoueur($idJoueur, $idEquipe){
        session_start();
        $joueur = new Joueur();
        $joueur->SuppJoueur($idEquipe, $idJoueur) ; //Faire la requete insert
        $joueur->AffichageJoueur($idEquipe);
        return redirect(route('afficherJoueurEquipe', ['id'=>$idEquipe]));
    }

    public function choixMusique(Request $request,$idEquipe){
        session_start();
        $nomartiste = $request->nomArtiste;
        $titreMusique = $request->titreMusique;
        $urlmusique = $request->urlMusique;
        $idmusique = $request->idMusique;
        Joueur::choixMusique($nomartiste,$titreMusique,$urlmusique,$idmusique,$idEquipe);
        $musique = new Joueur();
        $musiqueAfficher = $musique -> getMusique($idEquipe);
        $joueurAfficher = $musique -> AffichageJoueur($idEquipe);
        return view('joueur', compact('joueurAfficher', 'musiqueAfficher' , 'idEquipe'));
        //return back();
    }


    // public function creerJoueur(Request $request, $idEquipe){
    //     $userNom = $request->inputNomJoueur;
    //     $userPrenom = $request->inputPrénomJoueur;
    //     $userName = $request->inputPseudoJoueur;
    //     $userEmail = $request->inputMDPJoueur;
    //     $userPassword = $request->inputEmailJoueur;
    //     $joueur = new Joueur();
    //     $joueurCreer = $joueur -> creerJoueur($idEquipe, $userNom, $userPrenom, $userName, $userEmail, $userPassword);
    //     return view ('joueur', compact('joueurCreer'));
    // }
}
