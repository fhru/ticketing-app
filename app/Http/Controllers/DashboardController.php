<?php

namespace App\Http\Controllers;

use App\Models\Kereta;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Crypt;
use App\Models\Pesawat;
use Carbon\Carbon;

/**
 * @author Fahru Rahman
 * @version 1.2
 */

class DashboardController extends Controller
{
    /**
     * mengembalikan ke view dashboard/index
     * @return \Illuminate\Http\Response
     */
    public function index()                     
    {
        return view('dashboards.index2');
    }
    
    public function user(Request $request)
    {   
        Paginator::useBootstrap();

        if ($request->has('cari')) {
            $data_user = User::where('email','=', $request->cari)
            ->orWhere('name','=',$request->cari)
            ->orWhere('role','=',$request->cari)
            ->orWhere('telepon','=',$request->cari)->paginate(10) ;
        }
        else {
            $data_user = User::orderBy('id', 'DESC')->paginate(10);
        }
        return view('dashboards.user.index', compact('data_user'));
    }

    public function userCreate(Request $request)
    {
        $user = new \App\Models\User;
        $user->role = $request->role;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->remember_token = Str::random(60);
        $user->save();

        return redirect('/user-list')->with('sukses','User Berhasil Ditambahkan');
    }

    public function userEdit($id)
    {
        $data_user = User::find($id);
        return view('dashboards.user.edit', compact('data_user'));
    }

    public function userUpdate(Request $request, $id)
    {
        $user = User::find($id);
        $user->role = $request->role;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->telepon = $request->telepon;
        $user->save();

        return redirect('/user-list')->with('sukses','User Berhasil Diedit');
    }
    
    public function userDelete($id)
    {
        $user = User::find($id);
        $user->delete();
        
        return redirect('/user-list')->with('sukses','User Berhasil Di Hapus');
    }

    public function indexPesawat(Request $request)
    {
        Paginator::useBootstrap();

        if ($request->has('cari')) {
            $data_pesawat = Pesawat::where('kode_pst','=', $request->cari)
            ->orWhere('nama','=',$request->cari)
            ->orWhere('status','=',$request->cari)->paginate(10);
        }else {
            $data_pesawat = Pesawat::orderBy('id', 'DESC')->paginate(10);
        }
        $data_bandara = \App\Models\Bandara::all();
        return view('dashboards.pesawat.index', compact('data_pesawat','data_bandara'));
    }

    public function indexKereta(Request $request)
    {
        Paginator::useBootstrap();

        if ($request->has('cari')) {
            $data_kereta = Kereta::where('kode_krt','=', $request->cari)
            ->orWhere('nama','=',$request->cari)
            ->orWhere('status','=',$request->cari)->paginate(10);
        }else {
            $data_kereta = Kereta::orderBy('id', 'DESC')->paginate(10);
        }
        $data_stasiun = \App\Models\Stasiun::all();
        return view('dashboards.kereta.index', compact('data_kereta','data_stasiun'));
    }

    public function createPesawat(Request $request)
    {
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

        return redirect('/airplane-list')->with('sukses', 'Data Tiket Berhasil Ditambahkan');
    }

    public function createKereta(Request $request)
    {
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
        $kereta->expired = Carbon::parse($request->pergi, 'Asia/Jakarta');

        // dd($kereta);
        $kereta->save();

        return redirect('/train-list')->with('sukses', 'Data Tiket Berhasil Ditambahkan');
    }

    public function editPesawat($id)
    {
        $pesawat = Pesawat::find($id);
        $data_bandara = \App\Models\Bandara::all();
        return view('dashboards.pesawat.edit', compact('pesawat','data_bandara'));
    }

    public function editKereta($id)
    {
        $kereta = Kereta::find($id);
        $data_stasiun = \App\Models\Stasiun::all();
        return view('dashboards.kereta.edit', compact('kereta','data_stasiun'));
    }

    public function updatePesawat(Request $request, $id)
    {
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
        $pesawat->status = $request->status;
        $pesawat->expired = Carbon::parse($request->pergi);

        $pesawat->save();

        return redirect('/airplane-list')->with('sukses','Data Tiket Berhasil Diedit');
    }
    
    public function updateKereta(Request $request, $id)
    {
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
        $kereta->status = $request->status;
        $kereta->expired = Carbon::parse($request->pergi);

        $kereta->save();

        return redirect('/train-list')->with('sukses','Data Tiket Berhasil Diedit');
    }

    public function deletePesawat($id)
    {
        $pesawat = Pesawat::find($id);
        $pesawat->delete();
        return redirect('/airplane-list')->with('sukses','Tiket Berhasil DiHapus');
    }

    public function deleteKereta($id)
    {
        $kereta = Kereta::find($id);
        $kereta->delete();
        return redirect('/train-list')->with('sukses','Tiket Berhasil DiHapus');
    }
}
