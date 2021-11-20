<?php

namespace App\Http\Controllers;

use App\Models\Kereta;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Str;
use Carbon\Carbon;

/** 
 * @author Fahru Rahman
 * @version 1.2
 */

class KeretaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
        public function index(Request $request) {

        Paginator::useBootstrap();

        if ($request->has('cari')) {
            $data_kereta = Kereta::where('kode_krt','LIKE','%'.$request->cari.'%')->paginate(10);
        }else {
            $data_kereta = Kereta::orderBy('id', 'DESC')->paginate(10);
        }
        $data_stasiun = \App\Models\Stasiun::all();
        return view('tiket.kereta.index', compact('data_kereta','data_stasiun'));
    }   
        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function create(Request $request){

        $kereta = new \App\Models\Kereta;
        $kereta->avatar = $request->avatar;
        $kereta->nama = $request->nama;
        $kereta->kelas = $request->kelas;
        $kereta->pergi = $request->pergi;
        $kereta->jam = $request->jam;
        $kereta->awal = $request->awal;
        $kereta->akhir = $request->akhir;
        $kereta->harga = $request->harga;
        $kereta->kode_krt = strtoupper('BRK'. Str::random(3));
        $kereta->status = 'available';
        $kereta->expired = Carbon::parse($request->pergi);

        $kereta->save();
        
        return redirect('/train-list')->with('sukses', 'Data Berhasil Di Input');
    }
        /**
         * Remove the specified resource from storage.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function delete($id)
    {
        $kereta = Kereta::find($id);
        $kereta->delete();
        return redirect('/train-list')->with('sukses','Data Berhasil Di Hapus');
    }
        /**
         * Show the form for editing the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function edit($id)
    {
        $data_stasiun = \App\Models\Stasiun::all();
        $kereta = Kereta::find($id);
        return view('tiket.kereta.edit', compact('kereta', 'data_stasiun'));
    }
        /**
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function update(Request $request, $id)
    {
        // dd($request->all());
        // $kereta = Kereta::find($id);
        $kereta = Kereta::find($id);
        $kereta->avatar = $request->avatar;
        $kereta->nama = $request->nama;
        $kereta->kelas = $request->kelas;
        $kereta->pergi = $request->pergi;
        $kereta->jam = $request->jam;
        $kereta->awal = $request->awal;
        $kereta->akhir = $request->akhir;
        $kereta->harga = $request->harga;
        $kereta->kode_krt = $request->kode_krt;
        $kereta->status = 'available';
        $kereta->expired = Carbon::parse($request->pergi);

        $kereta->save();

        return redirect('/train-list')->with('sukses','Data Berhasil Di edit');
    }
}