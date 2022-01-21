<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable=['id','totalAmount','movieName','seatNo','quantityTicket','date','time','userId','foodName','foodDrinkPrice','ticketPrice','foodID', 'userName'];
}
