<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'nom', 'ville', 'telephone', 'email',
        'secteur', 'type', 'ca_genere', 'notes', 'user_id'
    ];

    public function visites() {
        return $this->hasMany(Visite::class);
    }

    public function offres() {
        return $this->hasMany(Offre::class);
    }

    public function contacts() {
        return $this->hasMany(Contact::class);
    }

    public function commercial() {
        return $this->belongsTo(User::class, 'user_id');
    }
}