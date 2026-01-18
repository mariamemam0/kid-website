<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    

     public function kids()
     {
        return $this->belongsToMany(Kid::class);
     }
}
