@extends('backend.master')

@section('title','Pages')

@push('css')

@endpush

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Why Choos Us</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Leadingpage</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Leadingpage</h3>
                            @if($leadingpages->count() == 0)
                            <a href="{{ route('admin.leadingpages.create') }}">
                                <h3 class="card-title float-right">Create leadingpage</h3>
                            </a>
                            @endif
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">Sl</th>

                                        <th class="text-center">Image</th>
                                        <th class="text-center">Tagline</th>
                                        <th class="text-center">Title</th>
                                        <th class="text-center">Header</th>


                                        <th class="text-center">Mission</th>
                                        <th class="text-center">Vission</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($leadingpages as $key=>$leadingpage)

                                    <tr>
                                        <td class="text-center text-muted">{{ $key + 1 }}</td>
                                        <td >
                                            <img
                                        src="{{ asset('images/backend') }}/{{ $leadingpage->image }}" alt="post phot" width="100" height="100">

                                        </td>
                                        <td >{{ $leadingpage->tagline }}</td>
                                        <td >{{ $leadingpage->title }}</td>
                                        <td >{{ $leadingpage->header }}</td>


                                        <td class="text-center">{!! Str::limit($leadingpage->mission, 30) !!} </td>
                                        <td class="text-center">{!! Str::limit($leadingpage->vission, 30) !!} </td>



                                        <td class="text-center">

                                            <a class="btn btn-info btn-sm"
                                                href="{{ route('admin.leadingpages.edit',$leadingpage->id) }}"><i
                                                    class="fas fa-edit"></i>
                                                <span>Edit</span>
                                            </a>
                                            {{-- <a href="#"
                                    data-id={{$post->id}}
                                            class="btn btn-danger delete"
                                            data-toggle="modal"
                                            data-target="#deleteModal">Delete</a> --}}

                                            <form action="{{ route('admin.leadingpages.destroy',$leadingpage->id) }}"
                                                method="POST" style="display: inline;">
                                                @csrf()
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Are your sure?')" class="btn btn-danger btn-sm">
                                                    <i class="fas fa-trash-alt"></i>
                                                    <span>Delete</span>
                                                </button>
                                            </form>



                                        </td>
                                    </tr>
                                    @endforeach

                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


@endsection


@section('alert')


@endsection


@push('js')
<script>

</script>

@endpush
