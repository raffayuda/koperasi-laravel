@extends('layouts.admin')
@section('content')    
<div class="container">
    <h1 class="text-center text-dark">Edit Data Simpanan</h1>
    <div class="row justify-content-center">
        <div class="col-md-10 mt-4 mb-5">
            <div class="card" style="background: linear-gradient(45deg, #5549E6,#B43CE6,#7E3CE5)">
                <div class="card-body">
                    <form action="/simpanan/edit/proses/{{$data->id}}" method="POST" enctype="multipart/form-data">
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
                                <input type="number" name="simpanan" class="form-control text-white" placeholder="Simpanan Tabungan" id="inputA" required value="{{$data->simpanan}}">
                                <label for="exampleInputEmail1" class="form-label" style="font-size: 15px">Simpanan Tabungan</label>
                            </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col">
                            <div class="mb-3 form-floating">
                                <input type="date" name="tanggal" class="form-control text-white" placeholder="Tanggal Simpan" required value="{{$data->tanggal}}">
                                <label for="exampleInputEmail1" class="form-label" style="font-size: 15px">Tanggal Simpan</label>
                            </div>
                            </div>
                            <div class="mb-3 col">
                                <div class="mb-3 form-floating">
                                    <input type="number" name="wajib" class="form-control text-white" placeholder="Simpanan Wajib" required value="{{$data->wajib}}">
                                    <label for="exampleInputEmail1" class="form-label" style="font-size: 15px">Simpanan Wajib</label>
                                </div>
                                </div>
                                
                        </div>
                        <div class="row">
                            <div class="mb-3 col">
                                <div class="mb-3 form-floating">
                                    <input type="number" name="sukarela" class="form-control text-white" placeholder="Sukarela (Opsional)" value="{{$data->sukarela}}">
                                    <label for="exampleInputEmail1" class="form-label" style="font-size: 15px; margin-left:10px;">Sukarela (Opsional)</label>
                                </div>
                                </div>
                        </div>
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