<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Library extends Model
{
    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_reader_id');
    }

    public function copies()
    {
        return $this->hasMany(Copy::class);
    }
}
