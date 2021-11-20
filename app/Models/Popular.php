<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Popular extends Model
{
    protected $table = 'popular';
    protected $fillable = ['gambar', 'nama', 'rating', 'deskripsi'];
}
