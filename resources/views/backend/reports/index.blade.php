@extends('backend.master')

@section('title')

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
            <h1>All Report</h1>
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
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="{{ route('admin.reports.datewisereport') }}">
                        @csrf
                            <div class="form-group row mb-3">
                                <div class="col-sm-3">
                                    <label for="start_date" class="col-form-label">Start Date<span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" id="flatpickr" name="fromdate" required="required" placeholder="From Date">
                                    <span class="text-danger" id="start_date_msg"></span>
                                </div>
                                <div class="col-sm-3">
                                    <label for="end_date" class="col-form-label">End Date<span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" id="flatpickr" name="todate" required="required" placeholder="To Date">
                                    <span class="text-danger" id="end_date_msg"></span>
                                </div>
                                <div class="col-sm-3" data-select2-id="4">
                                    <label for="customer" class="col-form-label">Doctor</label>
                                    <select class="form-control select2 select2-hidden-accessible" name="doctor_id" id="customer" data-select2-id="customer" tabindex="-1" aria-hidden="true">
                                        <option value="" data-select2-id="2">Select Doctor</option>
                                        @foreach($doctors as $doctor)

                                        <option value="{{$doctor->id}}" >{{$doctor->name}}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="col-sm-3 justify-content-end pt-3 mt-3">
                                    <button type="submit" class="btn btn-primary mt-07" id="generate-report">Generate Report</button>
                                </div>
                            </div>
                            <hr>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->



      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <div class="card">
              <div class="card-header">

                {{-- <div class="card-title">
                   <form method="POST" action="{{ route('admin.reports.datewisereport') }}">
                        @csrf
                    <div class="card-title float-left">
                        <select name="doctor_id" id="exampleSelect" class="form-control">
                            <option class="form-control">Select Doctors</option>
                            @foreach($doctors as $doctor)
                                <option value="{{$doctor->id}}" >{{$doctor->name}}</option>
                            @endforeach

                        </select>
                    </div>

                        <div class="card-title float-left">
                            &nbsp; &nbsp;
                            Form: <input type="text" id="flatpickr" name="fromdate" placeholder="From Date">
                                        To: <input type="text" id="flatpickr" name="todate" placeholder="To Date">
                        </div>
                        &nbsp;
                                <button type="submit">

                                    <i class="fas fa-search"></i>
                                    Search</button>


                        </form>
                </div> --}}
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


                            <th class="text-center">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($invoices as $key=>$invoice)
                            <tr>
                                <td class="text-center text-muted">#{{ $key + 1 }}</td>
                                <td class="text-center">{{ $invoice->inv_no}}</td>
                                <td class="text-center">{{ $invoice->patient->patname}}</td>
                                <td class="text-center">{{ $invoice->doctor->name}}</td>
                                <td class="text-center">{{ $invoice->fee }}</td>
                                <td class="text-center">{{ $invoice->created_at }}</td>
                                <td class="text-center">{{ $invoice->creator->name }}</td>


                                <td class="text-center">

{{--                                    <a class="btn btn-info btn-sm" href="{{ route('admin.invoices/new',$invoice->id) }}"><i--}}
{{--                                            class="fas fa-edit"></i>--}}
{{--                                        <span>Prescription</span>--}}
{{--                                    </a>--}}

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
                                </td>
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
