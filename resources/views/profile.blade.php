@extends('layouts.admin')
@section('content')
<div class="row">
  <div class="col">
    <h1 class="text-center">Account</h1>
      @if ($message = Session::get('success'))
      <div class="alert alert-info mt-4" role="alert">
          {{$message}}
        </div>
      @endif
      <div class="card" style="overflow-x: auto">
        <div class="card-body"  style="overflow-x: auto">
          <div class="row">
            <div class="col">
                <form method="POST" action="/updateProfile">
                    @csrf
                    <div class="mb-3 row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control text-white" name="name" id="staticEmail" value="{{Auth::user()->name}}" required>
                        </div>
                      </div>
                    <div class="mb-3 row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control text-white" name="email" id="staticEmail" value="{{Auth::user()->email}}" required>
                        </div>
                      </div>
                      <div class="mb-3 row">
                        <label for="inputPassword1" class="col-sm-2 col-form-label">Password Lama</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control text-white" name="current_password" id="inputPassword1" required>
                        </div>
                        @error('current_password')
                            <span class="text-danger mt-2" style="font-size: 10px;">{{$message}}</span>
                        @enderror
                      </div>
                      <div class="mb-3 row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Password Baru</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control text-white" name="new_password" id="inputPassword" required>
                        </div>
                      </div>
                    <button type="submit" class="btn btn-info">Update</button><a class="btn btn-primary mx-3" href="{{ URL::previous() }}">Kembali</a>
                </form>
                
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha256-k2WSCIexGzOj3Euiig+TlR8gA0EmPjuc79OEeY5L45g=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    </html>
  </div>
@endsection