<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Anggota;
use App\Exports\Laporan;
use App\Models\Pinjaman;
use App\Models\Simpanan;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class LaporanController extends Controller
{
    public function simpanan(){
        $data = Simpanan::distinct('anggota_id')->get('anggota_id');
        return view('laporan/laporanSim', compact('data'));
    }
    public function detailSim($anggota_id){
        $id = Simpanan::where('anggota_id', $anggota_id)->get('anggota_id');
        $tabungan = Simpanan::where('anggota_id', $anggota_id)->sum('simpanan');
        $wajib = Simpanan::where('anggota_id', $anggota_id)->sum('wajib');
        $sukarela = Simpanan::where('anggota_id', $anggota_id)->sum('sukarela');
        $data = Simpanan::where('anggota_id', $anggota_id)->get();
        return view('laporan/detailSim', compact('data', 'tabungan', 'wajib', 'sukarela', 'id'));
    }
    public function anggota(){
        $data = Anggota::all();
        return view('laporan/laporanAnggota', compact('data'));
    }

    public function pinjaman(){
        $data = Pinjaman::distinct('anggota_id')->get('anggota_id');
        return view('laporan/laporanPin', compact('data'));
    }
    public function detailPin($anggota_id){
        $total = Pinjaman::where('anggota_id', $anggota_id)->sum('total');
        $data = Pinjaman::where('anggota_id', $anggota_id)->get();
        return view('laporan/detailPin', compact('data', 'total'));
    }
    public function pembayaran(){
        $data = Pinjaman::distinct('anggota_id')->get('anggota_id');
        return view('laporan/laporanPem', compact('data'));
    }
    public function detailPem($anggota_id){
        $total = Pinjaman::where('anggota_id', $anggota_id)->sum('total');
        $data = Pinjaman::where('anggota_id', $anggota_id)->get();
        return view('laporan/detailPem', compact('data', 'total'));
    }
    public function penjualan(){
        $data = Penjualan::all();
        $hitung = Penjualan::sum('total');
        return view('laporan/laporanPenjualan', compact('data', 'hitung'));
    }

    public function filterAnggota(Request $request){
        $start_date = $request->start_date;
        $end_date = $request->end_date;

        $data = Anggota::whereDate('created_at','>=',$start_date)
                            ->whereDate('created_at','<=',$end_date)
                            ->get();
        return view('laporan/laporanAnggota', compact('data'));
    }
    
    public function filterPenjualan(Request $request){
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $hitung = Penjualan::sum('total');
        $data = Penjualan::whereDate('tanggal_jual','>=',$start_date)
                            ->whereDate('tanggal_jual','<=',$end_date)
                            ->get();
        return view('laporan/laporanPenjualan', compact('data','hitung'));
    }

    public function all(){
        $data = Anggota::all();
        return view('laporan.all', compact('data'));
    }

    public function detailAll($id){
        $data = Anggota::leftJoin('pinjamen', 'anggotas.id', '=', 'pinjamen.anggota_id')
                            ->leftJoin('simpanans', 'anggotas.id', '=', 'simpanans.anggota_id')
                            ->select('anggotas.*', 'simpanans.*', 'pinjamen.*')
                            ->where('anggotas.id', '=', $id)
                            ->get()                    
        ;
        // $data = Anggota::with('simpanan')->where('id', $id)->get();
        
        $totalPin = Pinjaman::where('anggota_id', $id)->sum('total');
        return view('laporan.detail', compact('data', 'totalPin'));
    }

    public function viewPDF($anggota_id){
        $dataPri = Anggota::where('id', $anggota_id)->get();
        $tabungan = Simpanan::where('anggota_id', $anggota_id)->sum('simpanan');
        $wajib = Simpanan::where('anggota_id', $anggota_id)->sum('wajib');
        $sukarela = Simpanan::where('anggota_id', $anggota_id)->sum('sukarela');
        $dataPin = Pinjaman::where('anggota_id', $anggota_id)->get();
        $totalPin = Pinjaman::where('anggota_id', $anggota_id)->sum('total');
        $data = Simpanan::where('anggota_id', $anggota_id)->get();
        $pdf = PDF::loadView('pdf.laporan', array('data' => $data, 'tabungan' => $tabungan, 'wajib' => $wajib, 'sukarela' => $sukarela, 'dataPin' => $dataPin, 'totalPin' => $totalPin, 'dataPri' => $dataPri))
        ->setPaper('a4', 'portrait')
        ;
        return $pdf->stream();

    }

    public function laporanKop(){
        $data = Anggota::paginate(6);
        return view('laporan.laporanKop', compact('data'));
    }
    public function laporanDetail($id){
        $tabungan = Simpanan::where('anggota_id', $id)->sum('simpanan');
        $wajib = Simpanan::where('anggota_id', $id)->sum('wajib');
        $sukarela = Simpanan::where('anggota_id', $id)->sum('sukarela');
        $wew = Anggota::where('id', $id)->get('id');
        $idsim = Simpanan::where('anggota_id', $id)->get('anggota_id');
        $data = Simpanan::where('anggota_id', $id)->get();
        $dataPin = Pinjaman::where('anggota_id', $id)->paginate(5);
        $totalPin = Pinjaman::where('anggota_id', $id)->sum('total');
        return view('laporan.laporanDetail', compact('data', 'wew', 'idsim', 'wajib', 'tabungan', 'sukarela', 'dataPin', 'totalPin'));
    }

    public function downloadPDF($anggota_id){
        $dataPri = Anggota::where('id', $anggota_id)->get();
        $tabungan = Simpanan::where('anggota_id', $anggota_id)->sum('simpanan');
        $wajib = Simpanan::where('anggota_id', $anggota_id)->sum('wajib');
        $sukarela = Simpanan::where('anggota_id', $anggota_id)->sum('sukarela');
        $dataPin = Pinjaman::where('anggota_id', $anggota_id)->get();
        $totalPin = Pinjaman::where('anggota_id', $anggota_id)->sum('total');
        $data = Simpanan::where('anggota_id', $anggota_id)->get();
        $pdf = PDF::loadView('pdf.laporan', array('data' => $data, 'tabungan' => $tabungan, 'wajib' => $wajib, 'sukarela' => $sukarela, 'dataPin' => $dataPin, 'totalPin' => $totalPin, 'dataPri' => $dataPri))
        ->setPaper('a4', 'portrait')
        ;
        return $pdf->download('laporan.pdf');
    }

    public function downloadExcel($anggota_id){
        $dataPri = Anggota::where('id', $anggota_id)->get();
        $tabungan = Simpanan::where('anggota_id', $anggota_id)->sum('simpanan');
        $wajib = Simpanan::where('anggota_id', $anggota_id)->sum('wajib');
        $sukarela = Simpanan::where('anggota_id', $anggota_id)->sum('sukarela');
        $dataPin = Pinjaman::where('anggota_id', $anggota_id)->get();
        $totalPin = Pinjaman::where('anggota_id', $anggota_id)->sum('total');
        $data = Simpanan::where('anggota_id', $anggota_id)->get();
        return Excel::download(new Laporan($data, $dataPin, $tabungan, $wajib, $sukarela, $totalPin, $dataPri), 'laporan.xlsx');
    }

    

}

