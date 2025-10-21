<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'surname',
        'name',
        'email',
        'password',
        'date_of_birth',
        'limit_of_books',
        'reputation',
    ];
    public function libraries()
    {
        return $this->hasMany(Library::class, 'owner_reader_id');
    }

    public function loans()
    {
        return $this->hasMany(Loan::class);
    }

    public function books()
    {
        return $this->hasManyThrough(
            Book::class,
            Copy::class,
            'library_id',
            'id',
            'id',
        );
    }
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function copies()
    {
        return $this->belongsToMany(Copy::class, 'loans', 'reader_id', 'copy_id')
            ->withPivot('loan_date', 'return_date', 'status');
    }
}
