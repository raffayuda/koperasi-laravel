<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Penjualan;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    public function index(){
        $data = Penjualan::all();
        $hitung = Penjualan::sum('total');
        return view('penjualan.index', compact('data', 'hitung'));
    }
    public function viewAdd(){
        return view('penjualan.add', ['anggota' => Anggota::all()]);
    }

    public function add(Request $request){
        $data = Penjualan::create($request->all());
        if($request->hasFile('foto')){
            $request->file('foto')->move('fotoAnggota/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }
        return redirect('/penjualan')->with('success', 'Data Penjualan Berhasil Ditambahkan');
    }

    public function viewEdit($id){
        $data = Penjualan::find($id);
        return view('penjualan.edit', ['data' => $data, 'anggota' => Anggota::all()]);
    }

    public function edit(Request $request, $id){
        $data = Penjualan::find($id);
        $data->update($request->all());
        if($request->hasFile('foto')){
            $request->file('foto')->move('fotoAnggota/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }
        return redirect('/penjualan')->with('success', 'Data Penjualan Berhasil Di Edit');
    }

    public function delete($id){
        $data = Penjualan::find($id);
        $data->delete();
        return redirect('/penjualan')->with('success', 'Data Penjualan Berhasil Di Hapus');
    }
}
