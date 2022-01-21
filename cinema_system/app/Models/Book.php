<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'name','date', 'time','quantity','cinema','seatNo','price','movieName','userId'];

    public function area(){

        return $this->belongsTo('App\Area');
    }

    public function dateTime(){

        return $this->belongsTo('App\DateTime');
    }

}
