<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Parcour extends Model
{
    use HasFactory;

    public function CreerParcour(string $nom, string $description, bool $handicap)
    {
        $id = $_SESSION['login'][0]->ID;
        $result = DB::insert('insert into ROUTE (NAME,DESCRIPTION,HANDICAP,ID_CREATOR) values (?,?,?,?)' , [$nom,$description,$handicap,$id]);
        if ($result) {
            return DB::select('select ID from ROUTE where NAME=? and DESCRIPTION=? and HANDICAP=?',[$nom,$description,$handicap]);
        }
        else {
            return "error : route not created";
        }
    }

    public static function GetCreatorParcours(int $creatorId)
    {
        $result = DB::select('select * from ROUTE where ID_CREATOR=?',[$creatorId]);
        if ($result) {
            return $result;
        }
        else {
            return 1;
        }
    }

}
