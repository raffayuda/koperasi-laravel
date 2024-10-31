@extends('layouts.admin')
@section('content')    
<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="text-center text-dark">Tambah Data Pinjaman</h1>
            <div class="card" style="background: linear-gradient(45deg, #5549E6,#B43CE6,#7E3CE5)">
                <div class="card-body">
                    <form action="/pinjaman/add/proses" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="mb-3 col-4">
                                   <label for="floatingSelect">Nama Anggota</label>
                                <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="anggota_id">
                                    @foreach ($anggota as $item)    
                                    <option value="{{$item->id}}">{{$item->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="mb-3 col">
                            <div class="mb-3 form-floating">
                                <input type="number" name="jumlah_pinjaman" class="form-control text-white" placeholder="Jumlah Pinajaman" required>
                                <label for="exampleInputEmail1" class="form-label" style="font-size: 15px">Jumlah Pinjaman</label>
                            </div>
                            </div>
                            <div class="mb-3 col">
                            <div class="mb-3 form-floating">
                                <input type="date" name="tanggal_pinjaman" class="form-control text-white" placeholder="Tanggal Pinjaman" required>
                                <label for="exampleInputEmail1" class="form-label" style="font-size: 15px">Tanggal Pinjaman</label>
                            </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col">
                                <div class="mb-3 form-floating">
                                    <input type="number" name="berapa_kali" class="form-control text-white" placeholder="Berapa Kali" required>
                                    <label for="exampleInputEmail1" class="form-label" style="font-size: 15px">Berapa Kali</label>
                                </div>
                                </div>
                            
                                <div class="mb-3 col">
                                <div class="mb-3 form-floating">
                                    <input type="number" name="jasa" class="form-control text-white col-md-4" placeholder="Jasa %" required> 
                                    <label for="exampleInputEmail1" class="form-label" style="font-size: 15px">Jasa %</label>
                                </div>
                                </div>
                            </div>
                            <input type="hidden" name="sudah_bayar" value=0>
                        <button type="submit" class="btn btn-info">Submit</button><a class="btn btn-primary mx-2" href="{{ URL::previous() }}">Kembali</a>
                      </form>
                </div>
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
    var result = valueA;

    // Tampilkan hasilnya di input C
    inputB.value = result;
  }
</script>
@endsection