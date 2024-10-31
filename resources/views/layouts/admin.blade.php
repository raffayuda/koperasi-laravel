<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>E-Cooperative</title>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css" integrity="sha384-QYIZto+st3yW+o8+5OHfT6S482Zsvz2WfOzpFSXMF9zqeLcFV0/wlZpMtyFcZALm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('template')}}/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="{{asset('template')}}/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> --}}
    <!-- Plugin css for this page -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="{{asset('template')}}/assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="{{asset('template')}}/assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="{{asset('template')}}/assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="{{asset('template')}}/assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{asset('template')}}/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{asset('log2.png')}}" />
    
  </head>
  <body>
    <style>
      table, td, table tr, table th{
background: transparent !important;
color: white;
}
.dataTables_wrapper .dataTables_filter input[type="search"] {
    color: black; /* Ganti dengan warna yang diinginkan */
}
.buttons-pdf, .buttons-excel, .buttons-print{
    background: black !important;
    border-radius: 5px !important;
    color: white !important;
    border: 2px solid blue !important;
  }
  .dataTables_paginate .paginate_button{
    color: green !important;
  }
  /* .dataTables_filter{
    position: fixed;
    right: 80px;
    top: 25%;
  }
  .dataTables_paginate{
    position: fixed;
    bottom: 70px;
    right: 20px;
  } */
  /* Mengatur tampilan scroll horizontal */
.table-responsive {
    overflow-x: auto; /* Mengaktifkan scroll horizontal saat diperlukan */
    white-space: nowrap; /* Mencegah teks di dalam sel untuk pindah baris */
    -ms-overflow-style: -ms-autohiding-scrollbar;
    padding-bottom: 20px
}

/* Mengatur tampilan scroll bar horizontal */
.table-responsive::-webkit-scrollbar {
    width: 12px; /* Lebar scroll bar */
    height: 12px; /* Tinggi scroll bar */
}

.table-responsive::-webkit-scrollbar-track {
  border-radius: 20px;
    background: #f1f1f1; /* Warna latar belakang track scroll bar */
}

.table-responsive::-webkit-scrollbar-thumb {
  border-radius: 20px;
    background: linear-gradient(45deg, #358203,#038230,#038205); /* Warna scroll bar */
}
::-webkit-scrollbar {
    width: 10px;
}
 
::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);     
    background: #666;    
}
 
::-webkit-scrollbar-thumb {
    background: #232323;
}
    </style>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('layouts.sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar p-0 fixed-top d-flex flex-row">
          
          <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
              <span class="mdi mdi-menu"></span>
            </button>
            <ul class="navbar-nav w-100">
              <li class="nav-item w-100 mt-3">
                <p>Welcome Back, {{auth()->user()->name}}</p>
              </li>
            </ul>
            <ul class="navbar-nav navbar-nav-right">
             
              <li class="nav-item dropdown">
                <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
                  <div class="navbar-profile">
                    <img class="img-xs rounded-circle" src="{{asset('y.png')}}" alt="">
                    <p class="mb-0 d-none d-sm-block navbar-profile-name">{{auth()->user()->name}}</p>
                    <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                  </div>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
                  <h6 class="p-3 mb-0">Advanced Setting</h6>
                  <div class="dropdown-divider"></div>
                  
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item" href="/logout">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-logout text-danger"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject mb-1">Log out</p>
                    </div>
                  </a>
                  
                </div>
              </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center border-dark" type="button" data-toggle="offcanvas">
              <span class="mdi mdi-format-line-spacing"></span>
            </button>
          </div>
        </nav>
  
        <!-- partial -->
        <div class="main-panel" style="background: linear-gradient(45deg, #AAFA82,#D7FA6B,#6CF5D2)">
          <div class="content-wrapper bg-white">
            <div class="container">
              <div class="row">
                <div class="col">

                @yield('content')
                </div>
              </div>
            </div>
            
        
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer" style="background: linear-gradient(45deg, #6CF5D2,#AAFA82,#D7FA6B);">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block text-dark">Copyright © bodayskuy 2023</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center text-dark">@<a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank" class="text-dark">bodayskuy</a> from Bangladesh</span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{asset('template')}}/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{asset('template')}}/assets/vendors/chart.js/Chart.min.js"></script>
    <script src="{{asset('template')}}/assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="{{asset('template')}}/assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="{{asset('template')}}/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="{{asset('template')}}/assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{asset('template')}}/assets/js/off-canvas.js"></script>
    <script src="{{asset('template')}}/assets/js/hoverable-collapse.js"></script>
    <script src="{{asset('template')}}/assets/js/misc.js"></script>
    <script src="{{asset('template')}}/assets/js/settings.js"></script>
    <script src="{{asset('template')}}/assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{asset('template')}}/assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
    {{-- <script src="https://cdn.jsdelivr.net/n<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">pm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> --}}
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>


<script>
  $(document).ready(function() {
      $('#table').DataTable( {
          dom: 'Bfrtip',
          paging: true,
          pageLength: 5,
          buttons: [
          {
              extend: 'pdfHtml5',
              text: 'Export PDF',
              footer:true,
          },
          {
              extend: 'excel',
              text: 'Export Excel',
              footer:true,
          },
          {
              extend: 'print',
              text: 'Print',
              footer:true // Ganti dengan teks yang Anda inginkan
          },

      ]
      } );
  } );
  
  </script>
  </body>
</html>
