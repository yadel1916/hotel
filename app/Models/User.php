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
        'name',
        'lastname',
        'document',
        'address',
        'phone',
        'photo',
        'email',
        'password',
        'role',
    ];

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

    public function scheduling(){
        return $this->belongsTo('App\Models\Booking');
    }

    public function scopeNames($users, $query){
        if(trim($query)){
            $users->where('name', 'LIKE', '%' .$query. '%')
                  ->orWhere('email', 'LIKE', '%' .$query. '%');
        }
    }

    public function getPhotoAttribute($value)
    {
        return $value ? asset('storage/'. $value) :asset('img/usuario.jpg');
    }
}
