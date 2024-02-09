<?php

namespace App\Http\Controllers;

use App\Models\Airplane;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PlanerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * */

     public function index()
     {
          $data = Airplane::all();
          if(request()->ajax()) {
           return DataTables::of($data)
                 ->addColumn('action', 'planes.action')
                 ->rawColumns(['action'])
                 ->addIndexColumn()
                 ->make(true);
         }
         return view('planes.index');
     }

     /**
      * Show the form for creating a new resource.
      *
      * @return \Illuminate\Http\Response
      */
     public function create()
     {
         return view('planes.create');
     }

     /**
      * Store a newly created resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
      */
     public function store(Request $request)
     {
         $request->validate([
             'modeltype' => 'required|unique:airplanes',
             'capacitance' => 'required',
             'speed' => 'required'
         ]);

         $airplane = new Airplane;
         $airplane->modeltype = $request->modeltype;
         $airplane->capacitance = $request->capacitance;
         $airplane->speed = $request->speed;
         $airplane->save();
         return redirect()->route('airplaners.index')
                         ->with('success','Літак успішно створено та додано до БД.');
     }

     /**
      * Display the specified resource.
      *
      * @param  \App\Airplane  $airplane
      * @return \Illuminate\Http\Response
      */
     public function show(Airplane $airplane) //функція не використовуєтся
     {
         return view('planes.show',compact('airplane'));
     }

     /**
      * Show the form for editing the specified resource.
      *
      * @param  \App\Airplane  $airplaner
      * @return \Illuminate\Http\Response
      */
     public function edit(Airplane $airplaner)
     {
         return view('planes.edit',compact('airplaner'));
     }

     /**
      * Update the specified resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  \App\Airplane  $airplane
      * @return \Illuminate\Http\Response
      */
     public function update(Request $request, $id)
     {
         $request->validate([
            'modeltype' => 'required',
            'capacitance' => 'required',
            'speed' => 'required'
         ]);

         $airplane = Airplane::find($id);
         $airplane->modeltype = $request->modeltype;
         $airplane->capacitance = $request->capacitance;
         $airplane->speed = $request->speed;
         $airplane->save();
         return redirect()->route('airplaners.index')
                         ->with('success','Літак успішно оновлено');
     }

     /**
      * Remove the specified resource from storage.
      *
      * @param  \App\Airplane  $airplane
      * @return \Illuminate\Http\Response
      */
     public function destroy(Request $request)
     {
         $com = Airplane::where('id',$request->id)->delete();
        // if ($com) ('success','Літак успішно видалено');
         return response()->json($com);
        // return redirect()->route('airplaners.index')->with('success','Літак успішно видалено');


     }
     public function __construct()
     {
     $this->middleware('auth', ['except' => ['index', 'show']]);
     }
}
