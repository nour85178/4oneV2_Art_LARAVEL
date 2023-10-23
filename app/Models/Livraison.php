<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livraison extends Model
{

    protected $fillable = [
        'nom',
        'adresse',
    ];

    public function commande()
    {
        return $this->belongsTo(Commande::class); // Define the inverse relationship
    }
}
