<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Accueil extends Model
{
    public function GetParcoursByCreator($id){
        $var = DB::select('select * from ROUTE where ID_CREATOR = ?', [$id]);
        return $var;
    }
}
