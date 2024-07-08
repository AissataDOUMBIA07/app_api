<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class personels extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        "email",
        "password",
        "fullname",
        "adresse",
        "phone",
        "status",
        "agence_id"
    ];

    protected $hidden = [
        "password",
        "rememberToken"
    ];

    public function agence(){
        return $this->belongsTo(agence::class);
    }
}
