<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Permis;
use App\Models\agence;
use App\Models\Client;

class Permis extends Model
{
    use HasFactory;

    protected $fillable=[
        'type',
        'date',
        'agence_id',
        'client_id'
    ];


    public function agence(){
        return $this->belongsTo(agence::class);
    }

    public function Client(){
        return $this->belongsTo(Client::class);
    }
}
