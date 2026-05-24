<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visite extends Model
{
    protected $fillable = [
        'client_id', 'date', 'heure', 'type_visite',
        'priorite', 'objectif', 'compte_rendu',
        'prochaine_action', 'statut'
    ];

    public function client() {
        return $this->belongsTo(Client::class);
    }
}