@extends('layouts.master')

@section('title','All Doctor Invoice')

@push('css')
    {{-- <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endpush

@section('content')
    <div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-users icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <form method="POST" action="{{ route('admin.reports.datewisereport') }}">
                    @csrf
                <div>
                    <select name="doctor_id" id="exampleSelect" class="form-control">
                        <option value="0">Select Doctors</option>
                        @foreach($doctors as $doctor)
                            <option value="{{$doctor->id}}" >{{$doctor->name}}</option>
                        @endforeach

                    </select>
                </div>
            </div>
            <div class="page-title-actions">
                <div class="d-inline-block dropdown">

                        <div>

                        </div>

                        {{-- Form: <input type="text" id="datepicker" name="formdate"> --}}
                        Form: <input type="text" id="flatpickr" name="fromdate">
                        to: <input type="text" id="flatpickr" name="todate">


                            <span class="btn-icon-wrapper pr-2 opacity-7">

                        </span>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-search-plus fa-w-20"></i>
                            {{ __('Search') }}
                        </button>


                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="table-responsive">
                    <table id="datatable" class="align-middle mb-0 table table-borderless table-striped table-hover">
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
                                <td class="text-center">{{ $invoice->invprefix}}{{$invoice->id}}</td>
                                <td class="text-center">{{ $invoice->patient->patname}}</td>
                                <td class="text-center">{{ $invoice->doctor->name}}</td>
                                <td class="text-center">{{ $invoice->fee }}</td>
                                <td class="text-center">{{ $invoice->created_at }}</td>
                                <td class="text-center">{{ $invoice->user->name }}</td>


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
            </div>
        </div>
    </div>
    </div>
@endsection

@push('js')
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        var example = flatpickr('#flatpickr');
        flatpickr('#flatpickr',{

            dateFormat: 'Y-m-d',
            });
    </script>
<script>
    $(function () {
        $("#datatable").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#datatable_wrapper .col-md-6:eq(0)');

    });

</script>
@endpush
