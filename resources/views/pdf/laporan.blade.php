<link rel="shortcut icon" href="{{public_path('log2.png')}}" type="image/x-icon">
<style>
  th, td{
    font-size: 13px;
  }
  th{
    color: white;
    background: black;
  }
</style>
<div class="nav" style="border-bottom:2px solid rgb(187, 0, 255);background: #ddd; width:800px; position:fixed; left:-50px; top:-50px; height:80px; margin:0;padding:0">
  <img src="{{public_path('log.png')}}" alt="" width="200px">
  <div style="transform:translate(650px,-60px)">@_uncleDay™</div>
</div>
<h1 align="center" style="margin-top: 50px">Laporan Koperasi</h1>
@foreach ($dataPri as $item)
<div>
  <div>
    <p>Nama : {{$item->nama}}</p>
    <p>Kode Anggota : KA-{{$item->id}}</p>
    <p>Alamat Rumah : {{$item->alamat}}</p>
  </div>
  <div style="position:absolute;right:0;top:110px">
    <p>Alamat KTP : {{$item->alamat_ktp}}</p>
    <p>No Telpon : 0{{$item->notelpon}}</p>
    <p>NIK : {{$item->nik}}</p>
  </div>
</div>
@endforeach
<h4>Simpanan</h4>
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
<h4 style="margin-top: 20px;">Pinjaman</h4>
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