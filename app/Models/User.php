<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'role',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function commandes()
    {
        return $this->hasMany(Commande::class);
    }
    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public function requests()
    {
        return $this->hasMany(Request::class);
    }
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
