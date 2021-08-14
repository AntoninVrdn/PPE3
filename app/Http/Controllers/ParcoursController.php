<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Parcour;
use Illuminate\Support\Facades\DB;
use App\Models\Accueil;


class ParcoursController extends Controller
{
    //Create route
    public function CreerParcour(Request $request){
        session_start();
        $rName = $request->routeName; //get the data typed in the input for the name of the route
        $rDescription = $request->routeDescription; //get the data typed in the input for the description of the route

        if ($request->routeHandicap == "on") $rHandicap = TRUE; //get if have an handicap
        else $rHandicap = false;

        $modelParcours = new Parcour(); //create a model
        $id = $modelParcours->CreerParcour($rName,$rDescription,$rHandicap); //call the function of the model
        $_SESSION['idRoute'] = $id[0]->ID;
        $idRoute = $id[0]->ID;
        $lesSteps = DB::select('select STEP.ID,STEP.COORDGPS,STEP.DESCRIPTION,STEP.VALIDATION,STEP.CREATIONDATE,STEP.NAME from STEP INNER JOIN STEPROUTEREPORT ON STEP.ID=STEPROUTEREPORT.IDSTEP INNER JOIN ROUTE ON ROUTE.ID=STEPROUTEREPORT.IDROUTE where ROUTE.ID = ?',[$idRoute]);
        $result = DB::select('select NAME from ROUTE where ID=?',[$idRoute]);
        if ($id == "error : route not created") return view('creationParcours'); //if error show a message to prevent the user and stay in the same page
        else return view('step',compact('lesSteps','result')); //return the view step with the id of the route was created
    }

    public function deleteRoute($id){
        session_start();
        $idStep = DB::select('select IDSTEP from STEPROUTEREPORT where IDROUTE = ?', [$id]);
        if(!($idStep)){
            DB::delete('delete ROUTE where ID = ?', [$id]);
        }
        $idCreator = $_SESSION['login'][0]->ID;
        $Parcours = new Accueil();
        $Choix = $Parcours->GetParcoursByCreator($idCreator);
        return view('choixParcours',compact('Choix'));
    }
}
