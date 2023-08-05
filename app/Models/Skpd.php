<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skpd extends Model
{
    use HasFactory;


    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function identitas()
    {
        return $this->hasMany(Identitas::class);
    }

    public function rjabatan()
    {
        return $this->hasMany(RiwayatJabatan::class);
    }
}
