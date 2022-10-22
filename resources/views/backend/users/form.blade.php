@extends('backend.master')
@push('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog==" crossorigin="anonymous" />
    <style>
        .dropify-wrapper .dropify-message p {
            font-size: initial;
        }
        .cursor-pointer {
            cursor: pointer;
        }
    </style>
@endpush

@section('title','Users')

@section('content')
  
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ isset($role) ? 'Edit' : 'Create New' }} User</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Back to List</a></li>
                        <li class="breadcrumb-item active">Create User</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <div class="row">
        <div class="col-12">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
        @endif
            <!-- form start -->
            <form role="form" id="userFrom" method="POST"
                  action="{{ isset($user) ? route('admin.users.update',$user->id) : route('admin.users.store') }}"
                  enctype="multipart/form-data">
                @csrf
                @if (isset($user))
                    @method('PUT')
                @endif
                <div class="row">
                    <div class="col-md-8">
                        <div class="main-card mb-3 card">
                            <div class="card-body">
                                <h5 class="card-title">User Info</h5>
                                <label for="Name">Name</label>
                                <input type="text" class="form-control" name="name" value="{{ $user->name ?? ''  }}" field-attributes="required autofocus">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}} </strong>
                                </span>
                                @enderror

{{--                                <x-forms.textbox label="Name"--}}
{{--                                                 name="name"--}}
{{--                                                 value="{{ $user->name ?? ''  }}"--}}
{{--                                                 field-attributes="required autofocus">--}}
{{--                                </x-forms.textbox>--}}

                                <label for="Name">Email</label>
                                <input type="text" class="form-control" name="email" value="{{ $user->email ?? ''  }}" field-attributes="required autofocus">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}} </strong>
                                </span>
                                @enderror
{{--                                <x-forms.textbox type="email"--}}
{{--                                                 label="Email"--}}
{{--                                                 name="email"--}}
{{--                                                 value="{{ $user->email ?? ''  }}" />--}}
                                <label for="Name">Password</label>
                                <input type="password" class="form-control" name="password" {{ !isset($user) ? 'required' : '' }}  }}>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}} </strong>
                                </span>
                                @enderror
{{--                                <x-forms.textbox type="password"--}}
{{--                                                 label="Password"--}}
{{--                                                 name="password"--}}
{{--                                                 placeholder="******" />--}}
                                <label for="Name">Confirm Password</label>
                                <input type="password" class="form-control" name="password_confirmation"  {{ !isset($user) ? 'required' : '' }}>
                                @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}} </strong>
                                </span>
                                @enderror
      {{--                                <x-forms.textbox type="password"--}}
{{--                                                 label="Confirm Password"--}}
{{--                                                 name="password_confirmation"--}}
{{--                                                 placeholder="******" />--}}
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <div class="col-md-4">
                        <div class="main-card mb-3 card">
                            <div class="card-body">
                                <h5 class="card-title">Select Role and Status</h5>


                                <label for="Select Role" name="role" class=""> Select Role</label>
                                <select  class="js-example-basic-multiple form-control" name="role">
                                @foreach($roles as $key=>$role)

                                        <option value="{{$role->id}}" @isset($user) {{ $user->role->id == $role->id ? 'selected' : ''}} @endisset > {{$role->name}}</option>


                                @endforeach
                                </select>

                                <div class="form-group">

                                    <div>
                                        <input type="file" name="avatar" placeholder="Choose image"
                                            id="image">
                                        @error('image')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                        <img id="preview-image-before-upload"
                                            src="https://www.riobeauty.co.uk/images/product_image_not_found.gif"
                                            alt="preview image" style="max-height: 250px;">
                                    </div>

                                </div>
                                   
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="status" name="status" @isset($user) {{ $user->status == true ? 'checked' : ''  }}@endisset>
                                    <label class="custom-control-label" for="status">Status</label>
                                </div>



{{--                                <x-forms.select label="Select Role"--}}
{{--                                                name="role"--}}
{{--                                                class="select js-example-basic-single">--}}
{{--                                    @foreach($roles as $key=>$role)--}}
{{--                                        <x-forms.select-item :value="$role->id" :label="$role->name" :selected="$user->role->id ?? null"/>--}}
{{--                                    @endforeach--}}
{{--                                </x-forms.select>--}}

{{--                                <x-forms.dropify label="Avatar (Only Image are allowed)"--}}
{{--                                                 name="avatar"--}}
{{--                                                 value="{{ isset($user) ? $user->getFirstMediaUrl('avatar','thumb') : ''  }}"/>--}}

{{--                                <x-forms.checkbox label="Status"--}}
{{--                                                  name="status"--}}
{{--                                                  class="custom-switch"--}}
{{--                                                  :value="$user->status ?? null" />--}}


{{--                                <x-forms.button label="Reset" class="btn-danger" icon-class="fas fa-redo" on-click="resetForm('userFrom')"/>--}}


{{--                                @isset($user)--}}
{{--                                    <x-forms.button type="submit" label="Update" icon-class="fas fa-arrow-circle-up"/>--}}
{{--                                @else--}}
{{--                                    <x-forms.button type="submit" label="Create" icon-class="fas fa-plus-circle"/>--}}
{{--                                @endisset--}}


                                <button type="submit" class="cursor">
                                    @isset($user)
                                        <i class="fas fa-arrow-circle-up"></i>
                                        update
                                    @else
                                        <i class="fas fa-plus-circle"></i>
                                        create
                                    @endisset
                                </button>

                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
@endsection
@push('js')
    // First try loading jQuery from Google's CDN

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew==" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('.dropify').dropify();
            $('.js-example-basic-multiple').select2();
        });
    </script>
    @endpush
