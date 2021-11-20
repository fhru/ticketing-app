<?php

namespace App\Http\Controllers;

use App\Models\Kereta;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Crypt;

class TransaksiKeretaController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, $id)
    {
        $data = Crypt::decrypt($id);

        $kereta = Kereta::find($data);
        
        $current = Carbon::now('Asia/Jakarta')->format('Y-M-d H:i:s');
        $expired = Carbon::now('Asia/Jakarta')->addDays(1)->format('Y-M-d H:i:s');
        
        $dataTicket = new \App\Models\TransaksiKereta();
        $dataTicket->customer_id = auth()->user()->id;
        $dataTicket->nama_kereta = $kereta->nama;
        $dataTicket->from = $kereta->awal;
        $dataTicket->to = $kereta->akhir;
        $dataTicket->nama = $request->nama;
        $dataTicket->email = $request->email;
        $dataTicket->telepon = $request->telepon;
        $dataTicket->total_harga = $kereta->harga * $request->jml_penumpang;
        $dataTicket->region_penumpang = $request->region;
        $dataTicket->jml_penumpang = $request->jml_penumpang;
        $dataTicket->pergi = $kereta->pergi;
        $dataTicket->jam = $kereta->jam;
        $dataTicket->pembayaran = $request->pembayaran;
        $dataTicket->tiket_id = $kereta->id;
        $dataTicket->status = "Menunggu Pembayaran";
        $dataTicket->kode_tiket = strtoupper('BKRT'. auth()->user()->telepon .Str::random(3));
        $dataTicket->kode_krt = $kereta->kode_krt;
        $dataTicket->dibuat = $current;
        $dataTicket->expired = $expired;
        $dataTicket->save();
        
        
        // dd($dataTicket->kode_tiket,$dataTicket);        
        return redirect('/my-account/train/order')->with('sukses','Tiket Berhasil Ditambahkan Ke Cart');

    }


}
