<?php

namespace App\Http\Controllers;



//use Illuminate\Http\Request;


class CalculationController extends Controller
{
    /*
    * функція розраховує відстань між точками на плоскості (спрощена модель розрахунку відстані)
    */
    static function distancion( $p1,$p2):int  //AB = √(xb - xa)2 + (yb - ya)2  "111" - км на градус
        {
        if (isset($p1) && isset($p2)){
        return  (int) sqrt((pow((($p1->CoordinateX - $p2->CoordinateX)*111),2)) + (pow((($p1->CoordinateY - $p2->CoordinateY)*111),2))) ;
        }
        else {
            return 10000;//error
        }
    }
}
