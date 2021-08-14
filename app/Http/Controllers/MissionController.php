<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mission;
use Illuminate\Support\Facades\DB;

class MissionController extends Controller
{
    public function AffichageMision(){
        session_start();
        return view('creationMission');
    }

    public function createMission(Request $request){
        session_start();
        $Nom = $request->inputNom;
        $Description = $request->inputDescription;
        $Score = $request->inputScore;
        $Temps = $request->inputTemps;
        $Mission = Mission::createMission($Nom,$Description,$Score,$Temps);
        $Choix = Mission::GetMission();
        $ok = "reussi";
        return view('choixMission',compact('Choix','ok'));
    }

    public function Mission($id){
        session_start();
        $_SESSION['idStep'] = $id;
        return view('Mission');
    }

    public function GetMission(){
        session_start();
        $Choix = Mission::GetMission();
        $ok = "reussi";
        return view('choixMission',compact('Choix','ok'));
    }

    public function deleteMission($id){
        session_start();
        $idMission = DB::select('select MISSION.ID, MISSION.DESCRIPTION from MISSION INNER JOIN STEP ON MISSION.ID = STEP.MISSIONID WHERE STEP.MISSIONID = ?', [$id]);
        if(!$idMission){
            DB::delete('delete MISSION where ID = ?', [$id]);
            $ok = "reussi";
        }
        else{
            $ok = "Faux";
        }
        $Choix = Mission::GetMission();
        return view('choixMission',compact('Choix','ok'));
    }

    public function AjouterMission($id){
        session_start();
        $idStep = $_SESSION['idStep'];
        $Ajout = Mission::AjouterMission($id);
        $Choix = Mission::GetMission();
        return redirect()->route('creerStep',['id' => $_SESSION['idRoute']]);
    }

    public function VoirMission($id){
        session_start();
        $Choix = Mission::VoirMission($id);
        return view('VoirMission',compact('Choix'));
    }
}
