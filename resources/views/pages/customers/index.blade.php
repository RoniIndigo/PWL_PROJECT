@extends('layouts.app')
@section('content')
<div class="container-fluid">

   <!-- Page Heading -->
   <h1 class="h3 mb-2 text-gray-800">Data Customers</h1>
   <!-- DataTales Example -->
   <div class="card shadow mb-4">
       <div class="card-header py-3">
        <a href="{{route('customers.create')}}" class="btn btn-success btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-plus"></i>
            </span>
            <span class="text">Tambah Customer</span>
        </a>
        @if(session('success'))
            <div class="alert alert-success alert-dismissible mt-4" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h6><i class="fas fa-check"></i><b> Success  {{session('success')}}</b></h6>
              </div>
            @endif

           @if(session('delete'))
            <div class="alert alert-danger alert-dismissible mt-4" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h6><i class="fas fa-trash"></i><b>  {{session('delete')}}</b></h6>
              </div>
          @endif
       </div>
       <div class="card-body">
           <div class="table-responsive">
               <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                   <thead>
                       <tr>
                           <th>Name</th>
                           <th>Nomor Telephone</th>
                           <th>Alamat</th>
                           <th>Action</th>
                       </tr>
                   </thead>
                   <tfoot>
                       <tr>
                        <th>Name</th>
                        <th>Nomor Telephone</th>
                        <th>Alamat</th>
                        <th>Action</th>
                       </tr>
                   </tfoot>
                   <tbody>
                       @foreach($data as $item)
                       <tr>
                           <td>{{$item->nama}}</td>
                           <td>{{$item->no_hp}}</td>
                           <td>{{$item->alamat}}</td>
                           <td>
                            <a class="btn btn-primary" href="{{ route('customers.edit',$item->id) }}">Edit</a>
                           
                            <form action="{{route('customers.destroy',$item->id)}}" method="post" class="d-inline">
                                @method('delete')
                                  @csrf
                                <button type="submit" onclick="return confirm('are you sure?')" class="btn btn-danger" on>
                                   Delete
                              </form>
                           </td>
                       </tr>
                       @endforeach
                   </tbody>
               </table>
           </div>
       </div>
   </div>

</div>
<!-- /.container-fluid -->
@endsection