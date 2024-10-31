<nav class="sidebar sidebar-offcanvas" id="sidebar" style="background: #AAFA82">
  <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
    <img src="{{asset('log1.png')}}" alt="" class="sidebar-brand brand-logo" style="width: 250px;text-align:left; transform:translateX(-20px)">
    <img class="sidebar-brand brand-logo-mini" src="{{asset('log2.png')}}" alt="" style="width: 60px; transform:translateX(-15px)">
  </div>
  <ul class="nav">
    <li class="nav-item profile">
      <div class="profile-desc">
        <div class="profile-pic">
          <div class="count-indicator">
            <img class="img-xs rounded-circle " src="{{asset('y.png')}}" alt="">
            <span class="count bg-success"></span>
          </div>
          <div class="profile-name">
            <h5 class="mb-0 font-weight-normal" style="color: black">{{auth()->user()->name}}</h5>
            <span>Gold Member</span>
          </div>
        </div>
        <a href="#" id="profile-dropdown" data-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
        <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
          <a href="/profile" class="dropdown-item preview-item">
            <div class="preview-thumbnail">
              <div class="preview-icon bg-dark rounded-circle">
                <i class="mdi mdi-settings text-primary"></i>
              </div>
            </div>
            <div class="preview-item-content">
              <p class="preview-subject ellipsis mb-1 text-small">Account settings</p>
            </div>
          </a>
          
          
        </div>
      </div>
    </li>
    <li class="nav-item nav-category">
      <span class="nav-link">Navigation</span>
    </li>
    <li class="nav-item menu-items {{Request::is('/') ? 'active' : ''}}">
      <a class="nav-link" href="/">
        <span class="menu-icon">
          <i class="mdi mdi-speedometer"></i>
        </span>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    <li class="nav-item menu-items">
      <a class="nav-link" href="/anggota">
        <span class="menu-icon">
          <i class="mdi mdi-account-multiple"></i>
        </span>
        <span class="menu-title">Anggota</span>
      </a>
    </li>
    <li class="nav-item menu-items {{Request::is('laporanDetail*') ? '' : ''}}">
      <a class="nav-link" data-toggle="collapse" href="#ui-basic1" aria-expanded="false" aria-controls="ui-basic">
        <span class="menu-icon">
          <i class="fa fa-usd" aria-hidden="true"></i>
        </span>
        <span class="menu-title">Transaksi</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="ui-basic1">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"><a class="nav-link" href="/simpanan"><i class="uil uil-arrow-circle-right text-white mr-2"></i> Simpanan</a></li>
          <li class="nav-item"> <a class="nav-link" href="/pinjaman"><i class="uil uil-arrow-circle-right text-white mr-2"></i>Pinjaman</a></li>
          <li class="nav-item"> <a class="nav-link" href="/bayar"><i class="uil uil-arrow-circle-right text-white mr-2"></i>Pembayaran</a></li>
          <li class="nav-item"> <a class="nav-link" href="/penjualan"><i class="uil uil-arrow-circle-right text-white mr-2"></i>Penjualan</a></li>
        </ul>
      </div>
    </li>
    {{-- <li class="nav-item menu-items d-none @if(Request::is('laporanAnggota*') || Request::is('laporanSimpanan*') || Request::is('laporanPinjaman*') || Request::is('laporanPembayaran*') || Request::is('laporanPenjualan*') || Request::is('filterLaporanSimpanan*') || Request::is('filterLaporanPinjaman*') || Request::is('filterLaporanAnggota*') || Request::is('filterLaporanPenjualan*') || Request::is('filterLaporanPembayaran*'))
    {{ "active" }}
@else
    {{ "" }}
@endif">
      <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
        <span class="menu-icon">
          <i class="mdi mdi-note-text"></i>
        </span>
        <span class="menu-title">Laporan</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="ui-basic">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="/laporanAnggota"><i class="uil uil-arrow-circle-right text-white mr-2"></i>Anggota</a></li>
          <li class="nav-item"> <a class="nav-link" href="/laporanSim"><i class="uil uil-arrow-circle-right text-white mr-2"></i>Simpanan</a></li>
          <li class="nav-item"> <a class="nav-link" href="/laporanPin"><i class="uil uil-arrow-circle-right text-white mr-2"></i>Pinjaman</a></li>
          <li class="nav-item"> <a class="nav-link" href="/laporanPem"><i class="uil uil-arrow-circle-right text-white mr-2"></i>Pembayaran</a></li>
          <li class="nav-item"> <a class="nav-link" href="/laporanPenjualan"><i class="uil uil-arrow-circle-right text-white mr-2"></i>Penjualan</a></li>
        </ul>
      </div>
    </li> --}}
    <li class="nav-item menu-items">
      <a class="nav-link" href="/laporanKop">
        <span class="menu-icon">
          <i class="mdi mdi-note-text"></i>
        </span>
        <span class="menu-title">Laporan</span>
      </a>
    </li>
    <li class="nav-item menu-items">
      <a class="nav-link" href="/laporanPenjualan">
        <span class="menu-icon">
          <i class="mdi mdi-note-text"></i>
        </span>
        <span class="menu-title">Laporan Penjualan</span>
      </a>
    </li>
  </ul>
</nav>