<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


use App\Models\agence;
use App\Models\Salle;
use App\Models\personels;

class Formation extends Model
{
    use HasFactory;

    protected $fillable = [
        'libelle',
        'lieu',
        'datedebut',
        'datefin',
        'agence_id',
        'salle_id',
        'personnel_id'
    ];

    public function agence(){
        return $this->belongsTo(agence::class,'agence_id');
    }

    public function Salle(){
        return $this->belongsTo(Salle::class,'salle_id');
    }

    public function personels(){
        return $this->belongsTo(personels::class,'personnel_id');
    }
}
