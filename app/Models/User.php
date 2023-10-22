<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
    public function participations()
    {
        return $this->hasMany(Participation::class);
    }
    public function hasParticipatedInBid(Product $product)
    {
        return $this->participations()->where('product_id', $product->id)->exists();
    }
    public function wonProducts()
    {
        return $this->hasMany(Product::class, 'winner_id');
    }
    public function sentMessages()
    {
        return $this->hasMany(Message::class, 'sender_id');
    }

    public function receivedMessages()
    {
        return $this->hasMany(Message::class, 'receiver_id');
    }
    public function conversations(): HasMany
    {
        return $this->hasMany(Conversation::class, 'client_id'); // Assuming the foreign key is 'client_id'
    }
}
