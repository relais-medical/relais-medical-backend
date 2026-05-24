<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rapport extends Model
{
    protected $fillable = [
        'visite_id', 'client_id', 'contact', 'fonction',
        'date', 'type_visite', 'objectif', 'compte_rendu',
        'interet_client', 'prochaine_action', 'statut', 'user_id'
    ];

    public function client() {
        return $this->belongsTo(Client::class);
    }

    public function visite() {
        return $this->belongsTo(Visite::class);
    }

    public function commercial() {
        return $this->belongsTo(User::class, 'user_id');
    }
}