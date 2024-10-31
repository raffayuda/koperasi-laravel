<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class Laporan implements FromView, ShouldAutoSize
{
    use Exportable;
    private $data;
    private $dataPin;
    private $tabungan;
    private $wajib;
    private $sukarela;
    private $totalPin;
    private $dataPri;

    public function __construct($data, $dataPin, $tabungan, $wajib, $sukarela, $totalPin, $dataPri)
    {
        $this->data = $data;
        $this->dataPin = $dataPin;
        $this->tabungan = $tabungan;
        $this->wajib = $wajib;
        $this->sukarela = $sukarela;
        $this->totalPin = $totalPin;
        $this->dataPri = $dataPri;
    }

    public function view(): View
    {
        return view('pdf.laporanExcel', [
            'data' => $this->data,
            'dataPin' => $this->dataPin,
            'tabungan' => $this->tabungan,
            'wajib' => $this->wajib,
            'sukarela' => $this->sukarela,
            'totalPin' => $this->totalPin,
            'dataPri' => $this->dataPri,
        ]);
    }
}
