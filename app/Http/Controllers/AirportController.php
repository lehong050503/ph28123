<?php

namespace App\Http\Controllers;

use App\Http\Requests\AirportRequest;
use App\Models\Airport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AirportController extends Controller
{
    public function listAport(){
        $airport = Airport::all();
        return view('admin.airport.list', compact('airport'));
    }

    public function getAdd() {
        return view('admin.airport.add');
    }

    public function postAdd(AirportRequest $request) {
        if($request->isMethod('POST')){
            $param = $request->except('_token');
            
            $airport = Airport::create($param);

            if(is_null($airport->id_airport)){
                toastr()->success('Successfully', 'Created Successfully');
                return redirect()->route('listAport');
            }
        }
        return view('admin.airport.add');
    }

    public function getEdit($id_airport) {
        $airport = DB::table('airport')->where('id_airport',$id_airport)->first();
        return view('admin.airport.edit', compact('airport'));
    }

    public function postEdit(AirportRequest $request, $id_airport) {
        $airport = DB::table('airport')->where('id_airport',$id_airport)->first();
        if($request->isMethod('POST')){
            $param = $request->except('_token');

            $result = Airport::where('id_airport', $id_airport)->update($param);

            if($result){
                toastr()->success('Successfully', 'Updated Successfully');
                return redirect()->route('editAport',['id'=>$airport->id_airport]);
            }

        }
        return view('admin.airport.edit', compact('airport'));
    }
    
    public function deleteAport($id_airport){
        Airport::where('id_airport',$id_airport)->delete();
        toastr()->success('Successfully', 'Deleted Successfully');
        return redirect()->route('listAport');
    }
}
