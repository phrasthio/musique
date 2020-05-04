@extends('depan.master')

@section('header')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
@stop

@section('content')
<nav id="navigation">
  <!-- container -->
  <div class="container">
    <!-- responsive-nav -->
    <div id="responsive-nav">
      <!-- NAV -->
      <ul class="main-nav nav navbar-nav">
        <li><a href="/profile/{{ Auth::user()->name }}/{{ Auth::user()->id }}"><h3>Profile</h3></a></li>
        <li class="active"><a href="/profile/history/{{ Auth::user()->id }}"><h3>History</h3></a></li>
      </ul>
      <!-- /NAV -->
    </div>
    <!-- /responsive-nav -->
  </div>
  <!-- /container -->
</nav>
<div class="content">
	<div class="container">
		<!-- row -->
    @if($counts == 0)
      <div class="row">
        <h4 class="text-center">Product Not Found</h4>
      </div>
    @else
		<div class="row">
			
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h4>Your Cart {{ Auth::user()->name }}</h4>
          </div>
          <div class="box-body">
            <table class="table table-bordered table-hover dataTable">
                <thead>
                  <tr class="info">
                    <th width="10%">Invoice</th>
                    <th width="15%">Status</th>
                    <th width="25%">Tanggal Order</th>
                    <th width="25%">Jatuh Tempo</th>
                    <th width="10%">Action</th>
                  </tr>
                </thead>
                <tbody>


              		@php setlocale(LC_TIME, 'id');    @endphp  
            @foreach($dapems as $pembeli)
                <tr role="row" class="odd">
                  <td>#{{$pembeli->invoice}}</td>
                  <td>{{$pembeli->status}}</td>
                  <td>{{$pembeli->created_at->formatLocalized('%A, %d %B %Y %H : %m')}}</td>
                  <td>{{$pembeli->jatuhtempo}}</td>
                  <td>
                    <a href="/profile/history/order/detail/{{$pembeli->id}}/{{$pembeli->id_user}}/{{$pembeli->invoice}}" class="btn btn-info">Details</a>
                  </td>
                </tr>
            @endforeach
                </tbody>
            </table>
          </div>
        </div>  
      </div>
		</div>
    @endif



	</div>
</div>

@stop
@section('footer')
<script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@stop