<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offre extends Model
{
    protected $fillable = [
        'reference', 'client_id', 'date', 'montant_total',
        'statut', 'delai_livraison', 'validite'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function produits()
    {
        return $this->hasMany(OffreProduit::class);
    }
}