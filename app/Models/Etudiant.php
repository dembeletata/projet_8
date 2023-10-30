<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tuteur;
use App\Models\Image;

class Etudiant extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'prenom',
        'classe',
    ];
    public function tuteur() 
    {
        return $this->belongsTo(Tuteur::class, 'tuteur_id');
    }
    public function image()
    {
        return $this->hasOne(Image::class);
    }


}
