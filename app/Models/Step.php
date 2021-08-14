<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Step extends Model
{
    use HasFactory;

    public function GetStepByParcours($id){
        $_SESSION['idRoute'] = $id;
        $lesSteps = DB::select('select STEP.ID,STEP.COORDGPS,STEP.DESCRIPTION,STEP.VALIDATION,STEP.CREATIONDATE,STEP.NAME from STEP INNER JOIN STEPROUTEREPORT ON STEP.ID=STEPROUTEREPORT.IDSTEP INNER JOIN ROUTE ON ROUTE.ID=STEPROUTEREPORT.IDROUTE where ROUTE.ID = ?',[$id]);
        return $lesSteps;
    }

    public static function AddStep($Name,$CoordGps){
        $idRoute = $_SESSION['idRoute'];
        $result = DB::select('select * from STEP where NAME = ? ',[$Name]);
        if(!$result)
        {
            DB::insert('insert into STEP (COORDGPS,NAME) values (?,?)', [$CoordGps,$Name]);
            $id = DB::select('select ID from STEP where NAME = ? ',[$Name]);
            $idStep = $id[0]->ID;
            DB::insert('insert into STEPROUTEREPORT (IDROUTE, IDSTEP) values (?, ?)', [$idRoute,$idStep]);

        }else{
            $idStep = $result[0]->ID;
            DB::insert('insert into STEPROUTEREPORT (IDROUTE, IDSTEP) values (?, ?)', [$idRoute,$idStep]);
        }
        $lesSteps = DB::select('select STEP.ID,STEP.COORDGPS,STEP.DESCRIPTION,STEP.VALIDATION,STEP.CREATIONDATE,STEP.NAME from STEP INNER JOIN STEPROUTEREPORT ON STEP.ID=STEPROUTEREPORT.IDSTEP INNER JOIN ROUTE ON ROUTE.ID=STEPROUTEREPORT.IDROUTE where ROUTE.ID = ?',[$idRoute]);
        return $lesSteps;
    }



}
