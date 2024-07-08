<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable=[
        'fullname',
        'conatct',
        'adresse',
        'age',
        'agence_id'
    ];


    public function agence(){
        return $this->belongsTo(agence::class, 'agence_id');
    }

    public function Examen(){
        return $this->hasMany(Examen::class, 'agence_id');
    }

}
