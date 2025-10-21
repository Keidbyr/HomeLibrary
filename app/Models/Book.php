<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public function copies()
    {
        return $this->hasMany(Copy::class);
    }
}
