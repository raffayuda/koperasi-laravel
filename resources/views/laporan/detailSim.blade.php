<title class="text-center">Laporan Simpanan</title>
@extends('layouts.admin');
@section('content')
<style>
  #table_info{
    color: white;
  }
  label{
    color: white
  }
  input{
    border-radius: 5px;
  }
  </style>
<div class="row">
  <div class="col">
    <h1 class="text-center"><a href="/detailSim" class="text-decoration-none text-white">Laporan Data Simpanan</a></h1>
      @if ($message = Session::get('success'))
      <div class="alert alert-info mt-4" role="alert">
          {{$message}}
        </div>
      @endif
          <div class="row">
            <div class="col">
              <div class="table-responsive">
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
                    <th scope="row" class="text-white" style="font-size: 12px">{{$loop->iteration}}</th>
                          <td class="text-white" style="font-size: 12px">{{$item->anggota->kd_anggota}}</td>
                          <td class="text-white" style="font-size: 12px">{{$item->anggota->nama}}</td>
                          <td class="text-white" style="font-size: 12px">{{formatRupiah($item->wajib)}}</td>
                          <td class="text-white" style="font-size: 12px">{{formatRupiah($item->simpanan)}}</td>
                          <td class="text-white" style="font-size: 12px">{{formatRupiah($item->sukarela)}}</td>
                          <td class="text-white text-center" style="font-size: 12px">{{$item->tanggal}}</td>
                          <td class="text-white" style="font-size: 12px">{{$item->tanggal_saldo}}</td>
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