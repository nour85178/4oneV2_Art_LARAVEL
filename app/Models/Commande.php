<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    protected $fillable = [
        'etat',
        'methode_paiement',
        'panier_id',
        'livraison_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public function livraison()
    {
        return $this->hasOne(Livraison::class); // Define the relationship
    }
    public function panier()
    {
        return $this->hasOne(panier::class); // Define the relationship
    }
    

}
