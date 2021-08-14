<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class EquipeMod extends Model
{
    // public function creationEquipe($nomequipe)
    // {
    //     $id_creator = $_SESSION['login'][0]->ID;
    //     DB::insert('insert into EQUIPE (NOM,ID_CREATOR) values (?,?)', [$nomequipe, $id_creator]);
    // }

    public static function creationEquipe($nomequipe,$idJeu)
    {
        $id_creator = $_SESSION['login'][0]->ID;
        DB::insert('insert into EQUIPE (NOM,ID_CREATOR) values (?,?)', [$nomequipe, $id_creator]);
        $equipe = DB::select('select MAX(ID) as ID from EQUIPE');
        DB::insert('insert into JOUER (ID_JEUX,ID_EQUIPE,SCORE) values (?,?,0)',[$idJeu,$equipe[0]->ID]);
    }

    public static function getAllEquipe()
    {
        $result = DB::select('select * from EQUIPE order by ID DESC');
        return $result;
    }

    public function suppEquipe($idEquipe)
    {
        DB::table('REPONSE_JOUEUR')->where('ID_EQUIPE', $idEquipe)->delete();
        DB::table('PARCOURS_EQUIPE')->where('ID_EQUIPE', $idEquipe)->delete();
        DB::table('JOUER')->where('ID_EQUIPE', $idEquipe)->delete();
        DB::table('APPARTENIR')->where('ID_EQUIPE', $idEquipe)->delete();
        DB::table('EQUIPE')->where('ID', $idEquipe)->delete();
        //return $result;
    }

    public static function getEquipesFromJeu($idJeu)
    {
        $result = DB::select('select *
        from EQUIPE E
        inner join JOUER JO on JO.ID_EQUIPE=E.ID
        inner join JEU J on J.ID=JO.ID_JEUX
        where J.ID=?',[$idJeu]);
        if ($result) {
            return $result;
        } else {
            return 1;
        }
    }
}
