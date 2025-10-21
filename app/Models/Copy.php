<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Copy extends Model
{
    protected $fillable = ['book_id', 'integrity', 'in_stock', 'library_id'];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function library()
    {
        return $this->belongsTo(Library::class);
    }

    public function loans()
    {
        return $this->hasMany(Loan::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'loans', 'copy_id', 'reader_id')
            ->withPivot('loan_date', 'return_date', 'status');
    }
}
