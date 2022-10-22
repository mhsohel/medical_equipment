@extends('backend.master')
@push('css')

@endpush

@section('title','Patients')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Module</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.modules.index') }}">Modules</a></li>
                        <li class="breadcrumb-item active">Create Module</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">{{ __((isset($module) ? 'Edit' : 'Create New') . ' Module') }}</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                            <!-- form start -->
            <form role="form" id="userFrom" method="POST"
            action="{{ isset($module) ? route('admin.modules.update',$module->id) : route('admin.modules.store') }}"
            enctype="multipart/form-data">
            @csrf
            @if (isset($module))
            @method('PUT')
            @endif
            <div class="row">
  
                        <div class="card-body">
                           
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ $module->name ?? ''  }}"
                                    field-attributes="required autofocus">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}} </strong>
                                </span>
                                @enderror
                                </div>
                               
                            <div>
                                <button type="submit" class="cursor">
                                    @isset($module)
                                    <i class="fas fa-arrow-circle-up"></i>
                                    update
                                    @else
                                    <i class="fas fa-plus-circle"></i>
                                    create
                                    @endisset
                                </button>

                            </div>


                        </div>
                        <!-- /.card-body -->
                
                    <!-- /.card -->
                </div>

            </div>
        </form>
                    </div>
                    <!-- /.card -->
                    <!--/.col (right) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->







@endsection
@push('js')

@endpush
