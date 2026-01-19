<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kid extends Model
{
     protected $fillable = [
         'name',
         'date_of_birth',
         'gender',
         'parent_name',
         'parent_phone',
         'address',
    ];



    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }
}
