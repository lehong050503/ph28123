<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmail;
use App\Mail\TestMail;
use App\Models\Airline;
use App\Models\Airport;
use App\Models\Booking;
use App\Models\Flight;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use SebastianBergmann\CodeCoverage\Report\Xml\Tests;

class OrderController extends Controller
{
    //
    public function getOrderTicket($id_ticket){
        $tickets = DB::table('tickets')->where('tickets.id_ticket','=',$id_ticket)->get();
        $ticket = DB::table('tickets')->where('tickets.id_ticket','=',$id_ticket)->first();
        $flights = Flight::all();
        $airlines = Airline::all();
        $airports = Airport::all();
        $user = Auth::user();
        $totalPrice = 500 ;

        return view('order.order_detail', compact('flights','tickets','airports','airlines','user','totalPrice','ticket'));
    }
    public function orderTicket(Request $request,$id_tickets) {
        
        if(Auth::check()){
            $user = Auth::user();
            $ticket = DB::table('tickets')->where('id_ticket','=',$id_tickets)->first();

            $totalPrice = $ticket->price+500;
            $payment = 'Online payment';
                
            $result = DB::table('booking')->insert([
                'id_ticket'=> $id_tickets,
                'id_user'=> $user->id,
                'quantity'=> 1,
                'payment_method'=> $payment,
                'total_price'=> $totalPrice,
                'created_at'=> now(),
            ]);

            if($result){
                $testMail = new TestMail();
                Mail::to('hongltph28123@fpt.edu.vn')->send(new TestMail());
                // Mail::to($request->email)->send(new TestMail());
                return view('order.order_success', compact('user','ticket'));
            }else{
                echo 'Đặt hàng không thành công';
            }
            return view('order.order_success', compact('user','ticket'));
        }

    }
}
