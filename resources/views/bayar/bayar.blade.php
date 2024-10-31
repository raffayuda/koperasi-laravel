@extends('layouts.admin')
@section('content')    
<div class="row">
    <div class="col">
      <h1 class="text-center text-dark">Pembayaran</h1>
            <div class="card" style="background: linear-gradient(45deg, #5549E6,#B43CE6,#7E3CE5)">
                <div class="card-body">
                    <p>Pinjaman Anda : {{formatRupiah($data->total)}}</p>
                    <form action="/bayar/proses/{{$data->id}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                        <div class="mb-3 form-floating">
                            <input type="number" class="form-control text-white" placeholder="Besar Pembayaran" id="inputA" required>
                            <label for="exampleInputEmail1" class="form-label" style="font-size: 15px">Besar Pembayaran</label>
                        </div>
                        </div>
                        <span id="error-message"></span>
                        <input type="hidden" value="{{$data->bayar}}" id="inputD">
                        <input type="hidden" name="bayar" value="editResult()" id="inputE">
                                <input type="hidden" class="form-control text-white" placeholder="Besar Pembayaran" id="inputB" required value="{{$data->total}}">
                        <input type="number" name="total" id="inputC" value="updateResult()" class="d-none" oninput="submitForm()">
                        <input type="number" name="jumlah_pinjaman" id="inputF" value="updateResult()" class="d-none">
                        <div class="mb-3">
                        <div class="mb-3 form-floating">
                            <input type="date" name="tanggal_bayar" class="form-control text-white" placeholder="Tanggal Bayar" required>
                            <label for="exampleInputEmail1" class="form-label" style="font-size: 15px">Tanggal Bayar</label>
                        </div>
                        </div>
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
  var inputD = document.getElementById('inputD');
  var inputE = document.getElementById('inputE');
  var inputF = document.getElementById('inputF');

  // Tambahkan event listener untuk input A dan input B
  inputA.addEventListener('input', updateResult);
  inputB.addEventListener('input', updateResult);
  inputA.addEventListener('input', editResult);
  inputD.addEventListener('input', editResult);

  // Fungsi untuk mengupdate input C
  function updateResult() {
    // Ambil nilai dari input A dan input B, lalu tambahkan
    var valueA = parseFloat(inputA.value) || 0; // Menggunakan parseFloat untuk mengatasi input non-numeric
    var valueB = parseFloat(inputB.value) || 0;
    var result = valueB - valueA;

    // Tampilkan hasilnya di input C
    inputC.value = result;
    inputF.value = result;
  }
  function editResult() {
    // Ambil nilai dari input A dan input B, lalu tambahkan
    var valueA = parseFloat(inputA.value) || 0; // Menggunakan parseFloat untuk mengatasi input non-numeric
    var valueD = parseFloat(inputD.value) || 0;
    var result = valueD + valueA;

    // Tampilkan hasilnya di input C
    inputE.value = result;
  }
  function result() {
    // Ambil nilai dari input A dan input B, lalu tambahkan
    var valueA = parseFloat(inputA.value) || 0; // Menggunakan parseFloat untuk mengatasi input non-numeric
    var valueD = parseFloat(inputD.value) || 0;
    var result = valueD + valueA;

    // Tampilkan hasilnya di input C
    inputE.value = result;
  }
  

  function submitForm() {
    var inputValue = document.getElementById("inputC").value;
    var errorMessage = document.getElementById("error-message");

    if (inputValue < 0) {
        errorMessage.innerHTML = "Nilai tidak boleh kurang dari 0.";
        return false; // Mencegah formulir diajukan jika nilai kurang dari 0
    } else {
        errorMessage.innerHTML = "";
        return true; // Izinkan formulir diajukan jika nilai valid
    }
}
</script>
@endsection