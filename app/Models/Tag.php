<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name', 'description', 'color'];

    public function reviews()
    {
        return $this->belongsToMany(Review::class);
    }

    public function scopeWithReviewsCount($query)
    {
        return $query->withCount('reviews');
    }
}
