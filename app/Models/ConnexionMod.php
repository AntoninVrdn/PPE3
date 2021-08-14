<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ConnexionMod extends Model
{
    public function verifConnexion($UserName, $MdpCon){
        $var = DB::select('select ID from ORGANISATEUR where LOGIN = ? and PASSWORD = ?', [$UserName,$MdpCon]);
        if($var){
            session_start();
            $_SESSION['login'] = $var;
            $_SESSION['route'] =DB::select('select * from ROUTE where ID_CREATOR = ?',[$_SESSION['login'][0]->ID]);
            $result = 1;
        }else{
            $result=0;
        }
        return $result;
    }

    public function Deconnexion($id){
        $var = DB::select('select * from ORGANISATEUR where ID = ?', [$id]);
        return $var;
    }
}
