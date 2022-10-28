@extends('backend.master')
@push('css')
<!-- summernote -->
<link rel="stylesheet" href="{{ asset('backend/plugins/summernote/summernote-bs4.min.css')}}">
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
                    <h1>leadingpage</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.leadingpages.index') }}">leadingpage</a></li>
                        <li class="breadcrumb-item active">Create leadingpage</li>
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
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">{{ __((isset($leadingpage) ? 'Edit' : 'Create New') . ' leadingpage') }}
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <!-- form start -->

                        <form role="form"
                            action="{{ isset($leadingpage) ? route('admin.leadingpages.update',$leadingpage->id) : route('admin.leadingpages.store') }}"
                            enctype="multipart/form-data" method="POST">
                            @csrf
                            @if (isset($leadingpage))
                            @method('PUT')
                            @endif

                            <div class="card card-default">
                                <div class="card-header">
                                  {{-- <h3 class="card-title">Create News leadingpage</h3> --}}

                                  <div class="card-tools">
                                    {{-- <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                      <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                      <i class="fas fa-times"></i>
                                    </button> --}}
                                  </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                  <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Tagline</label>
                                            <input type="text" class="form-control" name="tagline"
                                                value="{{ $leadingpage->tagline ?? ''  }}"
                                                field-attributes="required autofocus">
                                            @error('tagline')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{$message}} </strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Title</label>
                                            <input type="text" class="form-control" name="title"
                                                value="{{ $leadingpage->title ?? ''  }}"
                                                field-attributes="required autofocus">
                                            @error('title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{$message}} </strong>
                                            </span>
                                            @enderror
                                        </div>






                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Header</label>


                                            <input type="text" class="form-control" name="header"
                                                value="{{ $leadingpage->header ?? ''  }}"
                                                field-attributes="required autofocus">
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{$message}} </strong>
                                            </span>
                                            @enderror
                                        </div>


                                        <div class="form-group">


                                            <input type="file" name="image" placeholder="Choose image"
                                                id="image">
                                            @error('image')
                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                            @enderror
                                            <img id="preview-image-before-upload"
                                                src="https://www.riobeauty.co.uk/images/leadingpage_image_not_found.gif"
                                                alt="preview image" style="max-height: 250px;">

                                        @isset($leadingpage)

                                        <img id="preview-image-before-upload"
                                                src="{{ asset('images/backend') }}/{{ $leadingpage->image }}"
                                                alt="preview image" style="max-height: 250px;">
                                       @endisset

                                    </div>





                                    </div>
                                    <!-- /.col -->
                                  </div>
                                  <!-- /.row -->


                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Mission</label>
                                    <div class="card-body">
                                        <textarea id="summernote" name="mission" placeholder="something goes here">
                                            @isset($leadingpage)
                                            {{ $leadingpage->mission  }} @endisset
                                        </textarea>
                                      </div>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}} </strong>
                                </span>
                                @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Vission</label>
                                    <div class="card-body">
                                        <textarea id="summernote2" name="vission" placeholder="something goes here">
                                            @isset($leadingpage)
                                            {{ $leadingpage->vission  }} @endisset
                                        </textarea>
                                      </div>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}} </strong>
                                </span>
                                @enderror
                                </div>





                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <div>
                                        <button type="submit" class="cursor">
                                            @isset($leadingpage)
                                            <i class="fas fa-arrow-circle-up"></i>
                                            update
                                            @else
                                            <i class="fas fa-plus-circle"></i>
                                            create
                                            @endisset
                                        </button>

                                    </div>
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

<!-- Summernote -->
<script src="{{ asset('backend/plugins/summernote/summernote-bs4.min.js')}}"></script>
<script>
    $(function () {
      // Summernote
      $('#summernote').summernote()

      // CodeMirror
      CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
        mode: "htmlmixed",
        theme: "monokai"
      });
    })
  </script>
<script>
    $(function () {
      // Summernote
      $('#summernote2').summernote()

      // CodeMirror
      CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
        mode: "htmlmixed",
        theme: "monokai"
      });
    })
  </script>
@endpush
