<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'name', 'location', 'numberOfHalls', 'seatingCapacity', 'areaId'];

    public function area() {
        return $this->belongsTo('App\Area');
    }
}
