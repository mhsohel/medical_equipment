@extends('backend.master')

@section('title')

Date Wise Report

@endsection

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
            <h1>Date Wise Report</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
              <li class="breadcrumb-item active">Invoice</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">


        <div class="row">
          <div class="col-12">

            <div class="card">
              <div class="card-header">


                    <h3 class="card-title"><b>From:</b>  {{$start  }} <b>To:</b>{{$enddate  }}</h3>
                    <a href="{{ route('admin.reports.index') }}"><h3 class="card-title float-right">Back</h3></a>


                {{-- <a href="{{ route('admin.invoices.create') }}"><h3 class="card-title float-right">Create Doctor Serial</h3></a> --}}
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>Invoice No</th>
                            <th>Name</th>
                            <th class="text-center">Doctor</th>
                            <th class="text-center">Amount</th>
                            <th class="text-center">Date</th>
                            <th class="text-center">User</th>


                            {{-- <th class="text-center">Actions</th> --}}
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($invoices as $key=>$invoice)
                            <tr>
                                <td class="text-center text-muted">#{{ $key + 1 }}</td>
                                <td class="text-center">{{ $invoice->invprefix}}{{$invoice->id}}</td>
                                <td class="text-center">{{ $invoice->patient->patname}}</td>
                                <td class="text-center">{{ $invoice->doctor->name}}</td>
                                <td class="text-center">{{ $invoice->fee }}</td>
                                <td class="text-center">{{ $invoice->created_at }}</td>
                                <td class="text-center">{{ $invoice->creator->name }}</td>


                                {{-- <td class="text-center">

                                   <a class="btn btn-info btn-sm" href="{{ route('admin.invoices/new',$invoice->id) }}"><i
                                           class="fas fa-edit"></i>
                                       <span>Prescription</span>
                                   </a>

                                    <a class="btn btn-info btn-sm" href="{{ route('admin.invoices.print',$invoice->id) }}"><i
                                            class="fas fa-edit"></i>
                                        <span>Print</span>
                                    </a>  <a class="btn btn-info btn-sm" href="{{ route('admin.invoices.edit',$invoice->id) }}"><i
                                            class="fas fa-edit"></i>
                                        <span>Edit</span>
                                    </a>
                                    <button type="button" class="btn btn-danger btn-sm"
                                            onclick="deleteData({{ $invoice->id }})">
                                        <i class="fas fa-trash-alt"></i>
                                        <span>Delete</span>
                                    </button>
                                    <form id="delete-form-{{ $invoice->id }}"
                                          action="{{ route('admin.invoices.destroy',$invoice->id) }}" method="POST"
                                          style="display: none;">
                                        @csrf()
                                        @method('DELETE')
                                    </form>
                                </td> --}}
                            </tr>
                        @endforeach
                        </tbody>
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th class="text-center">Total</th>
                            <th class="text-center">{{ $invoices->sum('fee') }}</th>
                          </tr>
                          </tfoot>



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



    @endsection

@push('js')



@endpush
