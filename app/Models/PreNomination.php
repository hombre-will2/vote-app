<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreNomination extends Model
{
    use HasFactory;

    protected $fillable = [
    'nom_artiste',
    'lien',
    'categorie',
    'motivation',
    'nom_proposant',
    'contact',
    'image',
];

}
