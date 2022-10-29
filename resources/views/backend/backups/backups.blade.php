@extends('backend.master')

@section('title','Backups')

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
@endpush

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DataTables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
              <li class="breadcrumb-item active">Module</li>
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
                <h3 class="card-title">Module</h3>
                <h3 class="card-title float-right">
                <button onclick="event.preventDefault();
                document.getElementById('clean-old-backups').submit();"
                  class="btn-shadow btn btn-danger">
              <span class="btn-icon-wrapper pr-2 opacity-7">
                  <i class="fas fa-trash fa-w-20"></i>
              </span>
              {{ __('Clean Old Backups') }}
          </button>
          <form id="clean-old-backups"   method="POST" style="display: none;">
              @csrf
              @method('DELETE')
          </form>

          <button onclick="event.preventDefault();
                document.getElementById('new-backup-form').submit();"
                  class="btn-shadow btn btn-info">
              <span class="btn-icon-wrapper pr-2 opacity-7">
                  <i class="fas fa-plus-circle fa-w-20"></i>
              </span>
              {{ __('Create New Backup') }}
          </button>
          <form id="new-backup-form" action="{{ route('admin.backups.store') }}" method="POST" style="display: none;">
              @csrf
          </form>
        </h3>
                {{-- <a href="{{ route('admin.modules.create') }}"><h3 class="card-title float-right">Create Module</h3></a> --}}
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">Sl</th>

                            <th class="text-center">Name</th>
                            <th class="text-center">Size</th>
                            <th class="text-center">Created At</th>

                            <th class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($backups as $key=>$backup)
                            <tr>
                                <td class="text-center text-muted">#{{ $key + 1 }}</td>
                                <td class="text-center">
                                    <code>{{ $backup['file_name'] }}</code>
                                </td>
                                <td class="text-center">{{ $backup['file_size'] }}</td>
                                <td class="text-center">{{ $backup['created_at'] }}</td>
                                <td class="text-center">
                                    <a class="btn btn-info btn-sm" href="{{ route('admin.backups.download',$backup['file_name']) }}"><i
                                            class="fas fa-download"></i>
                                        <span>Download</span>
                                    </a>
                                    <button type="button" class="btn btn-danger btn-sm"
                                            onclick="deleteData({{ $key }})">
                                        <i class="fas fa-trash-alt"></i>
                                        <span>Delete</span>
                                    </button>
                                    <form id="delete-form-{{ $key }}"
                                          action="{{ route('admin.backups.destroy',$backup['file_name']) }}" method="POST"
                                          style="display: none;">
                                        @csrf()
                                        @method('DELETE')
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

@push('js')

@endpush
