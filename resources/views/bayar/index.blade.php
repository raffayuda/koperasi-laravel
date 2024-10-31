@extends('layouts.admin')
@section('content')
<style>

  input{
    border-radius: 5px;
  }
  .dt-buttons{
    display: none
  }
  table td, table tr, table th{
background: transparent !important;
}

  </style>
<div class="row">
  <div class="col">
    <h1 class="text-center text-dark">Data Pembayaran</h1>
         
        </div>
      </div>
      @if ($message = Session::get('success'))
      <div class="alert alert-info mt-4" role="alert">
          {{$message}}
        </div>
      @endif
          <div class="row">
            <div class="col">
              <div class="table-responsive">
                <table class="table mt-3" id="table">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">KD Anggota</th>
                      <th scope="col">Nama</th>
                      <th scope="col">Pinjam</th>
                      <th scope="col">Bayar</th>
                      <th scope="col">Berapa x</th>
                      <th scope="col">Tgl Bayar</th>
                      <th scope="col">Status</th>
                      <th scope="col">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($data as $index => $item)    
                      <tr>
                        <th scope="row" class="text-dark">{{$loop->iteration}}</th>
                        <td class="text-dark">KA-{{$item->anggota->id}}</td>
                        <td class="text-dark">{{$item->anggota->nama}}</td>
                        <td class="text-dark">{{formatRupiah($item->total)}}</td>
                        <td class="text-dark">{{formatRupiah($item->bayar)}}</td>
                        <td class="text-dark">{{$item->sudah_bayar}}/{{$item->berapa_kali}}</td>
                        <td class="text-dark">{{$item->tanggal_bayar}}</td>
                        <td class="text-dark">{{$item->status}}</td>
                        <td>
                          <div class="btn-group dropstart">
                            <button type="button" class="btn btn-primary" data-bs-toggle="dropdown" aria-expanded="false" style="border-radius: 5px">
                              <i class="fa fa-cogs" aria-hidden="true"></i>
                            </button>
                            <ul class="dropdown-menu">
                              <li><a href="/bayar/{{$item->id}}" class="dropdown-item">Bayar</a></li>
                              <li><a href="#" class="dropdown-item delete" data-id="{{$item->id}}" data-nama="{{$item->nama}}">Delete</a></li>
                            </ul>
                          </div>
                        </td>
                      </tr>
                      @endforeach
                  </tbody>
                </table>
              </div>
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
    window.location = 'bayar/delete/' + pegawaiId
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