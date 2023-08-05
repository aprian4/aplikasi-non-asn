<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendidikan extends Model
{
    use HasFactory;

    public function identitas()
    {
        return $this->hasMany(Identitas::class);
    }

    public function rjabatan()
    {
        return $this->hasMany(RiwayatJabatan::class);
    }

    public function rpendidikan()
    {
        return $this->hasMany(RiwayatPendidikan::class);
    }
}
