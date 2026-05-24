<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model {
    protected $fillable = ['client_id', 'nom', 'poste', 'telephone', 'email'];

    public function client() {
        return $this->belongsTo(Client::class);
    }
}