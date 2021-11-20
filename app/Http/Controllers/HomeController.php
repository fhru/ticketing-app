<?php

namespace App\Http\Controllers;

use App\Models\Pesawat;
use App\Models\Kereta;
use App\Models\TransaksiKereta;
use App\Models\TransaksiPesawat;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;

/**
 * @author Fahru Rahman
 * @version 1.2
 */
class HomeController extends Controller
{
    
    /**
     * Mengambil data dari tabel popular dan memasukkannya ke dalam variabel data_popular
     * mengembalikan ke view home/popular dengan mengirim data_popular
     * @return \Illuminate\Http\Response
     */
    public function popular()
    {
        $data_popular = \App\Models\Popular::all();
        return view('home.popular', compact('data_popular'));
    }

    /**
     * mengembalikan view home
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        $current = Carbon::now('Asia/Jakarta');

        $pesawat = TransaksiPesawat::all();
        foreach ($pesawat as $pst) {
            if ($pst->status == 'Menunggu Pembayaran') {
                $time = Carbon::parse($pst->expired);
                if ($current > $time) {
                    $pst->status = 'Expired';
                    $pst->save();
                }
            }
        }
        
        $kereta = TransaksiKereta::all();
        foreach ($kereta as $krt) {
            if ($krt->status == 'Menunggu Pembayaran') {
                $time = Carbon::parse($pst->expired);
                if ($current > $time) {
                    $krt->status = 'Expired';
                    $krt->save();
                }
            }
        }

        $tiketpesawat = Pesawat::all();
        foreach ($tiketpesawat as $tktpst) {
            if ($tktpst->status == 'available') {
                $time = Carbon::parse($tktpst->expired);
                if ($current > $time) {
                    $tktpst->status = 'unavailable';
                    $tktpst->save();
                }
            }
        }
        
        $tiketkereta = Kereta::all();
        foreach ($tiketkereta as $tktkrt) {
            if ($tktkrt->status == 'available') {
                $time = Carbon::parse($tktkrt->expired);
                if ($current > $time) {
                    $tktkrt->status = 'unavailable';
                    $tktkrt->save();
                }
            }
        }

        // if ($current == Carbon::now('Asia/Jakarta')->format('Y-M-d H:i:s')) {
            
        // }
        // dd($tktpst,$tktpst->status,$time);
        return view('home');
    }

    /**
     * mengembalikan view home/about
     * @return \Illuminate\Http\Response
     */
    public function about()
    {   
        return view('home.about');
    }

    /**
     * mengembalikan view home/pesawat/cari
     * @return \Illuminate\Http\Response
     */
    public function CariPesawat()
    {
        $data_bandara = \App\Models\Bandara::all();
        return view('home.pesawat.cari', compact('data_bandara'));
    }

    /**
     * mengambil data dari cari tiket pesawat dan menampilkannya
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function TiketPesawat(Request $request)
    {

        if ($request->has('submit')) {
            $data_pesawat = Pesawat::where([
            ['awal', '=', $request->dari],
            ['akhir', '=', $request->ke],
            ['kelas', '=', $request->kelas],
            ['pergi', '=', $request->pergi],
            ['status', '=', 'available'],
            ])->get();
        }else {
            return redirect('/airplane-search');
        }

        return view('home.pesawat.index', compact('data_pesawat'));
    }

    /**
     * mengembalikan view home/kereta/cari
     */
    public function CariKereta()
    {
        $data_stasiun = \App\Models\Stasiun::all();
        return view('home.kereta.cari', compact('data_stasiun'));
    }

    /**
     * mengambil data dari cari tiket kereta dan menampilkannya
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function TiketKereta(Request $request)
    {

        if ($request->has('submit')) {
            $data_kereta = \App\Models\Kereta::where([
            ['awal', '=', $request->dari],
            ['akhir', '=', $request->ke],
            ['kelas', '=', $request->kelas],
            ['pergi', '=', $request->pergi],
            ['status', '=', 'available'],
            ])->get();
        }else {
            return redirect('/train-search');
        }

        return view('home.kereta.index', compact('data_kereta'));
    }

    public function formPesawat(Request $request,$id){

        $data = Crypt::decrypt($id);

        $data_negara = \App\Models\Negara::all();
        
        if ($request->has('submit')) {
            $pesawat = Pesawat::find($data);
        }else {
            return redirect('/airplane-search');
        }
        return view('home.form.pesawat.index', compact('pesawat', 'data_negara'));
    }

    public function formKereta(Request $request,$id){

        $data = Crypt::decrypt($id);

        $data_negara = \App\Models\Negara::all();
        
        if ($request->has('submit')) {
            $kereta = Kereta::find($data);
        }else {
            return redirect('/train-search');
        }
        return view('home.form.kereta.index', compact('kereta', 'data_negara'));
    }

}
