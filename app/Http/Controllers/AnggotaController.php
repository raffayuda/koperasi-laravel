<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    public function index(Request $request){
       
            $data = Anggota::all();
        return view('anggota.index', compact('data'));
    }

    public function viewAdd(){
        return view('anggota.add');
    }

    public function add(Request $request){
        $request->validate([
            'nik' => 'required|numeric|digits:16',
            'notelpon' => 'required|numeric|min:10',
        ]);
        Anggota::create($request->all());
        return redirect('/anggota')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function viewEdit($id){
        $data = Anggota::find($id);
        return view('anggota.edit', compact('data'));
    }

    public function edit(Request $request, $id){
        $request->validate([
            'nik' => 'required|numeric|digits:16',
            'notelpon' => 'required|numeric|min:10',
        ]);
        $data = Anggota::find($id);
        $data->update($request->all());
        return redirect('/anggota')->with('success', 'Data Berhasil Diupdate');
    }

    public function delete($id){
        $data = Anggota::find($id);
        $data->delete();
        return redirect('/anggota')->with('success', 'Data Berhasil Dihapus!');
    }
}
