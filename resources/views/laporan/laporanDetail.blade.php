<title class="text-center">Laporan</title>
<link rel="shortcut icon" href="{{asset('log2.png')}}" type="image/x-icon">
@extends('layouts.admin');
@section('content')
<style>
  td{
    border-bottom: 1px solid white;
  }
  input{
    border-radius: 5px;
  }
  .dt-buttons{
    display: none !important;
  }
  /* .dataTables_paginate, .dataTables_info{
    display: none;
  } */
  </style>
<div class="row">
  <div class="col">
    <h1 class="text-center"><a href="/detailSim" class="text-decoration-none text-dark">Laporan Koperasi</a></h1>
      @if ($message = Session::get('success'))
      <div class="alert alert-info mt-4" role="alert">
          {{$message}}
        </div>
      @endif
      <div class="row" style="width: 500px">
        <div class="col">
          <form action="{{route('view-pdf',$wew[0]->id)}}" method="POST" target="__blank">
            @csrf
            <button class="btn" style="background: black;border:2px solid blue">Print <i class="uil uil-print"></i></button>
          </form>
        </div>
        <div class="col" style="transform: translateX(-60px)">
          <form action="{{route('download-pdf',$wew[0]->id)}}" method="POST">
            @csrf
            <button class="btn" style="background: black;border:2px solid blue">Export PDF <i class="uil uil-file"></i></button>
          </form>
        </div>
        <div class="col" style="transform: translateX(-80px)">
          <form action="{{route('download-excel',$wew[0]->id)}}" method="POST">
            @csrf
            <button class="btn" style="background: black;border:2px solid blue">Export Excel <i class="uil uil-table"></i></button>
          </form>
        </div>
      </div>
          <div class="row">
            <div class="col">
              <div class="table-responsive">
                <span class="text-dark">Simpanan</span>
                <table class="table display mt-3" id="table">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col" style="font-size: 12px">KD Anggota</th>
                      <th scope="col" style="font-size: 12px">Nama</th>
                      <th scope="col" style="font-size: 12px">Wajib</th>
                      <th scope="col" style="font-size: 12px">Tabungan</th>
                      <th scope="col" style="font-size: 12px">Sukarela</th>
                      <th scope="col" style="font-size: 12px">Tgl Simpan</th>
                      <th scope="col" style="font-size: 12px">Tgl Tambah Tabungan</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($data as $item)    
                    <tr>
                    <th scope="row" class="text-dark" style="font-size: 12px">{{$loop->iteration}}</th>
                          <td class="text-dark" style="font-size: 12px">KA-{{$item->anggota->id}}</td>
                          <td class="text-dark" style="font-size: 12px">{{$item->anggota->nama}}</td>
                          <td class="text-dark" style="font-size: 12px">{{formatRupiah($item->wajib)}}</td>
                          <td class="text-dark" style="font-size: 12px">{{formatRupiah($item->simpanan)}}</td>
                          <td class="text-dark" style="font-size: 12px">{{formatRupiah($item->sukarela)}}</td>
                          <td class="text-dark text-center" style="font-size: 12px">{{$item->tanggal}}</td>
                          <td class="text-dark" style="font-size: 12px">{{$item->tanggal_saldo}}</td>
                        </tr>
                        @endforeach
                  </tbody>
                  
                  <tfoot>
                    <tr>
                      <th></th>
                      <th>Tabungan = {{formatRupiah($tabungan)}}</th>
                      <th></th>
                      <th></th>
                      <th>Wajib = {{formatRupiah($wajib)}}</th>
                      <th></th>
                      <th></th>
                      <th>Sukarela = {{formatRupiah($sukarela)}}</th>
                    </tr>
                </tfoot>
                </table>
                  
                <div class="row mt-5">
                  <div class="col">
                      <span class="text-dark">Pinjaman</span>
                      <div class="table-responsive">
                          <table class="table" id="table">
                              <thead>
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
                                    <th class="text-dark" scope="row">{{$loop->iteration}}</th>
                                    <td class="text-dark">KA-{{$item->anggota->id}}</td>
                                    <td class="text-dark">{{$item->anggota->nama}}</td>
                                    <td class="text-dark">{{formatRupiah($item->jumlah_pinjaman)}}</td>
                                    <td class="text-dark">{{formatRupiah($item->perbulan)}}</td>
                                    <td class="text-dark">{{$item->jasa}}%</td>
                                    <td class="text-dark">{{formatRupiah($item->total)}}</td>
                                    <td class="text-dark">{{$item->tanggal_pinjaman}}</td>
                                    <td class="text-dark">{{$item->status}}</td>
                                </tr>
                                @endforeach
                              </tbody>
                              <tfoot>
                                <tr>
                                  <th colspan="9">Total Pinjaman = {{formatRupiah($totalPin)}}</th>
                                </tr>
                              </tfoot>
                          </table>
                        </div>
                        {{$dataPin->links()}}
                  </div>
                </div>
              </div>
            </div>
          </div>

          
          <a href="{{URL::previous()}}" class="btn btn-info mt-2">Kembali</a>
        </div>
      
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha256-k2WSCIexGzOj3Euiig+TlR8gA0EmPjuc79OEeY5L45g=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    
    <script>
    $('.delete').click(function(){
      var pegawaiId = $(this).attr('data-id');
      var nama = $(this).attr('data-nama');
    
      const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
    confirmButton: 'btn btn-success me-3',
    cancelButton: 'btn btn-danger'
    },
    buttonsStyling: false
    })
    
    swalWithBootstrapButtons.fire({
    title: 'Kamu Yakin ?',
    text: "Data akan di hapus! dengan id " + pegawaiId + ' dengan nama ' + nama,
    icon: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Yes, delete it!',
    cancelButtonText: 'No, cancel!',
    reverseButtons: true
    }).then((result) => {
    if (result.isConfirmed) {
    window.location = '/delete/' + pegawaiId
    swalWithBootstrapButtons.fire(
      'Deleted!',
      'Data berhasil dihapus!.',
      'success'
    )
    } else if (
    /* Read more about handling dismissals below */
    result.dismiss === Swal.DismissReason.cancel
    ) {
    swalWithBootstrapButtons.fire(
      'Cancelled',
      'Data batal di hapus :)',
      'error'
    )
    }
    })
    })
    </script>
    </body>
    <script>
    toastr.success('Have fun storming the castle!', 'Miracle Max Says')
    </script>
    </html>
  </div>
  
@endsection