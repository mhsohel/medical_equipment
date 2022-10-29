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
                    <h1>post</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.posts.index') }}">posts</a></li>
                        <li class="breadcrumb-item active">Create post</li>
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
                            <h3 class="card-title">Edit Post # {{ $post->id }}
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <!-- form start -->

                        <form role="form" id="userFrom" method="POST"
                            action="{{  route('admin.posts.update',$post->id)  }}"
                            enctype="multipart/form-data">
                            @csrf

                            @method('PUT')


                            <div class="card card-default">
                                <div class="card-header">
                                  {{-- <h3 class="card-title">Create News Post</h3> --}}

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

                                            <select  class="js-example-basic-multiple form-control" id="division" name="division_id">
                                                <option value="">Select Division</option>
                                            @foreach($divisions as $key=>$division)

                                                    <option value="{{$division->id}}" @isset($post)
                                                        {{ $post->division_id == $division->id ? 'selected' : ''  }}@endisset  > {{$division->bn_name}}</option>


                                            @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Select District</label>
                                             <select name="district_id"  class="form-control">
                                                @foreach($districts as $key=>$district)

                                                    <option value="{{$district->id}}" @isset($post)
                                                        {{ $post->district_id == $district->id ? 'selected' : ''  }}@endisset  > {{$district->bn_name}}</option>


                                            @endforeach

                                            </select>
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{$message}} </strong>
                                        </span>
                                        @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Select Upazila</label>
                                             <select name="upazila_id" id="upazila" class="form-control">
                                                @foreach($upazilas as $key=>$upazila)

                                                <option value="{{$upazila->id}}" @isset($post)
                                                    {{ $post->upazila_id == $upazila->id ? 'selected' : ''  }}@endisset  > {{$upazila->bn_name}}</option>


                                        @endforeach
                                            </select>
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{$message}} </strong>
                                        </span>
                                        @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Select Union</label>
                                             <select name="union_id" id="union" class="form-control">
                                                @foreach($unions as $key=>$union)

                                                <option value="{{$union->id}}" @isset($post)
                                                    {{ $post->union_id == $union->id ? 'selected' : ''  }}@endisset  > {{$union->bn_name}}</option>


                                        @endforeach
                                            </select>
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{$message}} </strong>
                                        </span>
                                        @enderror
                                        </div>


                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Title</label>
                                            <input type="text" class="form-control" name="title"
                                                value="{{ $post->title ?? ''  }}"
                                                field-attributes="required autofocus">
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{$message}} </strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Excerpt</label>
                                            <input type="text" class="form-control" name="excerpt"
                                                value="{{ $post->excerpt ?? ''  }}"
                                                field-attributes="required autofocus">
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{$message}} </strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Caption</label>
                                            <input type="text" class="form-control" name="caption"
                                                value="{{ $post->caption ?? ''  }}"
                                                field-attributes="required autofocus">
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{$message}} </strong>
                                            </span>
                                            @enderror
                                        </div>



                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-6">

                                        <div class="form-group">

                                            <select  class="js-example-basic-multiple form-control" name="category_id">
                                                <option value="">Select Category</option>
                                            @foreach($categories as $key=>$category)

                                                    <option value="{{$category->id}}" @isset($post) {{ $post->category_id == $category->id ? 'selected' : ''}} @endisset > {{$category->name}}</option>


                                            @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">


                                                <input type="file" name="thumbnail" placeholder="Choose image"
                                                    id="image">
                                                @error('image')
                                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                                <img id="preview-image-before-upload"
                                                    src="https://www.riobeauty.co.uk/images/product_image_not_found.gif"
                                                    alt="preview image" style="max-height: 250px;">

                                            @isset($post)

                                            <img id="preview-image-before-upload"
                                                    src="{{ asset('uploads/thumbnails') }}/{{ $post->thumbnail }}"
                                                    alt="preview image" style="max-height: 250px;">
                                           @endisset

                                        </div>
                                        <div class="form-group">


                                                <input type="file" name="post_voice" placeholder="Choose Audion File"
                                                    >
                                                @error('image')
                                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror


                                            {{-- @isset($post)

                                            <img id="preview-image-before-upload"
                                                    src="{{ asset('images/backend') }}/{{ $post->thumbnail }}"
                                                    alt="preview image" style="max-height: 250px;">
                                           @endisset --}}

                                        </div>

                                        <div class="form-group">
                                            @can('access_settings')
                                            <select  class="form-control" name="status_id">
                                                <option value="">Select Status</option>


                                                    <option value="1" @isset($post) {{ $post->status_id == 1 ? 'selected' : ''}} @endisset > Active </option>
                                                    <option value="2" @isset($post) {{ $post->status_id == 2 ? 'selected' : ''}} @endisset> Pending</option>
                                                    <option value="3" @isset($post) {{ $post->status_id == 3 ? 'selected' : ''}} @endisset> Rejected</option>
                                                    <option value="4" @isset($post) {{ $post->status_id == 4 ? 'selected' : ''}} @endisset> Reported</option>
                                                    <option value="5" @isset($post) {{ $post->status_id == 5 ? 'selected' : ''}} @endisset> Old</option>


                                            </select>
                                            @endcan
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                  </div>
                                  <!-- /.row -->


                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">news Description</label>
                                    <div class="card-body">
                                        <textarea id="summernote" name="body" placeholder="something goes here">
                                            @isset($post)
                                            {{ $post->body  }} @endisset
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
                                            @isset($post)
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

<script type="text/javascript">
    $("#division").change(function(){
        $.ajax({
            url: "{{ route('admin.getdistrict') }}?division_id=" + $(this).val(),
            method: 'GET',
            success: function(data) {
                $('#district').html(data.html);
            }
        });
    });
    $("#district").click(function(){
        $.ajax({
            url: "{{ route('admin.getupazila') }}?district_id=" + $(this).val(),
            method: 'GET',
            success: function(data) {
                $('#upazila').html(data.html);
            }
        });
    });
    $("#upazila").click(function(){
        $.ajax({
            url: "{{ route('admin.getunion') }}?upazila_id=" + $(this).val(),
            method: 'GET',
            success: function(data) {
                $('#union').html(data.html);
            }
        });
    });



</script>
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
@endpush
