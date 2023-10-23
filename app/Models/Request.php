<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    protected $fillable = [
        'description', 'categorie', 'image', 'etat'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
