<?php

namespace App\Http\Controllers;

use App\Models\Airflight;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class FlightController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * */

    public function index()
    {
        $data = DB::table("airflights")
        ->join('airroutes','airflights.airroute_id','=','airroutes.id')
        ->join('airplanes','airflights.airplane_id','=','airplanes.id')
        ->join('airports as s','airroutes.startcity','=','s.id')
        ->join('airports as f','airroutes.finishcity','=','f.id')
        ->select('airflights.*','airroutes.nameline', 'airplanes.modeltype',
         's.nicName as startNicName' , 'f.nicName as finishNicName' ,'airroutes.distancion' ,'airplanes.speed',
         DB::raw('(ROUND(airroutes.distancion / airplanes.speed * 60)) as flighttime' ),
         )->get();

         if(request()->ajax()) {
          return DataTables::of($data)
                ->addColumn('action', 'flights.action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('flights.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $planers = $this-> getPlaners();
        $routs= $this-> getRouts();
        return view('flights.create',compact('planers','routs'));
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
            'nameflight' => 'required|unique:airflights|max:10',
            'airroute_id' => 'required',
            'airplane_id' => 'required',
            'data' => 'required',
            'time' => 'required',
            //'comment'=>''
        ]);

        $flight = new Airflight;

        $flight->nameflight = $request->nameflight;
        $flight->airroute_id = $request->airroute_id;
        $flight->airplane_id = $request->airplane_id;
        $flight->data = $request->data;
        $flight->time = $request->time;
        $flight->comment = $request->comment;
        $flight->save();

        return redirect()->route('flights.index')
                        ->with('success','Рейс додано.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Airflight  $flight
     * @return \Illuminate\Http\Response
     */
    public function show(Airflight $flight) //функція не використовуєтся
    {
        return view('flights.show',compact('flight'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Airflight  $flight
     * @return \Illuminate\Http\Response
     */
    public function edit(Airflight $flight)
    {
        $planers = $this-> getPlaners();
        $routs= $this-> getRouts();
        return view('flights.edit',compact('flight','planers','routs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Airflight  $flight
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nameflight' => 'required|max:10',
            'airroute_id' => 'required',
            'airplane_id' => 'required',
            'data' => 'required',
            'time' => 'required',
        ]);

        $flight = Airflight::find($id);

        $flight->nameflight = $request->nameflight;
        $flight->airroute_id = $request->airroute_id;
        $flight->airplane_id = $request->airplane_id;
        $flight->data = $request->data;
        $flight->time = $request->time;
        $flight->comment = $request->comment;
        $flight->save();

        return redirect()->route('flights.index')
                        ->with('success','Рейс оновлено');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Airflight  $flight
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $com = Airflight::where('id',$request->id)->delete();
        return Response()->json($com);
       //return redirect()->route('flights.index')->with('success','Удалено');
    }
    public function __construct()
    {
    $this->middleware('auth', ['except' => 'index']);
    }

     protected function getPlaners()
     {
        return collect(DB::table('airplanes')
        ->select('id','modeltype')->get())
        ->unique('modeltype');
     }
     protected function getRouts()
     {
        return collect(DB::table('airroutes')
        ->join('airports as s','airroutes.startcity','=','s.id')
        ->join('airports as f','airroutes.finishcity','=','f.id')
        ->select('airroutes.id',
         DB::raw('CONCAT(s.nicName,"-",f.nicName) as cityroute')
         )->get())
         ->unique('cityroute');
     }
}

