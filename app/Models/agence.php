<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class agence extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        "fullname",
        "email",
        "password",
        "adresse",
        "phone",
        "inmmatriculation"
    ];

    protected $hidden = [
        "password",
        "rememberToken"
    ];


    // public function setPasswordAttribute($value)
    // {
    //     $this->attributes['password'] = Hash::make($value);
    // }

     

    public function personnel(){
        return $this->hasMany(personnel::class);
    }
}
