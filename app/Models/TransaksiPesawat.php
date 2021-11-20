<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiPesawat extends Model
{
    protected $table = 'transaksi_pesawat';
    protected $fillable = ['nama_pesawat', 'from', 'to', 'nama', 'email', 'telepon', 'total_harga', 'nama_penumpang', 'region_penumpang', 'pembayaran'];
}
