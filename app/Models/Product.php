<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'titre', 'description', 'price', 'image','category','bidding_enabled','winner_id'
    ];
    public function commande()
    {
        return $this->belongsTo(Commande::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }
    public function bids()
    {
        return $this->hasMany(Bid::class);
    }
    public function currentBidAmount()
    {
        $highestBid = $this->bids->max('amount');
        return $highestBid ? $highestBid : $this->price;
    }
    public function winner()
    {
        return $this->belongsTo(User::class, 'winner_id');
    }
}
