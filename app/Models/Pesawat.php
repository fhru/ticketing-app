<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesawat extends Model
{
    protected $table = 'pesawat';
    protected $fillable = ['nama', 'kelas', 'jam', 'awal', 'akhir', 'harga', 'avatar'];

    public function bandara()
    {
        return $this->belongsTo('\App\Models\Bandara');
    }
}
