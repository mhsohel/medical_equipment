@extends('backend.master')
@push('css')
<style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" integrity="sha512-gOQQLjHRpD3/SEOtalVq50iDn4opLVup2TF8c4QPI3/NmUPNZOk2FG0ihi8oCU/qYEsw4P6nuEZT2lAG0UNYaw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
/* <link rel="stylesheet" href="sweetalert2.min.css"> */
</style>
@endpush

@section('title','Patients')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Authorization Error</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Authorizaiton Error</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <section class="content">
        <div class="error-page">
          <h2 class="headline text-warning">Authorization Error</h2>

          <div class="error-content">
            <h3><i class="fas fa-exclamation-triangle text-warning"></i> Oops! You are not allowed to use this resource.</h3>

            <p>
              Please Contact Your IT Administrator
              Meanwhile, you may <a href="{{ url()->previous() }}">return to dashboard</a>
            </p>

          </div>
          <!-- /.error-content -->
        </div>
        <!-- /.error-page -->
      </section>
    <!-- Main content -->

    <!-- /.content -->
</div>
<!-- /.content-wrapper -->







@endsection
@push('js')


@endpush
