<?php

namespace App\Http\Controllers;

use App\Http\Requests\FlightRequest;
use App\Models\Airline;
use App\Models\Airport;
use App\Models\Flight;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FlightsController extends Controller
{
    public function listFlight() {
        $airlines = DB::table('airlines')->select('id_airline','name')->get();
        $airport = DB::table('airport')->select('id_airport','name')->get();
        $flights = Flight::all();
        return view('admin.flights.list', compact('flights','airlines','airport'));
    }

    public function getAdd(){
        // $airlines = Airline::all();
        // $airport = Airport::all();
        $airlines = DB::table('airlines')->select('id_airline','name')->get();
        $airport = DB::table('airport')->select('id_airport','name')->get();
        return view('admin.flights.add', compact('airlines','airport'));
    }

    public function postAdd(FlightRequest $request){
        if($request->isMethod('POST')){
            $param = $request->except('_token');
            
            $flights = Flight::create($param);

            if($flights){
                toastr()->success('Successfully', 'Created Successfully');
                return redirect()->route('addFlight');
            }

        }
        return redirect()->route('addFlight');
    }

    public function getEdit($id_flight){
        
        $flights = DB::table('flights')->where('id_flight',$id_flight)->first();
        $airlines = Airline::all();
        $airport = Airport::all();
        return view('admin.flights.edit', compact('flights','airlines','airport'));
    }

    public function postEdit(FlightRequest $request,$id_flight){
        // $flights = Flight::find($id_flight);
        $flights = DB::table('flights')->where('id_flight',$id_flight)->first();
        if($request->isMethod('POST')){
            $param = $request->except('_token');

            $result = Flight::where('id_flight',$id_flight)->update($param);

            if($result){
                toastr()->success('Successfully', 'Updated Successfully');
                return redirect()->route('editFlight',['id'=>$flights->id_flight]);
            }
        }
        return view('admin.flights.edit', compact('flights','airlines','airport'));

    }
    public function deleteFlight($id_flight){
        Flight::where('id_flight',$id_flight)->delete();
        toastr()->success('Successfully', 'Deleted Successfully');
        return redirect()->route('listFlight');
    }

}
