<?php

namespace App\Http\Controllers;

use App\Models\Pesawat;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Str;
use Carbon\Carbon;
/** 
 * @author Fahru Rahman
 * @version 1.2
 */

class PesawatController extends Controller{
        /**
         * Display a listing of the resource.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
         */
        public function index(Request $request){

        Paginator::useBootstrap();

        if ($request->has('cari')) {
            $data_pesawat = Pesawat::where('kode_pst','=', $request->cari)->paginate(10);
        }else {
            $data_pesawat = Pesawat::orderBy('id', 'DESC')->paginate(10);
        }
        $data_bandara = \App\Models\Bandara::all();
        return view('tiket.pesawat.index', compact('data_pesawat','data_bandara'));
        }
        /**
         * Show the form for creating a new resource.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
         */
        public function create(Request $request){
        
        $pesawat = new \App\Models\Pesawat;
        $pesawat->avatar = $request->avatar;
        $pesawat->nama = $request->nama;
        $pesawat->kelas = $request->kelas;
        $pesawat->pergi = $request->pergi;
        $pesawat->jam = $request->jam;
        $pesawat->awal = $request->awal;
        $pesawat->akhir = $request->akhir;
        $pesawat->harga = $request->harga;
        $pesawat->kode_pst = strtoupper('BRK'. Str::random(3));
        $pesawat->status = 'available';
        $pesawat->expired = Carbon::parse($request->pergi, 'Asia/Jakarta');

        // dd($pesawat);
        $pesawat->save();

        return redirect('/airplane-list')->with('sukses', 'Data Berhasil Di Input');
        }
        /**
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function update(Request $request, $id){
        // dd($request->all());
        $pesawat = Pesawat::find($id);
        $pesawat->avatar = $request->avatar;
        $pesawat->nama = $request->nama;
        $pesawat->kelas = $request->kelas;
        $pesawat->pergi = $request->pergi;
        $pesawat->jam = $request->jam;
        $pesawat->awal = $request->awal;
        $pesawat->akhir = $request->akhir;
        $pesawat->harga = $request->harga;
        $pesawat->kode_pst = $request->kode_pst;
        $pesawat->status = 'available';
        $pesawat->expired = Carbon::parse($request->pergi);

        $pesawat->save();

        return redirect('/airplane-list')->with('sukses','Data Berhasil Di edit');
        }
        /**
         * Remove the specified resource from storage.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function delete($id){
        $pesawat = Pesawat::find($id);
        $pesawat->delete();
        return redirect('/airplane-list')->with('sukses','Data Berhasil Di Hapus');
        }
        /**
         * Show the form for editing the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function edit($id){
        $pesawat = Pesawat::find($id);
        $data_bandara = \App\Models\Bandara::all();
        return view('tiket.pesawat.edit', compact('pesawat','data_bandara'));
        }
}
