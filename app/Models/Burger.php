<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Burger extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'prix', 'image', 'description', 'stock', 'categorie_id'];

    public function commandes()
    {
        return $this->belongsToMany(Commande::class, 'commande_burger')->withPivot('quantite');
    }
    
    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }
    
    public function enStock()
    {
        return $this->stock > 0;
    }

}
