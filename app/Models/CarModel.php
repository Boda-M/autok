<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    use HasFactory;
    public $timestamps=false;
    //protected $fillable = ['idMaker', 'name'];
    function maker()
    {
        return $this->belongsTo(Maker::class,"idMaker","id");
    }
    public static function findByModel($idMaker)
    {
        return self::where('idMaker', '=', $idMaker . '%')->paginate(10);
    }
}
