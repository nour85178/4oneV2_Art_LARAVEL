<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Panier extends Model
{
    use HasFactory;

    protected $fillable = ['prix_total'];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'panier_product', 'panier_id', 'product_id')
            ->withPivot('quantity');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function commande()
    {
        return $this->belongsTo(Commande::class); // Define the inverse relationship
    }
}
