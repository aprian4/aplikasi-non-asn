<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatJabatan extends Model
{
    use HasFactory;
    public function skpd()
    {
        return $this->belongsTo(Skpd::class);
    }

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class);
    }
    public function pendidikan()
    {
        return $this->belongsTo(Pendidikan::class);
    }
}
