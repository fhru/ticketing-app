<?php

namespace App\Http\Controllers;

use App\Models\Pesawat;
use App\Models\TransaksiPesawat;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Crypt;

class TransaksiPesawatController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, $id)
    {
        // $this->validate($request,[
        //     'jml_penumpang ' => 'required|max:45',
        //     'email' => 'required|email|unique:users',
        //     'telepon' => 'required|unique:users',
        //     'password' => 'required|min:8'
        // ]);

        $data = Crypt::decrypt($id);

        $pesawat = Pesawat::find($data);
        
        $current = Carbon::now('Asia/Jakarta')->format('Y-M-d H:i:s');
        $expired = Carbon::now('Asia/Jakarta')->addDays(1)->format('Y-M-d H:i:s');

        $dataTicket = new \App\Models\TransaksiPesawat;
        $dataTicket->customer_id = auth()->user()->id;
        $dataTicket->nama_pesawat = $pesawat->nama;
        $dataTicket->from = $pesawat->awal;
        $dataTicket->to = $pesawat->akhir;
        $dataTicket->nama = $request->nama;
        $dataTicket->email = $request->email;
        $dataTicket->telepon = $request->telepon;
        $dataTicket->total_harga = $pesawat->harga * $request->jml_penumpang;
        $dataTicket->region_penumpang = $request->region;
        $dataTicket->jml_penumpang = $request->jml_penumpang;
        $dataTicket->pergi = $pesawat->pergi;
        $dataTicket->jam = $pesawat->jam;
        $dataTicket->pembayaran = $request->pembayaran;
        $dataTicket->tiket_id = $pesawat->id;
        $dataTicket->status = "Menunggu Pembayaran";
        $dataTicket->kode_tiket = strtoupper('BPST'. auth()->user()->telepon .Str::random(3));
        $dataTicket->kode_pst = $pesawat->kode_pst;
        $dataTicket->dibuat = $current;
        $dataTicket->expired = $expired;
        $dataTicket->save();
        

        // dd($dataTicket->kode_tiket,$dataTicket);
        // dd($dataTicket);
        return redirect('/my-account/airplane/order')->with('sukses','Tiket Berhasil Ditambahkan Ke Cart');

    }


}
