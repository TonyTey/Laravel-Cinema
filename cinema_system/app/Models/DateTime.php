<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DateTime extends Model
{
    use HasFactory;
    protected $fillable=['id','movie', 'date','time', 'branchID'];

    public function movie() {
        
        return $this->belongsTo('App\Movie');
    }
}
