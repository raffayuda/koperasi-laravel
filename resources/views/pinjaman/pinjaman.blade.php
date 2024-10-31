@extends('layouts.admin')
@section('content')    
<div class="row">
    <div class="col">
        <h1 class="text-center text-dark">Edit Data Pinjaman</h1>
            <div class="card" style="background: linear-gradient(45deg, #5549E6,#B43CE6,#7E3CE5)">
                <div class="card-body">
                    <form action="/pinjaman/proses/{{$data->id}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="mb-3 col-6">
                                <label for="floatingSelect">Nama Anggota</label>
                                <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="anggota_id">
                                    @foreach ($anggota as $item)    
                                    <option value="{{$item->id}}" {{ $data->anggota_id == $item->id ? 'selected' : '' }}>{{$item->nama}}</option>
                                    @endforeach
                                </select>
                              </div>
                              
                        </div>
                        <div class="row">
                            <div class="mb-3 col">
                            <div class="mb-3 form-floating">
                                <input type="number" class="form-control text-white" placeholder="Jumlah Pinjaman" name="jumlah_pinjaman" id="inputA" value="{{$data->jumlah_pinjaman}}" required>
                                <label for="exampleInputEmail1" class="form-label" style="font-size: 15px">Jumlah Pinjaman</label>
                            </div>
                        </div>
                        <div class="mb-3 col">
                        <div class="mb-3 form-floating">
                            <input type="date" class="form-control text-white" placeholder="Tanggal Pinjam" name="tanggal_pinjam" value="{{$data->tanggal_pinjaman}}">
                            <label for="exampleInputEmail1" class="form-label" style="font-size: 15px">Tanggal Pinjam</label>
                        </div>
                        </div>
                        </div>
                        <div class="row">

                            <div class="mb-3 col">
                            <div class="mb-3 form-floating">
                                <input type="number" class="form-control text-white " placeholder="Berapa Kali" name="berapa_kali" value="{{$data->berapa_kali}}" required>
                                <label for="exampleInputEmail1" class="form-label" style="font-size: 15px">Berapa Kali</label>
                            </div>
                            </div>
                            <div class="mb-3 col">
                            <div class="mb-3 form-floating">
                                <input type="number" class="form-control text-white col-md-4" placeholder="Jasa %" id="inputB" name="jasa" value="{{$data->jasa}}" required>
                                <label for="exampleInputEmail1" class="form-label" style="font-size: 15px">Jasa %</label>
                            </div>
                            </div>
                        </div>
                        <input type="hidden" value="{{$data->total}}" id="inputC" name="total">
                        <input type="hidden" value="{{$data->sudah_bayar}}" name="sudah_bayar">
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
    var result = valueA + (valueA * valueB / 100);

    // Tampilkan hasilnya di input C
    inputC.value = result;
  }
</script>
@endsection