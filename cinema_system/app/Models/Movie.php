<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'name', 'description','price', 'image','trailer', 'video', 'duration', 
                                'releaseDate', 'subtitle', 'cast', 'director', 'label', 'distributor', 
                                'branchID', 'status'];
                                
    public function branch() {
        return $this->belongTo('App\Branch');
    }
}