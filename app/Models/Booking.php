<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $table = 'booking';
    protected $fillable = [
        'id_ticket',
        'id_user',
        'quantity',
        'payment_method',
        'total_price',
        'created_at',
    ];
}
