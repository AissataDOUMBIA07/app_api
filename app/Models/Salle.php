<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\agence;

class Salle extends Model
{
    use HasFactory;

    protected $fillable = [
        "libelle",
        "nombreplace",
        "agence_id"
    ];


    public function agence(){
        return $this->belongsTo(agence::class);
    }


}
