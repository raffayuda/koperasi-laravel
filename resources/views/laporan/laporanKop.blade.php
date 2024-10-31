<title class="text-center">Laporan</title>
<link rel="shortcut icon" href="{{asset('log2.png')}}" type="image/x-icon">
<link rel="stylesheet" href="{{asset('css/card.css')}}">
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
    <h1 class="text-center text-dark">Pilih Laporan Anggota</h1>
    @foreach ($data as $item)    
    <div class="col-xl-4 col-lg-4">
        <div class="card l-bg-cherry">
            <div class="card-statistic-3 p-4">
                <div class="card-icon card-icon-large"><i class="fas fa-shopping-cart"></i></div>
                <div class="mb-4">
                    <h5 class="card-title mb-0">{{$item->nama}}</h5>
                </div>
                <div class="row align-items-center mb-2 d-flex">
                    <div class="col-8">
                        <h2 class="d-flex align-items-center mb-0">
                           KA-{{$item->id}}
                        </h2>
                    </div>
                    <div class="col-4 text-right">
                        <span><a href="/laporanDetail/{{$item->id}}" class="mr-3 text-decoration-none btn btn-info">Detail</a><i class="fa fa-arrow-up"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
  {{$data->links()}}
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