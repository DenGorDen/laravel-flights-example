<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\Relations\MorphTo;

class Airplane extends Model
{
    use HasFactory;
    public $timestamps =false;
   // protected $table ='airplanes';

   // public function airroute()//: MorphTo
   // {
   //     return $this->hasOne(AirRoute::class);//morphTo();
   // }


}
