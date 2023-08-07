<?php

namespace App\Http\Controllers;

use App\Http\Requests\TicketRequest;
use App\Models\Flight;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class TicketController extends Controller
{
    public function listTicket() {
        $flights = Flight::all();
        $tickets = Ticket::all();
        return view('admin.tickets.list', compact('tickets','flights'));
    }

    public function getAdd(){
        $flights = Flight::all();
        return view('admin.tickets.add', compact('flights'));
    }

    public function postAdd(TicketRequest $request) {
        if($request->isMethod('POST')){
            $param = $request->except('_token');

            if($request->hasFile('image') && $request->file('image')->isValid()){
                $param['image'] = upLoadFile('images', $request->file('image'));
            }
            $tickets = Ticket::create($param);

            if(is_null($tickets->id_ticket)){
                toastr()->success('Successfully', 'Created Successfully');
                return redirect()->route('addTicket');
            }
        }
        return redirect()->route('addTicket');
    }

    public function getEdit($id_ticket) {
        $flights = Flight::all();
        $tickets = DB::table('tickets')
            ->where('id_ticket','=',$id_ticket)
            ->first();
        return view('admin.tickets.edit', compact('flights','tickets'));
    }
    public function postEdit(TicketRequest $request, $id_ticket) {
        $flights = Flight::all();
        $tickets = DB::table('tickets')
            ->where('id_ticket','=',$id_ticket)
            ->first();
        
        if($request->isMethod('POST')){
            $param = $request->except('_token');

            if($request->hasFile('image') && $request->file('image')->isValid()){

                $resultDL = Storage::delete('/public/',$tickets->id_ticket);

                if($resultDL){
                    $param['image'] = upLoadFile('images',$request->file('image'));
                }
            }else{
                $param['image'] = $tickets->image;
            }

            $result = Ticket::where('id_ticket',$id_ticket)->update($param);
            if($result){
                toastr()->success('Successfully', 'Updated Successfully');
                return redirect()->route('editTicket',['id'=>$tickets->id_ticket]);
            }
        }
        return view('admin.tickets.edit', compact('flights','tickets'));
    }

    public function deleteTicket($id_ticket) {
        Ticket::where('id_ticket',$id_ticket)->delete();
        return redirect()->route('listTicket');
    }

}
