<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Mission extends Model
{
    static function createMission($Nom,$Description,$Score,$Temps){
        $var = DB::insert('insert into MISSION (DESCRIPTION,SCORE,TIME,NAME) values (?,?,?,?)', [$Description,$Score,$Temps,$Nom]);
        return $var;
    }

    static function GetMission(){
        $var = DB::select('select MISSION.ID,MISSION.DESCRIPTION from MISSION');
        return $var;
    }

    static function AjouterMission($id){
        $idStep = $_SESSION['idStep'];
        $var = DB::update('update STEP set MISSIONID = NULL where ID = ?', [$id]);
        $var = DB::update('update STEP set MISSIONID = ? where ID = ?', [$id,$idStep]);
        return $var;
    }

    static function VoirMission($id){
        $var = DB::select('select MISSION.DESCRIPTION from MISSION INNER JOIN STEP ON MISSION.ID = STEP.MISSIONID where STEP.ID =  ?', [$id]);
        return $var;
    }

}
