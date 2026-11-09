<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'photo_path'];
public function votes()
{
    return $this->hasMany(\App\Models\Vote::class);
}

}
