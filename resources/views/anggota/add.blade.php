@extends('layouts.admin')
@section('content')

<div class="row">
  <div class="col">
    <h1 class="text-center text-dark">Tambah Data Anggota</h1>
            <div class="card" style="background: linear-gradient(45deg, #5549E6,#B43CE6,#7E3CE5)">
                <div class="card-body">
                    <form action="/anggota/add/proses" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                          <div class="mb-3 mt-2 form-floating col">
                            <input type="text" name="nama" class="form-control text-white ganti" placeholder="Nama Anggota" autocomplete="off" required>
                            <label for="exampleInputEmail1" class="form-label" style="font-size: 15px; margin-left:10px">Nama Anggota</label>
                          </div>
                          <div class="mb-3 form-floating col d-none">
                            <input type="text" name="kd_anggota" class="form-control text-white ganti" placeholder="Kode Anggota" autocomplete="off">
                            <label for="exampleInputEmail1" class="form-label" style="font-size: 15px; margin-left:10px;">Kode Anggota</label>
                          </div>
                          <div class="mb-3 col">
                             <div class="">
                               <label for="floatingSelect">Jenis Kelamin</label>
                              <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="jeniskelamin">
                                <option value="1">Cowok</option>
                                <option value="2">Cewek</option>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="mb-3 form-floating col">
                            <div class="mb-3 form-floating">
                              <input type="number" name="nik" class="form-control text-white" placeholder="NIK" required>
                              <label for="exampleInputEmail1" class="form-label" style="font-size: 15px">NIK</label>
                            </div>
                            @error('nik')    
                            <span>NIK harus berisi 16 digit</span>
                            @enderror
                          </div>
                          <div class="mb-3 col">
                            <div class="mb-3 form-floating">
                              <input type="number" name="notelpon" class="form-control text-white" placeholder="No Telpon" required>
                              <label for="exampleInputEmail1" class="form-label" style="font-size: 15px">No Telpon</label>
                            </div>
                            @error('notelpon')
                            <span class="text-danger">No telpon minimal 11 digit</span>    
                            @enderror
                          </div>
                        </div>
                        <div class="row">
                          <div class="mb-3 col">
                            <div class="form-floating">
                              <textarea class="form-control text-white" placeholder="Alamat Rumah" id="floatingTextarea2" style="height: 100px" name="alamat" required></textarea>
                              <label for="exampleInputEmail1" class="form-label" style="font-size: 15px">Alamat Rumah</label>
                            </div>
                          </div>
                          <div class="mb-3 col">
                            <div class="form-floating">
                              <textarea class="form-control text-white" placeholder="Alamat KTP" id="floatingTextarea2" style="height: 100px" name="alamat_ktp" required></textarea>
                              <label for="exampleInputEmail1" class="form-label" style="font-size: 15px">Alamat KTP</label>
                            </div>
                          </div>
                        </div>
                        <button type="submit" class="btn btn-info">Submit</button><a class="btn btn-primary mx-2" href="{{ URL::previous() }}">Kembali</a>
                    </form>
            </div>
        </div>
    </div>
</div>
@endsection