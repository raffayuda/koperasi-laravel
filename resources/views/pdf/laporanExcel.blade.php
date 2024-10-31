<style>
  th, td{
    font-size: 13px;
  }
  th{
    color: white;
    background: black;
  }
</style>
<table>
  <tr>
    <th colspan="4" style="font-size: 25px; font-weight:bold;"><h1 align="center">Laporan Koperasi</h1></th>
  </tr>
</table>
<table>
  @foreach ($dataPri as $item)    
  <tr>
    <th colspan="3">Nama : {{$item->nama}}</th>
    <th colspan="3">Kode Anggota : {{$item->kd_anggota}}</th>
  </tr>
  @endforeach
  @foreach ($dataPri as $item)    
  <tr>
    <th colspan="3">Alamat KTP : {{$item->alamat_ktp}}</th>
    <th colspan="3">No Telpon : 0{{$item->notelpon}}</th>
  </tr>
  @endforeach
  @foreach ($dataPri as $item)    
  <tr>
    <th colspan="3">Alamat Rumah : {{$item->alamat}}</th>
    <th colspan="3">NIK : {{$item->nik}}</th>
  </tr>
  @endforeach
</table>
<table>
  <tr>
    <th colspan="3" style="font-size: 14px;font-weight:bold;">Simpanan</th>
  </tr>
</table>
<table border="1" cellpadding="10" cellspacing="0">
<thead>
  <tr>
    <th>#</th>
    <th>KD Anggota</th>
    <th>Nama</th>
    <th>Wajib</th>
    <th>Tabungan</th>
    <th>Sukarela</th>
    <th>Tgl Simpan</th>
    <th>Tgl Tambah Tabungan</th>
  </tr>
</thead>
<tbody>
  @foreach ($data as $item)
      <tr>
        <td>{{$loop->iteration}}</td>
        <td>KA-{{$item->anggota->id}}</td>
        <td>{{$item->anggota->nama}}</td>
        <td>{{formatRupiah($item->wajib)}}</td>
        <td>{{formatRupiah($item->simpanan)}}</td>
        <td>{{formatRupiah($item->sukarela)}}</td>
        <td>{{$item->tanggal}}</td>
        <td>{{$item->tanggal_saldo}}</td>
      </tr>
  @endforeach
</tbody>
<tfoot>
  <tr>
    <td colspan="3">Tabungan : {{formatRupiah($tabungan)}}</td>
    <td colspan="3">Wajib : {{formatRupiah($wajib)}}</td>
    <td colspan="2">Sukarela : {{formatRupiah($sukarela)}}</td>
  </tr>
</tfoot>
</table>
<br><br>
<table>
  <tr>
    <th colspan="3" style="font-size: 14px;font-weight:bold;">Pinjaman</th>
  </tr>
</table>
<table border="1" cellpadding="10" cellspacing="0">
  <thead style="border-bottom: 2px solid white">
      <tr>
          <th scope="col">#</th>
          <th scope="col">KD Anggota</th>
          <th scope="col">Nama</th>
          <th scope="col">Pinjaman</th>
          <th scope="col">/bln</th>
          <th scope="col">Jasa</th>
          <th scope="col">Total</th>
          <th scope="col">Tgl Pinjam</th>
          <th scope="col">Status</th>
      </tr>
  </thead>
  <tbody>
    @foreach ($dataPin as $item)    
    <tr>
      <td>{{$loop->iteration}}</td>
      <td>KA-{{$item->anggota->id}}</td>
      <td>{{$item->anggota->nama}}</td>
      <td>{{formatRupiah($item->jumlah_pinjaman)}}</td>
      <td>{{formatRupiah($item->perbulan)}}</td>
      <td>{{$item->jasa}}%</td>
      <td>{{formatRupiah($item->total)}}</td>
      <td>{{$item->tanggal_pinjaman}}</td>
      <td>{{$item->status}}</td>
    </tr>
    @endforeach
  </tbody>
  <tfoot>
    <tr>
      <td colspan="9">Total Pinjaman : {{formatRupiah($totalPin)}}</td>
    </tr>
  </tfoot>
</table>