<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    
protected $fillable = [
    'name',
    'description',
    'age_from',
    'age_to',
    'capacity',
    'start_time',
    'end_time',
    'price',
];

     public function kids()
     {
        return $this->belongsToMany(Kid::class);
     }
}
