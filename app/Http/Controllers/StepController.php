<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Mission;
use Illuminate\Http\Request;
use App\Models\Step;
use Illuminate\Support\Facades\DB;

class StepController extends Controller
{
    public function GetStepByParcours($id){
        session_start();
        $result = DB::select('select NAME from ROUTE where ID=?',[$id]);
        $Step = new Step();
        $lesSteps = $Step->GetStepByParcours($id);
        return view('step',compact('lesSteps','result'));
    }

    public function deleteStep($id){
        session_start();
        DB::delete('delete STEPROUTEREPORT where IDSTEP = ?', [$id]);
        DB::delete('delete STEP where ID = ?', [$id]);
        $idroute = $_SESSION['idRoute'];
        $result = DB::select('select NAME from ROUTE where ID=?',[$idroute]);
        $Step = new Step();
        $lesSteps = $Step->GetStepByParcours($idroute);
        return view('step',compact('lesSteps','result'));
    }

    public function AddStep(Request $request){
        session_start();
        $Name = $request->location;
        $lat = $request->lat;
        $long = $request->lng;
        $CoordGps = $lat."_".$long;
        $lesSteps = Step::AddStep($Name,$CoordGps);
        $idroute = $_SESSION['idRoute'];
        $result = DB::select('select NAME from ROUTE where ID=?',[$idroute]);
        return view('step',compact('lesSteps','result'));
    }

    public function VoirParcours($id){
        session_start();
        $result = DB::select('select NAME from ROUTE where ID=?',[$id]);
        $Step = new Step();
        $lesSteps = $Step->GetStepByParcours($id);
        return view('voirParcours',compact('lesSteps','result'));
    }
}
