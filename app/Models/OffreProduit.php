<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OffreProduit extends Model
{
    protected $fillable = [
        'offre_id', 'nom', 'quantite', 'prix_unitaire'
    ];

    public function offre()
    {
        return $this->belongsTo(Offre::class);
    }
}