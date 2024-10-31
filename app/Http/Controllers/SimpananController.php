<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Simpanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Currency;


class SimpananController extends Controller
{
    public function index(Request $request){
        $data = Simpanan::all();
        return view('simpanan.index', compact('data'));
    }

    public function viewAdd(){
        return view('simpanan.add', [
            'anggota' => Anggota::all(),
            'simpanan' => Simpanan::all()
        ]);
    }

    public function add(Request $request){
         Simpanan::create($request->all());
        return redirect('/simpanan')->with('success', 'Data Simpanan Berhasil Ditambahkan');
    }

    public function tambah($id){
        $data = Simpanan::find($id);
        return view('simpanan.tambah', compact('data'));
    }

    public function tambahProses(Request $request, $id){
        $data = Simpanan::find($id);
        $data->update($request->all());
        return redirect('/simpanan')->with('success', 'Data Simpanan Berhasil Ditambahkan');
    }
    public function viewPenarikan($id){
        $data = Simpanan::find($id);
        return view('simpanan.penarikan', compact('data'));
    }
    public function penarikan(Request $request, $id){
        $data = Simpanan::find($id);
        $data->update($request->all());
        return redirect('/simpanan')->with('success', 'Penarikan Berhasil');
    }

    public function hapus($id){
        $data = Simpanan::find($id);
        $data->delete();
        return redirect('/simpanan')->with('success', 'Data Simpanan Berhasil Dihapus');
    }




    public function edit($id){
        $data = Simpanan::find($id);
        $anggota = Anggota::all();
        return view('simpanan/edit', compact('data', 'anggota'));
    }

    public function update(Request $request, $id){
        $data = Simpanan::find($id);
        $data->update($request->all());
        return redirect('/simpanan')->with('success', 'Data Berhasil Di Ubah');
    }
}