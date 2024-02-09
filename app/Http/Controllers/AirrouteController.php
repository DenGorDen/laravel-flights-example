<?php

namespace App\Http\Controllers;

use App\Models\Airport;
use App\Models\Airroute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class AirrouteController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * */

     public function index()
     {
         $data = DB::table("airroutes")
         ->join('airports as s','airroutes.startcity','=','s.id')
         ->join('airports as f','airroutes.finishcity','=','f.id')
         ->select('airroutes.*','s.nicName as startNicName','f.nicName as finishNicName' ,'airroutes.distancion'
          )->get();

          if(request()->ajax()) {
           return DataTables::of($data)
                 ->addColumn('action', 'routes.action')
                 ->rawColumns(['action'])
                 ->addIndexColumn()
                 ->make(true);

         }
         return view('routes.index');
     }

     /**
      * Show the form for creating a new resource.
      *
      * @return \Illuminate\Http\Response
      */
     public function create()
     {
        $cites = $this->getCites();
        return view('routes.create',compact('cites'));
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
             'nameline' => 'required|unique:airroutes',
             'startcity' => 'required',
             'finishcity' => 'required|different:startcity'
         ]);

         $route = new Airroute;
         $route->nameline = $request->nameline;
         $route->startcity = $request->startcity;
         $route->finishcity = $request->finishcity;
         $route->distancion = CalculationController::distancion(
            Airport::find($request->startcity),
            Airport::find($request->finishcity));
         $route->save();
         return redirect()->route('airroutes.index')
                         ->with('success','Маршрут успішно додано.');
     }

     /**
      * Display the specified resource.
      *
      * @param  \App\Airroute  $route
      * @return \Illuminate\Http\Response
      */
     public function show(Airroute $route)  //функція не використовуєтся
     {
         return view('routes.show',compact('route'));
     }
/**/
     /**
      * Show the form for editing the specified resource.
      *
      * @param  \App\Airroute  $airroute
      * @return \Illuminate\Http\Response
      */
     public function edit(Airroute $airroute)
     {
        $cites =  $cites = $this->getCites();
         return view('routes.edit',compact('airroute','cites'));
     }

     /**
      * Update the specified resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  \App\Airroute  $route
      * @return \Illuminate\Http\Response
      */
     public function update(Request $request, $id)
     {
        $request->validate([
            'nameline' => 'required|max:10',
            'startcity' => 'required',
            'finishcity' => 'required|different:startcity'
        ]);
        $p1 = $request->startcity;
        $p2 = $request->finishcity;

         $route = Airroute::find($id);

         $route->nameline = $request->nameline;
         $route->startcity = $p1;
         $route->finishcity = $p2;
         $route->distancion = CalculationController::distancion(Airport::find($p1),Airport::find($p2)) ;


         $route->save();

         return redirect()->route('airroutes.index')
                         ->with('success','Маршрут оновлено');
     }

     /**
      * Remove the specified resource from storage.
      *
      * @param  \App\Airroute  $route
      * @return \Illuminate\Http\Response
      */
     public function destroy(Request $request)
     {
         $com = Airroute::where('id',$request->id)->delete();
         return Response()->json($com);
        // return redirect()->route('airroutes.index')->with('success','Маршрут видалено');
     }

     public function __construct()
    {
    $this->middleware('auth', ['except' => 'index']);
    }

    protected function getCites() {
        return collect(Airport::select('id','nicName')->get())->unique('nicName');
    }
}
