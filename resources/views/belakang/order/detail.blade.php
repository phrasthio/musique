@extends('belakang.master')

@section('contentbelakang')  
<section class="content-header">
  <h1>
    Detail Order
    <small>Perbarui Status Transaksi Pembelian</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="/admin/dashboard"><i class="fa fa-dashboard"></i>Dashboard</a></li>
    <li class="active">Detail</li>
  </ol>
</section>
  
<div class="content">
	<section class="invoice">
	  <!-- title row -->
	  <div class="row">
	    <div class="col-xs-12">
	    @php
			$quantity = 0;
		@endphp
		@php
			$subt = 0;
		@endphp
		@php
			$grandt = 0;
		@endphp
	      <h2 class="page-header">
	        <i class="fa fa-user"></i> Admin Musique <i>{{ Auth::user()->name }}</i>
	        @php setlocale(LC_TIME, 'id');    @endphp  
	        <small class="pull-right">Tanggal Invoice : {{$pembelians->created_at->formatLocalized('%A, %d %B %Y %H : %m')}}</small>
	      </h2>
	    </div>
	    <!-- /.col -->
	  </div>
	  <!-- info row -->
	  <div class="row invoice-info">
	    <div class="col-sm-4 invoice-col">
	        <address>
	            <strong>Data Diri</strong><br>
	            Username : {{$ucers->name}}<br>
	            Nama Lengkap : {{$ucers->nama_lengkap}}<br>
	            Telpon : {{$ucers->nomor_telpon}}<br>
	            Email : {{$ucers->email}}<br>
	            Join On : {{$ucers->created_at->formatLocalized('%A, %d %B %Y')}}<br>
	        </address>
	    </div>
	    <!-- /.col -->
	    <div class="col-sm-4 invoice-col">
	      <address>
	        <strong> Alamat </strong><br>
	            Alamat : {!!$ucers->alamat!!}<br>
	            Desa : {{$ucers->desa}}<br>
	            Kecamatan : {{$ucers->kecamatan}}<br>
	            Kabupaten : {{$ucers->kabupaten}}<br>
	            Provinsi : {{$ucers->provinsi}}, {{$ucers->kode_pos}}<br>
	      	</address>
	    </div>
	    <!-- /.col -->
	    <div class="col-sm-4 invoice-col">
	      <address>
            <strong> INVOICE #{{$pembelians->invoice}}  </strong><br>
            ID Transaksi : {{$pembelians->id}}  <br>
            ID User : {{$pembelians->id_user}}  <br>
            <br>
            <br>
            Jatuh Tempo : {{$pembelians->jatuhtempo}} <br>

          </address>
	    </div>
	    <!-- /.col -->
	  </div>
	  <!-- /.row -->

	  <!-- Table row -->
	  <div class="row">
	    <div class="col-xs-12 table-responsive">
	      <table class="table table-">
	        <thead>
	        <tr class="success">
	          <th>Qty</th>
	          <th>Product</th>
	          <th>Harga Awal</th>
	          <th>Diskon</th>
	          <th>Harga Akhir</th>
	          <th>Subtotal</th>
	        </tr>
	        </thead>
	        <tbody>
	        @foreach($produkpembelians as $produk)
      			@php
				    $kali = $produk->harga * $produk->diskon;
				@endphp
				@php
				    $bagi = $kali / 100;
				@endphp
				@php
				    $hasil = $produk->harga - $bagi;
				@endphp

				@php
            		$quantity = $produk->qty + $quantity;
            	@endphp
            	
            	@php
            		$subt = $produk->qty * $hasil;
            	@endphp

            	@php
            		$grandt = $subt + $grandt;
            	@endphp
                @php
                  $ppn = $grandt * 10;
                  $ppn1 = $grandt / 100;
                  $gt = $grandt + $ppn1;
                @endphp 
                <tr>
                	<td>{{$produk->qty}}</td>
					<td>{{$produk->namaproduk}}</td>
					<td>@currency($produk->harga)</td>
					<td>{{$produk->diskon}} %</td>
					<td>@currency($hasil)</td>
					<td>@currency($subt)</td>
                </tr>
            @endforeach
	        </tbody>
	      </table>
	    </div>
	    <!-- /.col -->
	  </div>
	  <!-- /.row -->
	    <!-- /.col -->
	    <div class="row">
	    	<form action="/perbaruistatus/{{$pembelians->id}}" method="POST" enctype="multipart/form-data">
			 {{csrf_field()}}
	        <div class="col-md-6">
	        	<h4>Perbarui Status</h4>
	          <h6 class="text-muted well well-sm no-shadow">
	            <div class="form-group">
                    <select name="status" class="form-control" id="status">
					      <option value="Lunas" @if($pembelians->status == 'Lunas') selected @endif>Lunas</option>
					      <option value="Belum Bayar" @if($pembelians->status == 'Belum Bayar') selected @endif>Belum Bayar</option>
				    </select>
                </div>
	          </h6>
	        </div>
	        <!-- /.col -->
	        <div class="col-md-6">
	          <div class="table-responsive">
	            <table class="table">
	              <tbody><tr>
	                <th style="width:50%">Sub Total :</th>
	                <td>@currency($grandt)</td>
	              </tr>
	              <tr>
	                <th>Total Quantity :</th>
	                <td>{{ $quantity }}</td>
	              </tr>
	              <tr>
	                <th>Biaya pengiriman :</th>
	                <td>@currency($ppn1)</td>
	              </tr>
	              <tr>
	                <th>Grand Total :</th>
	                <td>@currency($gt)</td>
	              </tr>
	            </tbody></table>
	          </div>
	        </div>
	   	    <!-- /.col -->

		    <div class="col-xs-12">
		      <button type="submit" class="btn btn-success pull-right" style="margin-left: 5px;">Perbarui Status</button>
		     
		      <a href="/admin/inorder" class="btn btn-primary pull-right">Kembali</a>
		    </div>
		 </div>
	  	 </form>
	</section>
</div>
@endsection