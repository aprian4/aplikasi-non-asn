<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perkawinan extends Model
{
    use HasFactory;

    public function identitas()
    {
        return $this->hasMany(Identitas::class);
    }
}
