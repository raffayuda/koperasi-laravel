@extends('layouts.admin')
@section('content')    
<div class="container">
    <h1 class="text-center text-dark">Edit Data</h1>
    <div class="row justify-content-center">
        <div class="col-md-10 mt-4 mb-5">
            <div class="card" style="background: linear-gradient(45deg, #5549E6,#B43CE6,#7E3CE5)">
                <div class="card-body">
                    <form action="/anggota/edit/proses/{{$data->id}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                          <div class="mb-3 mt-3 form-floating col">
                            <input type="text" name="nama" class="form-control text-white" placeholder="Nama Anggota" value="{{$data->nama}}" autocomplete="off" required>
                            <label for="exampleInputEmail1" class="form-label" style="font-size: 15px; margin-left:10px;">Nama Anggota</label>
                          </div>
                          <div class="mb-3 form-floating col d-none">
                            <input type="text" name="kd_anggota" class="form-control text-white" placeholder="Kode Anggota" value="{{$data->kd_anggota}}" autocomplete="off">
                            <label for="exampleInputEmail1" class="form-label" style="font-size: 15px; margin-left:10px;">Kode Anggota</label>
                          </div>
                          <div class="mb-3 col">
                             <div class="">
                               <label for="floatingSelect">Jenis Kelamin</label>
                              <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="jeniskelamin">
                                <option selected>{{$data->jeniskelamin}}</option>
                                <option value="1">Cowok</option>
                                <option value="2">Cewek</option>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="mb-3 col">
                          <div class="mb-3 form-floating">
                              <input type="number" name="notelpon" class="form-control text-white" placeholder="No Telpon" value="{{$data->notelpon}}" required>
                              <label for="exampleInputEmail1" class="form-label" style="font-size: 15px">No Telpon</label>
                              </div>
                          </div>
                          @error('notelpon')
                              <span class="text-danger" style="font-size: 10px;">No telpon minimal 11 digit</span>
                          @enderror
                          <div class="mb-3 form-floating col">
                            <div class="mb-3 form-floating">
                              <input type="number" name="nik" class="form-control text-white" placeholder="NIK" value="{{$data->nik}}" required>
                              <label for="exampleInputEmail1" class="form-label" style="font-size: 15px">NIK</label>
                            </div>
                            @error('nik')
                                <span class="text-danger" style="font-size: 10px">NIK harus berisi 13 digit</span>
                            @enderror
                          </div>
                        </div>
                        <div class="row">
                          <div class="mb-3 col">
                            <div class="form-floating">
                              <textarea class="form-control text-white" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="alamat" required>{{$data->alamat}}</textarea>
                              <label for="floatingTextarea2">Alamat</label>
                            </div>
                          </div>
                          <div class="mb-3 col">
                            <div class="form-floating">
                              <textarea class="form-control text-white" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="alamat_ktp" required>{{$data->alamat_ktp}}</textarea>
                              <label for="floatingTextarea2">Alamat KTP</label>
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
@endsection