<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    
    public function listBookTicket() {
        $books = Booking::all();
        return view('admin.book_ticket.list_book', compact('books'));
        
    }
    public function detailBookTicket($id_book) {
        $book = DB::table('booking')->where('id_booking','=',$id_book);
        return view('admin.book_ticket.detail',compact('book'));
    }
}
