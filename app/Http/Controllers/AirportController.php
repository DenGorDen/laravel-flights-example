<?php

namespace App\Http\Controllers;

use App\Models\Airport;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AirportController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * */

     public function index()
     {
         $data = Airport::all();
          if(request()->ajax()) {
           return DataTables::of($data)
                 ->addColumn('action', 'ports.action')
                 ->rawColumns(['action'])
                 ->addIndexColumn()
                 ->make(true);
         }
         return view('ports.index');
     }

     /**
      * Show the form for creating a new resource.
      *
      * @return \Illuminate\Http\Response
      */
     public function create()
     {
         return view('ports.create');
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
             'nicName' => 'required|unique:airports',
             'CoordinateX' => 'required',
             'CoordinateY' => 'required'
         ]);

         $airport = new Airport;
         $airport->nicName = $request->nicName;
         $airport->CoordinateX = $request->CoordinateX;
         $airport->CoordinateY = $request->CoordinateY;
         $airport->save();
         return redirect()->route('airports.index')
                         ->with('success','Аеропорт створено.');
     }

     /**
      * Display the specified resource.
      *
      * @param  \App\Airport  $airport
      * @return \Illuminate\Http\Response
      */
     public function show(Airport $airport) //функція не використовуєтся
     {
         return view('ports.show',compact('airport'));
     }

     /**
      * Show the form for editing the specified resource.
      *
      * @param  \App\Airport  $airport
      * @return \Illuminate\Http\Response
      */
     public function edit(Airport $airport)
     {
         return view('ports.edit',compact('airport'));
     }

     /**
      * Update the specified resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  \App\Airport  $airport
      * @return \Illuminate\Http\Response
      */
     public function update(Request $request, $id)
     {
         $request->validate([
             'nicName' => 'required',
             'CoordinateX' => 'required',
             'CoordinateY' => 'required'
         ]);

         $airport = Airport::find($id);
         $airport->nicName = $request->nicName;
         $airport->CoordinateX = $request->CoordinateX;
         $airport->CoordinateY = $request->CoordinateY;
         $airport->save();
         return redirect()->route('airports.index')
                         ->with('success','Аеропорт оновлено');
     }

     /**
      * Remove the specified resource from storage.
      *
      * @param  \App\Airport  $airport
      * @return \Illuminate\Http\Response
      */
     public function destroy(Request $request)
     {
         $com = Airport::where('id',$request->id)->delete();
         return Response()->json($com);
        // return redirect()->route('airports.index')->with('success','Аеропорт видалено');
     }
     public function __construct()
     {
          $this->middleware('auth', ['except' => ['index', 'show']]);
     }
}
