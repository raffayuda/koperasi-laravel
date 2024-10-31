@extends('layouts.admin')
@section('content')    
<div class="row">
  <div class="col">
    <h1 class="text-center text-dark">Edit Data Penjualan</h1>
            <div class="card" style="background: linear-gradient(45deg, #5549E6,#B43CE6,#7E3CE5)">
                <div class="card-body">
                    <form action="/penjualan/proses/{{$data->id}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                          <div class="mb-3 col">
                            <label for="floatingSelect">Nama Anggota</label>
                              <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="anggota_id">
                                  @foreach ($anggota as $item)    
                                  <option value="{{$item->id}}" {{ $data->anggota_id == $item->id ? 'selected' : '' }}>{{$item->nama}}</option>
                                  @endforeach
                              </select>
                            </div>
                          <div class="mb-3 mt-3 col">
                              <div class="mb-3 form-floating">
                                  <input type="text" name="nama_barang" class="form-control text-white" placeholder="Nama Barang" value="{{$data->nama_barang}}" required>
                                  <label for="exampleInputEmail1" class="form-label" style="font-size: 15px">Nama Barang</label>
                              </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="mb-3 col">
                              <div class="mb-3 form-floating">
                                  <input type="text" name="kd_barang" class="form-control text-white" placeholder="Kode Barang" value="{{$data->kd_barang}}" required>
                                  <label for="exampleInputEmail1" class="form-label" style="font-size: 15px">Kode Barang</label>
                              </div>
                          </div>
                          <div class="mb-3 form-floating col">
                            <div class="mb-3 form-floating">
                              <input type="number" name="harga" class="form-control text-white" placeholder="Harga Barang" id="inputA" value="{{$data->harga}}" required>
                              <label for="exampleInputEmail1" class="form-label" style="font-size: 15px">Harga Barang</label>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="mb-3 form-floating col">
                            <div class="mb-3 form-floating">
                              <input type="number" name="jumlah" class="form-control text-white" placeholder="Jumlah Barang" id="inputB" value="{{$data->jumlah}}" required>
                              <label for="exampleInputEmail1" class="form-label" style="font-size: 15px">Jumlah Barang</label>
                            </div>
                          </div>
                          <input type="hidden" id="inputC" value="{{$data->total}}" name="total" required>
                          <div class="mb-3 col">
                            <div class="mb-3 form-floating">
                              <input type="date" name="tanggal_jual" class="form-control text-white" placeholder="Tanggal Punjualan" value="{{$data->tanggal_jual}}" required>
                              <label for="exampleInputEmail1" class="form-label" style="font-size: 15px">Tanggal Penjualan</label>
                            </div>
                          </div>
                        </div>
                        {{-- <div class="mb-3">
                            <div class="mb-3">
                            <label for="formFile" class="form-label">Masukkan Foto</label>
                            <input class="form-control" type="file" id="formFile" name="foto" value="{{$data->foto}}">
                            </div>
                        </div> --}}
                        <button type="submit" class="btn btn-info">Submit</button><a class="btn btn-primary mx-2" href="{{ URL::previous() }}">Kembali</a>
                    </form>
            </div>
        </div>
    </div>
</div>
<script>
    var inputA = document.getElementById('inputA');
    var inputB = document.getElementById('inputB');
    var inputC = document.getElementById('inputC');

    // Tambahkan event listener untuk input A dan input B
    inputA.addEventListener('input', updateResult);
    inputB.addEventListener('input', updateResult);

    // Fungsi untuk mengupdate input C
    function updateResult() {
      // Ambil nilai dari input A dan input B, lalu tambahkan
      var valueA = parseFloat(inputA.value) || 0; // Menggunakan parseFloat untuk mengatasi input non-numeric
      var valueB = parseFloat(inputB.value) || 0;
      var result = valueA * valueB;

      // Tampilkan hasilnya di input C
      inputC.value = result;
    }
</script>
@endsection