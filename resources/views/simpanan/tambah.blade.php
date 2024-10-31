@extends('layouts.admin')
@section('content')    
<div class="container">
    <h1 class="text-center">Tambah Saldo Simpanan</h1>
    <div class="row justify-content-center">
        <div class="col-md-10 mt-4 mb-5">
            <div class="card" style="background: linear-gradient(45deg, #5549E6,#B43CE6,#7E3CE5)">
                <div class="card-body">
                    <form action="/simpanan/add/proses/{{$data->id}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                        <div class="mb-3 form-floating">
                            <input type="number" class="form-control text-white" placeholder="Besar Saldo" id="inputA" required>
                            <label for="inputA" class="form-label" style="font-size: 15px">Besar Saldo</label>
                        </div>
                        </div>
                        <div class="mb-3">
                        <div class="mb-3 form-floating">
                            <input type="date" class="form-control text-white" required name="tanggal_saldo">
                            <label class="form-label" style="font-size: 15px">Tanggal Tambah Saldo</label>
                        </div>
                        </div>
                        <input type="hidden" value="{{$data->simpanan}}" id="inputB">
                        <input type="hidden" name="simpanan" value="updateResult()" id="inputC">
                        <input type="hidden" value="{{$data->anggota_id}}" name="anggota_id">
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
    var result = valueA + valueB;

    // Tampilkan hasilnya di input C
    inputC.value = result;
  }
</script>
@endsection