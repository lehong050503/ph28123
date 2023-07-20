<?php

namespace App\Http\Controllers;

use App\Http\Requests\AirlineRequest;
use App\Models\Airline;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AirlineController extends Controller
{
    
    public function listAir() {
        $airlines = Airline::all();
        return view('admin.airlines.list', compact('airlines'));
    }

    public function getAdd() {
        return view('admin.airlines.add');
    }

    public function postAdd(AirlineRequest $request) {
        if($request->isMethod('POST')){
            // Lấy tất cả trửa _token
            $param = $request->except('_token');

            // Nếu như tồn tai file post lên
            if($request->hasFile('logo_url') && $request->file('logo_url')->isValid()){
                $param['logo_url'] = upLoadFile('images', $request->file('logo_url'));
            }

            $airlines = Airline::create($param);

            // Check id
            if(is_null($airlines->id_airline)){
                toastr()->success('Successfully', 'Created Successfully');
                return redirect()->route('addAir');
            }
        }
        
        return redirect()->route('addAir');
    }
    public function getEdit($id_airline) {
        $airlines = DB::table('airlines')
                    ->where('id_airline', '=', $id_airline)
                    ->first();
        return view('admin.airlines.edit', compact('airlines'));            
    }

    public function postEdit(AirlineRequest $request, $id_airline) {
        $airlines = DB::table('airlines')
                    ->where('id_airline', '=', $id_airline)
                    ->first();

        if($request->isMethod('POST')){
            // Lấy tất cả trửa _token
            $param = $request->except('_token');

            // Nếu như tồn tai file 
            if($request->hasFile('logo_url') && $request->file('logo_url')->isValid()){
                // Xóa file cũ
                $resultDL = Storage::delete('/public/'.$airlines->logo_url);

                // Tạo file mới
                if($resultDL){
                    $param['logo_url'] = upLoadFile('images', $request->file('logo_url'));
                }
                
            }else{
                $param['logo_url'] = $airlines->logo_url;
            }


            $result = Airline::where('id_airline',$id_airline)->update($param);

            // Check id
            if($result){
                toastr()->success('Successfully', 'Updated Successfully');
                return redirect()->route('editAir',['id'=>$airlines->id_airline]);
            }
        }
        
        return view('admin.airlines.edit', compact('airlines'));
    }
    public function deleteAir($id_airline) {
        Airline::where('id_airline',$id_airline)->delete();
        return redirect()->route('listAir');
    }
}
