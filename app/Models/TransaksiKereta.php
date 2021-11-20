<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiKereta extends Model
{
    protected $table = 'transaksi_kereta';
    protected $fillable = ['nama_kereta', 'from', 'to', 'nama', 'email', 'telepon', 'total_harga', 'nama_penumpang', 'region_penumpang', 'pembayaran'];
}
