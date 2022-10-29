@extends('backend.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <div class="content-header">
     <div class="container-fluid">
       <div class="row mb-2">
         <div class="col-sm-6">
           <h1 class="m-0">Dashboard</h1>
         </div><!-- /.col -->
         <div class="col-sm-6">
           <ol class="breadcrumb float-sm-right">
             <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
             <li class="breadcrumb-item active">Dashboard</li>
           </ol>
         </div><!-- /.col -->
       </div><!-- /.row -->
     </div><!-- /.container-fluid -->
   </div>
   <!-- /.content-header -->

   <!-- Main content -->
   <div class="content">
     <div class="container-fluid">
       <div class="row">
           @foreach ($date as $dat)
           <div class="col-lg-3 col-6">
             <!-- small box -->
             <div class="small-box bg-info">
                <div class="inner">
                    <h4>{{ $dat->doctor->name }}</h4>
                     <h4 >Total:{{ $dat->sum }}</h4>
                     <h5>FDH 15% :{{ $dat->sum /100*15}}</h5>
                     <h4>Rest:{{ $dat->sum - $dat->sum /100*15 }}</h4>
                 </div>
               <div class="icon">
                 <i class="ion ion-bag"></i> 
               </div>
               <a href="{{ route('admin.docprint.user',$dat->doctor->id) }}" class="small-box-footer" target="_blank"><i class="fas fa-print"></i> Print </a>
             </div>
           </div>
           @endforeach
           <!-- ./col -->
         </div>
       <!-- /.row -->
     </div><!-- /.container-fluid -->

   {{-- <p>{{ $dat->total_fee }}</p>
   {{$dat->doctor_id}} >-------< {{$dat->sum}} --}}


     <div class="card">
       <div class="card-header border-transparent">
         <h3 class="card-title">Latest Incoice</h3>

         <div class="card-tools">
           <button type="button" class="btn btn-tool" data-card-widget="collapse">
             <i class="fas fa-minus"></i>
           </button>
           <button type="button" class="btn btn-tool" data-card-widget="remove">
             <i class="fas fa-times"></i>
           </button>
         </div>
       </div>
       <!-- /.card-header -->
       <div class="card-body p-0">
         <div class="table-responsive">
           <table class="table m-0">
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

                               <a class="btn btn-info btn-sm" href="{{ route('admin.invoices.print',$invoice->id) }}" target="_blank"><i
                                       class="fas fa-edit"></i>
                                   <span>Print</span>

                           </td>
                       </tr>
                   @endforeach
                   </tbody>







           </table>
         </div>
         <!-- /.table-responsive -->
       </div>
       <!-- /.card-body -->
       <div class="card-footer clearfix">
           <a href="{{ route('admin.invoices.create') }}" class="btn btn-sm btn-info float-left">Create New Doctor Serial</a>
         {{-- <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">View All Invoice</a> --}}
       </div>
       <!-- /.card-footer -->
     </div>
   </div>
   <!-- /.content -->





 </div>
 <!-- /.content-wrapper -->

@endsection
