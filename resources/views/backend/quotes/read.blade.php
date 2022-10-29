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
                    <h1>Quotes</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Quote</li>
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
                            <h3 class="card-title">Read</h3>
                            {{-- <a href="{{ route('admin.quotes.create') }}">
                                <h3 class="card-title float-right">Create quote</h3>
                            </a> --}}
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">Sl</th>


                                        <th class="text-center">Name</th>
                                        <th class="text-center">Email</th>


                                        <th class="text-center">Phone</th>
                                        <th class="text-center">Message</th>



                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($quotes as $key=>$quote)

                                    <tr>
                                        <td class="text-center text-muted">{{ $key + 1 }}</td>

                                        <td >{{ $quote->name }}</td>
                                        <td >{{ $quote->email }}</td>
                                        <td >{{ $quote->phone }}</td>
                                        <td >{{ Str::limit($quote->message, 30) }} </td>




                                        <td class="text-center">

                                            {{-- <a class="btn btn-info btn-sm"
                                                href="{{ route('admin.quotes.edit',$quote->id) }}"><i
                                                    class="fas fa-edit"></i>
                                                <span>Mark As Read</span>
                                            </a> --}}
                                            {{-- <a href="#"
                                    data-id={{$post->id}}
                                            class="btn btn-danger delete"
                                            data-toggle="modal"
                                            data-target="#deleteModal">Delete</a> --}}

                                            <form action="{{ route('admin.quotes.update',$quote->id) }}"
                                                method="POST" style="display: inline;">
                                                @csrf()
                                                @method('PUT')
                                                {{-- <input type="hidden" name="read" value="read"> --}}
                                                <button type="submit" onclick="return confirm('Are your sure?')" class="btn btn-info btn-sm">
                                                    <i class="fas fa-edit"></i>
                                                    <span>Mark As Un-Read</span>
                                                </button>
                                            </form>

                                            <form action="{{ route('admin.quotes.destroy',$quote->id) }}"
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
