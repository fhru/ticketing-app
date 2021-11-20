<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiKeretaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi_kereta', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kereta');
            $table->string('from');
            $table->string('to');
            $table->string('nama');
            $table->string('email');
            $table->string('telepon');
            $table->string('total_harga');
            $table->string('nama_penumpang');
            $table->string('region_penumpang');
            $table->string('pembayaran');
            $table->string('tiket_id');
            $table->string('kode_tiket');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi_kereta');
    }
}
