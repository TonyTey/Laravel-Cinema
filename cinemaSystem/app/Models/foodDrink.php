<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class foodDrink extends Model
{
    use HasFactory;
    protected $fillable=['id','name', 'image','price','quantity','description','category'];

    public function category(){

        return $this->belongsTo('App\Category');
    }
    
}
