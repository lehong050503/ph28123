<?php

namespace App\Http\Controllers;

use App\Models\Airline;
use App\Models\Airport;
use App\Models\Flight;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    // 
    public function index() {
        return view('index');
    }

    public function listTicket() {
        $flights = Flight::all();
        $tickets = Ticket::all();
        $arilines = Airline::all();
        $airports = Airport::all();
        
        return view('home.list_ticket', compact('flights','tickets','airports','arilines'));
    }
    
    public function viewDetailTicket($id_ticket) {
        $tickets = Ticket::find($id_ticket);
        return view('home.list_ticket', compact('tickets'));
    }

    public function searchFlight(Request $request) {
       
        $flights = DB::table('flights')->get();
        $arilines = DB::table('airlines')->get();;
        $airports = DB::table('airport')->get();;

        if($request->flying_from != ''){
            
            $tickets = DB::table('tickets')
                ->join('flights', 'flights.id_flight', '=', 'tickets.id_flight')
                ->join('airport', 'airport.id_airport', '=', 'flights.id_form_airport')
                ->where('airport.city', 'like', '%' . $request->flying_from . '%')
                ->get();
                    
        }

        if($request->flying_to != ''){
            
            $tickets = DB::table('tickets')
                ->join('flights', 'flights.id_flight', '=', 'tickets.id_flight')
                ->join('airport', 'airport.id_airport', '=', 'flights.id_to_airport')
                ->where('airport.city', 'like', '%' . $request->flying_to . '%')
                ->get();
                
        }

        if($request->departure_time != ''){
            
            $tickets = DB::table('tickets')
                ->join('flights', 'flights.id_flight', '=', 'tickets.id_flight')
                ->where('flights.departure_time', 'like', '%' . $request->departure_time . '%')
                ->get();
               
        }
        
        if($request->arrival_time != ''){
            
            $tickets = DB::table('tickets')
                ->join('flights', 'flights.id_flight', '=', 'tickets.id_flight')
                ->where('flights.arrival_time', 'like', '%' . $request->arrival_time . '%')
                ->get();
               
        }
            
            
        return view('home.list_ticket', compact('tickets','flights','arilines','airports'));
    }
}
