<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nomine extends Model
{
    use HasFactory;

    // Champs autorisés à l'insertion et à la mise à jour
    protected $fillable = ['nom', 'categorie'];

    // Relation avec les votes
    public function votes()
    {
        return $this->hasMany(Vote::class, 'nomine_id'); // assure-toi que le champ s'appelle bien 'nomine_id' dans la table 'votes'
    }
}
