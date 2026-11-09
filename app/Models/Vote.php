<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    // Champs accessibles en assignation de masse
    protected $fillable = ['email', 'ip', 'categorie', 'nomine_id'];

    // Relation inverse avec le modèle Nomine
    public function nomine()
    {
        return $this->belongsTo(Nomine::class, 'nomine_id');
    }
}
