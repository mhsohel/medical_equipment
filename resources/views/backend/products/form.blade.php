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
                    <h1>Products</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.products.index') }}">Products</a></li>
                        <li class="breadcrumb-item active">Create Product</li>
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
                            <h3 class="card-title">{{ __((isset($product) ? 'Edit' : 'Create New') . ' product') }}
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <!-- form start -->

                        <form role="form"
                            action="{{ isset($product) ? route('admin.products.update',$product->id) : route('admin.products.store') }}"
                            enctype="multipart/form-data" method="POST">
                            @csrf
                            @if (isset($product))
                            @method('PUT')
                            @endif

                            <div class="card card-default">
                                <div class="card-header">
                                  {{-- <h3 class="card-title">Create News product</h3> --}}

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
                                            <label for="exampleInputEmail1">Category</label>
                                            <select  class="js-example-basic-multiple form-control" name="category_id">
                                                <option value="">Select Category</option>
                                            @foreach($fcategories as $key=>$menu)

                                                    <option value="{{$menu->id}}"  @isset($product) {{ $product->category_id == $menu->id ? 'selected' : ''}} @endisset> {{$menu->name}}</option>


                                            @endforeach
                                            </select>
                                        </div>


                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Short Description</label>


                                            <input type="text" class="form-control" name="shortDesc"
                                                value="{{ $product->shortDesc ?? ''  }}"
                                                field-attributes="required autofocus">
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{$message}} </strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Price</label>


                                            <input type="text" class="form-control" name="price"
                                                value="{{ $product->price ?? ''  }}"
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
                                            <label for="exampleInputEmail1">name</label>
                                            <input type="text" class="form-control" name="name"
                                                value="{{ $product->name ?? ''  }}"
                                                field-attributes="required autofocus">
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{$message}} </strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Product Code</label>
                                            <input type="text" class="form-control" name="productCode"
                                                value="{{ $product->productCode ?? ''  }}"
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
                                                    src="https://www.riobeauty.co.uk/images/product_image_not_found.gif"
                                                    alt="preview image" style="max-height: 250px;">

                                            @isset($product)

                                            <img id="preview-image-before-upload"
                                                    src="{{ asset('images/backend') }}/{{ $product->image }}"
                                                    alt="preview image" style="max-height: 250px;">
                                           @endisset

                                        </div>



                                    </div>
                                    <!-- /.col -->
                                  </div>
                                  <!-- /.row -->


                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Description</label>
                                    <div class="card-body">
                                        <textarea id="summernote" name="description" placeholder="something goes here">
                                            @isset($product)
                                            {{ $product->description  }} @endisset
                                        </textarea>
                                      </div>
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

                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <div>
                                        <button type="submit" class="cursor">
                                            @isset($product)
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
@endpush
