<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

//use Illuminate\Database\Eloquent\Relations\MorphOne;

class Airroute extends Model
{
    use HasFactory;
    public $timestamps =false;
   // protected $table ='airroutes';


   

    public function airport1():BelongsTo//: MorphOne
    {
        return $this->belongsTo(Airport::class,'startcity','id','airport');//morphOne(Airplane::class, 'airroute');
       // return $this->belongsTo(Airport::class);

    }
    public function airport2():BelongsTo//: MorphOne
    {
        return $this->belongsTo(Airport::class,'finishcity','id','airport');//morphOne(Airplane::class, 'airroute');
       // return $this->belongsTo(Airport::class);

    }
}
