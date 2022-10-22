@extends('backend.master')
@push('css')

@endpush

@section('title','Patients')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Permission</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.permissions.index') }}">Back to list</a>
                        </li>
                        <li class="breadcrumb-item active">Create Permission</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <section class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">
                                {{ __((isset($permission) ? 'Edit' : 'Create New') . ' Permission') }}</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <!-- form start -->
                        <form role="form" id="userFrom" method="POST"
                            action="{{ isset($permission) ? route('admin.permissions.update',$permission->id) : route('admin.permissions.store') }}"
                            enctype="multipart/form-data">
                            @csrf
                            @if (isset($permission))
                            @method('PUT')
                            @endif
                            <div class="row">
                                <div class="card-body">

                                    <div class="card-body">


                                        <label for="module">Select</label>
                                        <select class="form-control" name="module_id">

                                            @foreach ($modules as  $key => $module)
                                            <option value="{{ $module->id }}" @isset($permission) {{ $module->id == $permission->module_id ? 'selected' : ''}}  @endisset > {{ $module->name }}</option>
                                            {{-- <option value="{{ $module->id }}" {{ $permission->module_id == $module->id ? 'selected' : '' }}> {{ $module->name }}</option> --}}
                                            @endforeach

                                        </select>
                                        @error('module_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{$message}} </strong>
                                        </span>
                                        @enderror

                                        <label for="Name">Menu Name</label>
                                        <input type="text" class="form-control" name="name"
                                            value="{{ $permission->name ?? ''  }}" field-attributes="required autofocus"
                                            placeholder="Edit Roles">
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{$message}} </strong>
                                        </span>
                                        @enderror
                                        <label for="Name">Menu Slug</label>
                                        <input type="text" class="form-control" name="slug"
                                            value="{{ $permission->slug ?? ''  }}" field-attributes="required autofocus"
                                            placeholder="admin.roles.create">
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{$message}} </strong>
                                        </span>
                                        @enderror
                                        <br>
                                        <div>
                                            <button type="submit" class="cursor">
                                                @isset($permission)
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
                                </div>
                                <!-- /.card -->


                            </div>
                        </form>

                        <!-- /.card -->
                        <!--/.col (right) -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->

        </section>
    </div>
        @endsection
        @push('js')

        @endpush
