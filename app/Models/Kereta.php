<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kereta extends Model
{
    protected $table = 'kereta';
    protected $fillable = ['nama', 'kelas', 'jam', 'awal', 'akhir', 'harga', 'avatar'];
}
