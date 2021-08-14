<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Joueur extends Model
{
    public function AffichageJoueur($idEquipe){
        // $result = DB::table('JOUEUR')
        // ->join('APPARTENIR', 'JOUEUR.ID', '=', 'APPARTENIR.ID_JOUEUR')
        // ->where('APPARTENIR.ID_EQUIPE', $idEquipe)->get();
        // return $result;

        $result = DB::select("SELECT JOUEUR.NOM, EQUIPE.NOM as nomEquipe , JOUEUR.ID as joueurId
        FROM JOUEUR LEFT JOIN APPARTENIR
        ON JOUEUR.ID = APPARTENIR.ID_JOUEUR INNER JOIN EQUIPE
        ON APPARTENIR.ID_EQUIPE = EQUIPE.ID INNER JOIN JOUER
        ON EQUIPE.ID = JOUER.ID_EQUIPE INNER JOIN JEU
        ON JOUER.ID_JEUX = JEU.ID
        WHERE APPARTENIR.ID_EQUIPE = ? AND JOUER.ID_JEUX = ?
        UNION
        SELECT JOUEUR.NOM, '' as equipe, JOUEUR.ID
        FROM JOUEUR LEFT JOIN APPARTENIR INNER JOIN EQUIPE
        ON APPARTENIR.ID_EQUIPE = EQUIPE.ID
        ON JOUEUR.ID = APPARTENIR.ID_JOUEUR
        WHERE JOUEUR.ID  NOT IN(SELECT ID_JOUEUR FROM APPARTENIR INNER JOIN EQUIPE
        ON APPARTENIR.ID_EQUIPE = EQUIPE.ID INNER JOIN JOUER
        ON EQUIPE.ID = JOUER.ID_EQUIPE WHERE JOUER.ID_JEUX = ?)
        ORDER BY EQUIPE.NOM DESC;",[$idEquipe,$_SESSION['IdJeu'],$_SESSION['IdJeu']]);
        return $result;
    }

    // public function creerJoueur($idEquipe){
    //     $result = DB::insert('insert into JOUEUR (id, name) values (?, ?)', [1, 'Dayle']);
    // }

     public function AjouterJoueur($idEquipe, $idJoueur){
         DB::insert('insert into APPARTENIR (ID_EQUIPE, ID_JOUEUR) values (?, ?)', [$idEquipe, $idJoueur]);
     }

     public function SuppJoueur($idEquipe, $idJoueur){
        DB::delete('delete APPARTENIR where ID_EQUIPE = ? AND ID_JOUEUR = ?', [$idEquipe, $idJoueur]);
    }

    public static function choixMusique($nomartiste,$titreMusique,$urlmusique,$idmusique,$idEquipe){
        DB::insert('insert into MUSIQUE (NOMARTISTE,TITRE,URL,IDMUSIQUE,IDEQUIPE) values (?,?,?,?,?)', [$nomartiste,$titreMusique,$urlmusique,$idmusique,$idEquipe]);
    }

    public  function getMusique($idEquipe){
        $result = DB::select('select NOMARTISTE,TITRE,URL,IDMUSIQUE,IDEQUIPE from MUSIQUE where IDEQUIPE=?',[$idEquipe]);
        return $result;
    }
}
