@extends('auth.authmaster')

@section('content')

<div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="#" class="h1"><b>Medical Equpment</b></a>
      </div>
      @if (session('status'))
      <div class="alert alert-success" role="alert">
          {{ session('status') }}
      </div>
  @endif

      <div class="card-body">
        <p class="login-box-msg">Request to Send Email</p>


                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

          <div class="input-group mb-3">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>

          <div class="row">

            <!-- /.col -->
            <div >
                <button type="submit" class="btn btn-primary">
                    {{ __('Send Password Reset Link') }}
                </button>

            </div>
            <!-- /.col -->
          </div>
        </form>





      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.login-box -->








@endsection
