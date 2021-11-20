<?php

namespace App\Http\Controllers;

use App\Models\TransaksiKereta;
use App\Models\TransaksiPesawat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Carbon\Carbon;

class AkunController extends Controller
{
    public function index()
    {
        return view('account.index');
    }
    public function pesawat()
    {
        $user_id = auth()->user()->id;

        // return data
        $tiket = TransaksiPesawat::where([
            ['transaksi_pesawat.customer_id', '=', $user_id],
            ['transaksi_pesawat.status', '=', 'Menunggu Pembayaran']
        ])->latest()->get();

        // dd($tiket);
        return view('account.pesawat.index', compact('tiket'));
    }

    public function kereta()
    {
        $user_id = auth()->user()->id;

        // return data
        $tiket = TransaksiKereta::where([
            ['transaksi_kereta.customer_id', '=', $user_id],
            ['transaksi_kereta.status', '=', 'Menunggu Pembayaran']
        ])->latest()->get();

            // dd($tiket);

        return view('account.kereta.index', compact('tiket'));
    }

    public function historyPesawat()
    {
        $user_id = auth()->user()->id;

        // return data
        $tiket = TransaksiPesawat::where([
            ['transaksi_pesawat.customer_id', '=', $user_id],
            ['transaksi_pesawat.status', '=', 'Telah Dibayar']
        ])->latest()->get();

        return view('account.pesawat.history', compact('tiket'));
    }

    public function historyKereta()
    {
        $user_id = auth()->user()->id;

        // return data
        $tiket = TransaksiKereta::where([
            ['transaksi_kereta.customer_id', '=', $user_id],
            ['transaksi_kereta.status', '=', 'Telah Dibayar']
        ])->latest()->get();

        return view('account.kereta.history', compact('tiket'));
    }

    public function paymentPesawat($id)
    {
        $data = Crypt::decrypt($id);
        $data_tiket = TransaksiPesawat::find($data);
        return view('account.pesawat.payment', compact('data_tiket'));
    }

    public function paymentKereta($id)
    {
        $data = Crypt::decrypt($id);
        $data_tiket = TransaksiKereta::find($data);
        return view('account.kereta.payment', compact('data_tiket'));
    }

    public function expiredPesawat()
    {
        $user_id = auth()->user()->id;

        // return data
        $tiket = TransaksiPesawat::where([
            ['transaksi_pesawat.customer_id', '=', $user_id],
            ['transaksi_pesawat.status', '=', 'Expired']
        ])->latest()->get();
            // dd($tiket);
        return view('account.pesawat.expired', compact('tiket'));
    }

    public function expiredKereta()
    {
        $user_id = auth()->user()->id;

        // return data
        $tiket = TransaksiKereta::where([
            ['transaksi_kereta.customer_id', '=', $user_id],
            ['transaksi_kereta.status', '=', 'Expired']
        ])->latest()->get();
            // dd($tiket);
        return view('account.kereta.expired', compact('tiket'));
    }

    public function printPesawat($id)
    {
        $data = Crypt::decrypt($id);
        $tiket = TransaksiPesawat::find($data);
        $time = Carbon::parse($tiket->pergi)->format('l, d F Y ');
        return view('account.pesawat.print', compact('tiket','time'));
    }

    public function printKereta($id)
    {
        $data = Crypt::decrypt($id);
        $tiket = TransaksiKereta::find($data);
        $time = Carbon::parse($tiket->pergi)->format('l, d F Y ');
        return view('account.kereta.print', compact('tiket','time'));
    }
}
