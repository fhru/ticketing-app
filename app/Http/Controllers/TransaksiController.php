<?php

namespace App\Http\Controllers;

use App\Models\Bandara;
use App\Models\Stasiun;
use Illuminate\Http\Request;
use \App\Models\TransaksiPesawat;
use \App\Models\TransaksiKereta;
use Illuminate\Pagination\Paginator;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pesawat(Request $request)
    {
        Paginator::useBootstrap();

        if ($request->has('cari')) {
            $data_tiket = TransaksiPesawat::where('kode_tiket', '=', $request->cari)->paginate(15);
        } else {
            $data_tiket = TransaksiPesawat::orderBy('id', 'DESC')->paginate(15);
        }
        return view('dashboards.transaksi.pesawat.index', compact('data_tiket'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function kereta(Request $request)
    {
        Paginator::useBootstrap();

        if ($request->has('cari')) {
            $data_tiket = TransaksiKereta::where('kode_tiket', '=', $request->cari)->paginate(15);
        } else {
            $data_tiket = TransaksiKereta::orderBy('id', 'DESC')->paginate(15);
        }
        return view('dashboards.transaksi.kereta.index', compact('data_tiket'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editPesawat($id)
    {
        $data_tiket = \App\Models\TransaksiPesawat::find($id);
        $bandara = Bandara::all();
        return view('dashboards.transaksi.pesawat.edit', compact('data_tiket','bandara'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editKereta($id)
    {
        $data_tiket = \App\Models\TransaksiKereta::find($id);
        $stasiun = Stasiun::all();
        return view('dashboards.transaksi.kereta.edit', compact('data_tiket','stasiun'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatePesawat(Request $request, $id)
    {
        $tiket = \App\Models\TransaksiPesawat::find($id);
        $tiket->customer_id = auth()->user()->id;
        $tiket->nama_pesawat = $request->nama_pesawat;
        $tiket->from = $request->from;
        $tiket->to = $request->to;
        $tiket->nama = $request->nama;
        $tiket->email = $request->email;
        $tiket->telepon = $request->telepon;
        $tiket->total_harga = $request->total_harga;
        $tiket->region_penumpang = $request->region_penumpang;
        $tiket->jml_penumpang = $request->jml_penumpang;
        $tiket->pergi = $request->pergi;
        $tiket->jam = $request->jam;
        $tiket->pembayaran = $request->pembayaran;
        $tiket->tiket_id = $request->tiket_id;
        $tiket->kode_tiket = $request->kode_tiket;
        $tiket->status = $request->status;
        $tiket->kode_pst = $request->kode_pst;
        $tiket->expired = $request->expired;
        $tiket->save();

        return redirect('/airplane-transactions')->with('sukses', 'Data Transaksi Berhasil DiEdit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateKereta(Request $request, $id)
    {
        
        $tiket = \App\Models\TransaksiKereta::find($id);
        $tiket->customer_id = auth()->user()->id;
        $tiket->nama_kereta = $request->nama_kereta;
        $tiket->from = $request->from;
        $tiket->to = $request->to;
        $tiket->nama = $request->nama;
        $tiket->email = $request->email;
        $tiket->telepon = $request->telepon;
        $tiket->total_harga = $request->total_harga;
        $tiket->region_penumpang = $request->region_penumpang;
        $tiket->jml_penumpang = $request->jml_penumpang;
        $tiket->pergi = $request->pergi;
        $tiket->jam = $request->jam;
        $tiket->pembayaran = $request->pembayaran;
        $tiket->tiket_id = $request->tiket_id;
        $tiket->kode_tiket = $request->kode_tiket;
        $tiket->status = $request->status;
        $tiket->kode_krt = $request->kode_krt;
        $tiket->expired = $request->expired;
        $tiket->save();

        return redirect('/train-transactions')->with('sukses', 'Data Transaksi Berhasil DiEdit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deletePesawat($id)
    {
        $tiket = \App\Models\TransaksiPesawat::find($id);
        $tiket->delete();
        return redirect('/airplane-transactions')->with('sukses','Data Berhasil DiHapus');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteKereta($id)
    {
        $tiket = \App\Models\TransaksiKereta::find($id);
        $tiket->delete();
        return redirect('/train-transactions')->with('sukses','Data Berhasil DiHapus');
    }

    public function payPesawat($id)
    {
        $tiket = TransaksiPesawat::find($id);
        $tiket->status = "Telah Dibayar";
        $tiket->save();

        return redirect('/airplane-transactions')->with('sukses','Status Telah Diganti');
    }

    public function payKereta($id)
    {
        $tiket = TransaksiKereta::find($id);
        $tiket->status = "Telah Dibayar";
        $tiket->save();

        return redirect('/train-transactions')->with('sukses','Status Telah Diganti');
    }

    public function detailPesawat($id)
    {
        $pesawat = TransaksiPesawat::find($id);
        return view('dashboards.transaksi.pesawat.detail', compact('pesawat'));
    }

    public function detailKereta($id)
    {
        $kereta = TransaksiKereta::find($id);
        return view('dashboards.transaksi.kereta.detail', compact('kereta'));
    }
}
