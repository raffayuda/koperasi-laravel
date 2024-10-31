<title class="text-center">Laporan Penjualan</title>
<link rel="shortcut icon" href="{{asset('log2.png')}}" type="image/x-icon">
@extends('layouts.admin');
@section('content')
<style>
 
  input{
    border-radius: 5px
  }
 
  
  </style>
<div class="row">
  <div class="col">
    <h1 class="text-center"><a href="/laporanPenjualan" class="text-decoration-none text-dark">Laporan Data Penjualan</a></h1>
      @if ($message = Session::get('success'))
      <div class="alert alert-info mt-4" role="alert">
          {{$message}}
        </div>
      @endif
      <form action="/filterLaporanPenjualan" method="GET">
        <label for="month" class="text-dark">Mulai Tanggal :</label>
        <input type="date" name="start_date" required>
        
        <label for="year" class="text-dark">Sampai Tanggal :</label>
        <input type="date" name="end_date" required>
        
        <button type="submit" class="btn btn-success">Filter</button>
      </form>
          <div class="row">
            <div class="col">
              <div class="table-responsive">
                <table class="table mt-3 table-dark" id="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">KD Barang</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Harga Barang</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Total</th>
                        <th scope="col">Tgl Penjualan</th>
                        {{-- <th scope="col">Foto</th> --}}
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $index => $item)    
                        <tr>
                          <th class="text-dark" scope="row">{{$loop->iteration}}</th>
                          <td class="text-dark">KB-{{$item->id}}</td>
                          <td class="text-dark">{{$item->nama_barang}}</td>
                          <td class="text-dark">{{formatRupiah($item->harga)}}</td>
                          <td class="text-dark">{{$item->jumlah}}</td>
                          <td class="text-dark">{{formatRupiah($item->total)}}</td>
                          <td class="text-dark">{{$item->tanggal_jual}}</td>
                          {{-- <td><img src="fotoAnggota/{{$item->foto}}" alt="" width="50" height="50"></td> --}}
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                      <tr>
                        <td class="text-dark">Pemasukan : </td>
                        <td class="text-dark">{{formatRupiah($hitung)}}</td>
                      </tr>
                    </tfoot>
                  </table>
              </div>
            </div>
          </div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha256-k2WSCIexGzOj3Euiig+TlR8gA0EmPjuc79OEeY5L45g=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    
    </body>
    </html>
  </div>
@endsection