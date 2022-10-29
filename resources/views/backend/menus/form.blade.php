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
                    <h1>Menu</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.menus.index') }}">menus</a></li>
                        <li class="breadcrumb-item active">Create Menu</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">{{ __((isset($menu) ? 'Edit' : 'Create New') . ' menu') }}</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                            <!-- form start -->
            <form role="form" id="userFrom" method="POST"
            action="{{ isset($menu) ? route('admin.menus.update',$menu->id) : route('admin.menus.store') }}"
            enctype="multipart/form-data">
            @csrf
            @if (isset($menu))
            @method('PUT')
            @endif
            <div class="row">

                        <div class="card-body">

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ $menu->name ?? ''  }}"
                                    field-attributes="required autofocus">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}} </strong>
                                </span>
                                @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Menu Serial</label>
                                    <input type="text" class="form-control" name="menu_sl" value="{{ $menu->menu_sl ?? ''  }}"
                                    field-attributes="required autofocus">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}} </strong>
                                </span>
                                @enderror
                                </div>


                                <div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" value="1" @isset($menu)
                                        {{ $menu->status == 1 ? 'checked' : ''  }}@endisset>
                                        <label class="form-check-label">Active</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="status" value="0" @isset($menu)
                                            {{ $menu->status == 0 ? 'checked' : ''  }}@endisset>
                                            <label class="form-check-label">Deactive</label>
                                            </div>
                                </div>




                            <div>
                                <button type="submit" class="cursor">
                                    @isset($menu)
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
