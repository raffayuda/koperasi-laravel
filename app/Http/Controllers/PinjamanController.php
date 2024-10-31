<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Pinjaman;
use Illuminate\Http\Request;

class PinjamanController extends Controller
{
    public function index(Request $request)
    {
        $data = Pinjaman::all();
        return view('pinjaman.index', compact('data'));
    }

    public function viewAdd(){
        $anggotaList = Anggota::whereDoesntHave('pinjaman', function ($query) {
            $query->where('status', 'belum lunas');
        })->get();
        return view('pinjaman.add', ['anggota' => $anggotaList, 'pinjaman' => Pinjaman::all()]);
    }

    public function add(Request $request){
        $request->validate([
            'jumlah_pinjaman' => 'required|numeric|min:1',
            'tanggal_pinjaman' => 'required|date',
        ]);

        $pinjaman = new Pinjaman();
        $jumlahPeminjaman = $request->input('jumlah_pinjaman');
        $jasa = $request->input('jasa');
        $totalPeminjaman = $jumlahPeminjaman + ($jumlahPeminjaman * $jasa / 100);
        $pinjaman->anggota_id = $request->anggota_id;
        $pinjaman->jumlah_pinjaman = $request->jumlah_pinjaman;
        $pinjaman->tanggal_pinjaman = $request->tanggal_pinjaman;
        $pinjaman->jasa = $request->jasa;
        $pinjaman->berapa_kali = $request->berapa_kali;
        $pinjaman->sudah_bayar = $request->sudah_bayar;
        $pinjaman->total = $totalPeminjaman;
        $pinjaman->perbulan = $pinjaman->total / $request->berapa_kali;
        $pinjaman->status = 'belum lunas';
        $pinjaman->save();

        return redirect('/pinjaman')->with('success', 'Pinjaman Berhasil Di Tambahkan');
    }

    public function delete($id){
        $data = Pinjaman::find($id);
        $data->delete();
        return redirect('/pinjaman')->with('success', 'Data Pinjaman Berhasil Di Hapus');
    }

    public function viewPinjaman($id){
        $data = Pinjaman::find($id); 
        $anggota = Anggota::all(); 
        return view('pinjaman.pinjaman', compact('data', 'anggota'));
    }

    public function pinjaman(Request $request, $id){
        $data = Pinjaman::find($id);
        $data->update($request->all());
        return redirect('/pinjaman')->with('success', 'Data Berhasil Di Ubah');
    }
}
