<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ANJAY LOGIN</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="shortcut icon" href="{{asset('log2.png')}}" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('template/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('template/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('template/dist/css/adminlte.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/login.css')}}">
</head>
<style>
  video{
    width: 100%;
    height: auto;
    position: absolute;
    z-index: -20;
    top: 0
  }
  html{
    overflow: hidden;
    background: transparent
  }
  body{
    height: 100vh;
  }
  .login-box{
    opacity: .8;
  }
  .container{
    opacity: .8;
  }
  body{
    background: url('s.jpg');
    background-size: cover;
    background-position: center;
  }
</style>
<body class="hold-transition login-page">
  {{-- <video autoplay loop muted plays-inline>
    <source src="video.mp4" type="">
  </video> --}}
  <div class="container">
    <div class="row d-flex justify-content-center mt-5">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card py-3 px-2">

          <p class="text-center mb-3 mt-2 text-white">Enter your email and password</p>
          <div class="row mx-auto ">
            @if ($message = Session::get('fail'))
      <div class="alert m-auto text-white col-12 text-center h-12" role="alert" style="background:linear-gradient(45deg, #594DF7, #4D77F7, #48E4FA);">
          {{$message}}
        </div>
      @endif
          <div class="division">
            <div class="row">
              <div class="col-3"><div class="line l"></div></div>
              <div class="col-6 text-white"><span>Please Login</span></div>
              <div class="col-3"><div class="line r"></div></div>
            </div>
          </div>
          <form class="myform" method="POST" action="/loginproses">
            @csrf
            <div class="form-group">
                <input type="email" class="form-control text-white" placeholder="Email" name="email" style="width: 370px">
              </div>
             <div class="form-group">
                <input type="password" class="form-control text-white" placeholder="Password" name="password">
              </div>
              <div class="row">
                <div class="col-md-6 col-12">
                  
                </div>
                
              </div>
              <div class="form-group mt-3">
                <button type="submit" class="btn btn-block btn-primary btn-lg"><small><i class="far fa-user pr-2"></i>Login</small></button>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{asset('template/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('template/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('template/dist/js/adminlte.min.js')}}"></script>
</body>
</html>
