<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voiture extends Model
{
    use HasFactory;

    protected $fillable = [
        'libelle',
        'nombreplace',
        'matricule',
        'marque',
        'couleur',
        'agence_id',
        'personnel_id'
    ];

    public function agence(){
        return $this->belongsTo(agence::class,'agence_id');
    }

    public function personels(){
        return $this->belongsTo(personels::class,'personnel_id');
    }
}
