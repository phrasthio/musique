@extends('belakang.master')

@section('contentbelakang')    
<section class="content-header">
  <h1>
    ORDER 
    <small>Halaman Kelola Order Masuk</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="/admin/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active">Order</li>
  </ol>
</section>

<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
         <strong>Order Masuk</strong>
        </div>
        <div class="box-body">
          <table class="table table-bordered table-hover dataTable">
              <thead>
                <tr class="success">
                  <th>INVOICE</th>
                  <th>NAMA</th>
                  <th>STATUS</th>
                  <th>TANGGAL ORDER</th>
                  <th>JATUH TEMPO</th>
                  <th>AKSI</th>
                </tr>
              </thead>
              <tbody>
              @php setlocale(LC_TIME, 'id');    @endphp  
              @foreach($dapems as $pembeli)
                <tr role="row" class="odd">
                  <td>{{$pembeli->invoice}}</td>
                  <td>{{$pembeli->users->name}}</td>
                  <td>{{$pembeli->status}}</td>
                  <td>{{$pembeli->created_at->formatLocalized('%A, %d %B %Y %H : %m')}}</td>
                  <td>{{$pembeli->jatuhtempo}}</td>
                  <td>
                    <a href="/admin/inorder/detail/{{$pembeli->id}}/{{$pembeli->id_user}}/{{$pembeli->invoice}}" class="btn btn-info">Details</a>
                  </td>
                </tr>
              @endforeach
              </tbody>
          </table>
          {{$dapems->links()}}
        </div>
      </div>  
    </div>
  </div>
</section>
@endsection