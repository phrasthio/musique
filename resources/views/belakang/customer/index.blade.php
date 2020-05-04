@extends('belakang.master')

@section('contentbelakang')    
  <section class="content-header">
    <h1>
      CUSTOMERS
    </h1>
    <ol class="breadcrumb">
      <li><a href="/admin/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active">Customer</li>
    </ol>
  </section>

  <section class="content"> 
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
           <strong>Data - Data Customer</strong>
          </div>
          <div class="box-body">
            <table class="table table-bordered table-hover dataTable">
                <thead>
                  <tr class="success">
                    <th>Username</th>
                    <th>Email</th>
                    <th>Full Name</th>
                    <th>Register On</th>
                    <th>AKSI</th>
                  </tr>
                </thead>
                <tbody>
                @php setlocale(LC_TIME, 'id');    @endphp  
                @foreach($customers as $customer)
                  <tr role="row" class="odd">
                    <td>{{$customer->name}}</td>
                    <td>{{$customer->email}}</td>
                    <td>{{$customer->nama_lengkap}}</td>
                    <td>{{$customer->created_at->formatLocalized('%A, %d %B %Y %H : %m')}}</td>
                    <td>
                      @if(Auth::user()->role == "pemilik")
                        <a href="/admin/customer/detail/{{$customer->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                      @endif
                        <a href="/admin/customer/detail/{{$customer->id}}" class="btn btn-info btn-sm">View</a>
                      
                     
                    </td>
                  </tr>
                @endforeach
                </tbody>
            </table>
            {{$customers->links()}}
          </div>
        </div>  
      </div>

    </div>
  </section>
@endsection