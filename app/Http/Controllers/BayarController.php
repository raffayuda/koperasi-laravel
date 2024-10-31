<?php

namespace App\Http\Controllers;

use App\Models\Pinjaman;
use Illuminate\Http\Request;

class BayarController extends Controller
{
    public function index(Request $request){
        
            $data = Pinjaman::all();
        return view('bayar.index', compact('data'));
    }

    public function viewBayar($id){
        $data = Pinjaman::find($id);
        return view('bayar.bayar', compact('data'));
    }

    public function bayar(Request $request, $id){
        $pinjaman = Pinjaman::findOrFail($id);
        $pinjaman->tanggal_bayar = $request->tanggal_bayar;
        $pinjaman->status = ($pinjaman->jumlah_pinjaman - $request->bayar <= 0) ? 'lunas' : 'belum lunas';
        $pinjaman->sudah_bayar = $pinjaman->sudah_bayar + 1;
        $pinjaman->save();
        $pinjaman->update($request->all());

        return redirect('/bayar')->with('success', 'Pembayaran Berhasil');
    }

    public function delete($id){
        $data = Pinjaman::find($id);
        $data->delete();
        return redirect('/bayar')->with('success', 'Data Pembayaran Berhasil Di Hapus');
    }
}
