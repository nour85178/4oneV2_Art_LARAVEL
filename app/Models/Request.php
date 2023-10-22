<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    protected $fillable = [
        'description', 'categorie', 'image', 'etat', 'user_id', 'artist_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function artist()
    {
        return $this->belongsTo(User::class, 'artist_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
