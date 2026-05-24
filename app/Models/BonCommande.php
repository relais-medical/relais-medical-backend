<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BonCommande extends Model
{
    protected $table = 'bons_commande';
    
    protected $fillable = [
        'client_id', 'numero', 'date', 
        'fichier', 'montant', 'statut', 'notes', 'modalite_paiement'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}