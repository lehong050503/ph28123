<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Flight extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'flights';
    protected $fillable = [
        'id_airline',
        'id_form_airport',
        'id_to_airport',
        'departure_time',
        'arrival_time',
        'status_flight'
    ];
}
