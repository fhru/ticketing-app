<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;

class SiswaController extends Controller
{
    public function index(Request $request){

        if ($request->has('cari')) {
            $data_siswa = Siswa::where('nama_depan','LIKE','%'.$request->cari.'%')->get();
        }else {
            $data_siswa = \App\Models\Siswa::all();
        }
        return view('siswa.index', compact('data_siswa'));
    }

    public function create(Request $request){
        $siswa = Siswa::create($request->all());
        $user = new \App\Models\User;
        $user->role = 'siswa';
        $user->name = $siswa->name_depan;
        
        return redirect('/siswa')->with('sukses', 'Data Berhasil Di Input');
    }
    public function edit($id)
    {
        $siswa = Siswa::find($id);
        return view('siswa.edit', compact('siswa'));
    }
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $siswa = Siswa::find($id);
        $siswa->update($request->all());
        if ($request->hasFile('avatar')) {
            $request->file('avatar')->move('images/', $request->file('avatar')->getClientOriginalName());
            $siswa->avatar =  $request->file('avatar')->getClientOriginalName();
            $siswa->save();
        }
        return redirect('/siswa')->with('sukses','Data Berhasil Di edit');
    }
    public function delete($id)
    {
        $siswa = Siswa::find($id);
        $siswa->delete();
        return redirect('/siswa')->with('sukses','Data Berhasil Di Hapus');
    }
    public function profile($id)
    {
        $siswa = Siswa::find($id);
        return view('siswa.profile', compact('siswa'));
    }
}
