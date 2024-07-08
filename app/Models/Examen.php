<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Examen extends Model
{
    use HasFactory;

    protected $fillable=[
        'type',
        'lieu',
        'heure',
        'date',
        'agence_id'
    ];

    public function agence(){
        return $this->belongsTo(agence::class,'agence_id');
    }

    public function Client(){
        return $this->hasMany(Client::class, 'agence_id');
    }

}
