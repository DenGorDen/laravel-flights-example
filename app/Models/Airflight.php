<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Airflight extends Model
{
    use HasFactory;
   // public $timestamps =false;

   public function airplane():BelongsTo//: MorphOne
   {
       //return $this->belongsTo(Airplane::class,'airplane_id','id','airplane');//morphOne(Airplane::class, 'airroute');
       return $this->belongsTo(Airplane::class);

   }
}
