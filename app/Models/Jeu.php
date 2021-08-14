<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Jeu extends Model
{
    // Ajoute une équipe sélédctionnée dans une liste d'équipe à un jeu déja créé
    public function AjouterEquipe()
    {
    }

    // Créer jeu avec un parcours, une date et une durée
    public static function CreerJeu($parcours, $dateF, $dateD)
    {
        $result = DB::insert('insert into JEU (ID_ROUTE,TEMPSFINAL,DATECREATION,SCOREFINAL) values (?,?,?,0)', [$parcours,$dateF,$dateD]);
        if ($result) {
            return $result;
        } else {
            return 1;
        }
    }

    // Supprimer un jeu
    public static function DeleteJeu($idJeu)
    {
        $result = DB::delete('delete FROM JEU WHERE ID = ?', [$idJeu]);
        if ($result) {
            return 0;
        } else {
            return 1;
        }
    }

    // Retourne les jeux de l'organisateur
    public static function GetCreatorJeux($creatorId)
    {
        $result = DB::select('select JEU.* from JEU INNER JOIN ROUTE ON JEU.ID_ROUTE = ROUTE.ID AND ROUTE.ID_CREATOR = ?', [$creatorId]);
        if ($result) {
            return $result;
        } else {
            return 1;
        }
    }

    


}
