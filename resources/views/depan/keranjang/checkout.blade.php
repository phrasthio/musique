@extends('depan.master')

@section('header')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
@stop

@section('content')

<div class="section">
	<!-- container -->
	<div class="container">
		<div class="row">
			<div class="col-md-6">
		        <table class="table table-bordered table-hover dataTable">
					<div class="text-center section-title">
						<h4 class="title">Your Account</h4>
					</div>
	                <thead>
		                <tr class="warning">
		                    <th width="50%">Username</th>
		                    <th width="50%">Email</th>
		                </tr>
	                </thead>
	                <tbody>
	                	<tr role="row" class="odd">
		                	<td>{{ Auth::user()->name }}</td>
		                    <td>{{ Auth::user()->email }}</td>
			            </tr>
		            </tbody>
		            <thead>
		                <tr class="warning">
		                    <th width="50%">Full Name</th>
		                    <th width="50%">Phone</th>
		                </tr>
	                </thead>
	                <tbody>
	                	<tr role="row" class="odd">
		                	<td>{{ Auth::user()->nama_lengkap }}</td>
		                    <td>{{ Auth::user()->nomor_telpon }}</td>
			            </tr>
		            </tbody>
		        </table>
		        <a href="/profile/{{ Auth::user()->name }}/{{ Auth::user()->id }}" class="primary-btn order-submit">Update Your Profile in Here</a>
			</div>
			<div class="col-md-6">
		        <table class="table table-bordered table-hover dataTable">
					<div class="text-center section-title">
						<h4 class="title">Your Address</h4>
					</div>
	                <thead>
		                <tr class="warning">
		                    <th width="50%">Desa</th>
		                    <th width="50%">Kecamatan</th>
		                </tr>
	                </thead>
	                <tbody>
	                	<tr class="odd">
		                	<td>{{ Auth::user()->desa }}</td>
		                    <td>{{ Auth::user()->kecamatan }}</td>
			            </tr>
		            </tbody>
		            <thead>
		                <tr class="warning">
		                    <th width="50%">Kabupaten</th>
		                    <th width="50%">Provinsi</th>
		                </tr>
	                </thead>
	                <tbody>
	                	<tr class="odd">
		                	<td>{{ Auth::user()->kabupaten }}</td>
		                    <td>{{ Auth::user()->provinsi }}</td>
			            </tr>
		            </tbody>
		            <thead>
		                <tr class="warning">
		                    <th width="50%">Kode Pos</th>
		                    <th width="50%">Alamat</th>
		                </tr>
	                </thead>
	                <tbody>
	                	<tr class="odd">
		                	<td>{{ Auth::user()->kode_pos }}</td>
		                    <td>{!! Auth::user()->alamat !!}</td>
			            </tr>
		            </tbody>
		        </table>
			</div>
		</div>
		<div class="row">
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="section-title text-center">
					<h3 class="title">Your Order</h3>
				</div>
	            <table class="table table-bordered table-hover dataTable">
	                <thead>
	                  <tr class="info">
	                    <th width="5%">Qty</th>
	                    <th width="15%">Picture</th>
	                    <th width="50%">Product</th>
	                    <th width="15%">Price</th>
	                    <th width="15%">Total</th>
	                  </tr>
	                </thead>
	                <tbody>
			              @php
		                    $quantity = 0;
		                  @endphp
		                  @php
		                    $subt = 0;
		                  @endphp
		                  @php
		                    $grandt = 0;
		                  @endphp
			            @foreach(Auth::user()->carts as $keranjang)
			            	@php
							    $kali = $keranjang->produks->harga * $keranjang->produks->diskon;
							@endphp
							@php
							    $bagi = $kali / 100;
							@endphp
							@php
							    $hasil = $keranjang->produks->harga - $bagi;
							@endphp
		                    @php
		                      $quantity = $keranjang->qty + $quantity;
		                    @endphp
		                    @php
		                      $items = $keranjang::where('id_user',Auth()->user()->id)->count();
		                    @endphp
		                    @php
		                      $subt = $keranjang->qty * $hasil;
		                    @endphp
		                    @php
		                      $grandt = $subt + $grandt;
		                    @endphp 
		                    @php
		                      $ppn = $grandt * 10;
		                      $ppn1 = $ppn / 100;
		                      $gt = $grandt + $ppn1;
		                    @endphp 

			                <tr role="row" class="odd">
			                	<td>{{$keranjang->qty}}</td>
			                	<td>
                                <div class="text-center image">
                                  <img width="75" src="{{asset('gambars/'.$keranjang->produks->gambar)}}">
                                </div>
			                	</td>
			                    <td>{{ $keranjang->produks->namaproduk }}</td>
			                    <td>@currency($hasil)</td>
			                    <td>@currency($subt)</td>
			                </tr>
		        		@endforeach
		            </tbody>
		        </table>
		        <table class="table table-bordered table-hover dataTable">
	                <thead>
		                <tr class="success">
		                    <th width="25%">Total Qty</th>
		                    <th width="25%">Sub Total</th>
		                    <th width="25%">Ongkir + PPN 10%</th>
		                    <th width="25%">Grand Total</th>
		                </tr>
	                </thead>
	                <tbody>
	                	<tr role="row" class="odd">
		                	<td>{{$quantity}} Items</td>
		                    <td>@currency($grandt)</td>
		                    <td>+ @currency($ppn1)</td>
		                    <th><u>@currency($gt)</u></th>
			            </tr>
		            </tbody>
		        </table>
			</div>
		</div>
		<div class="col-md-6 order-details">
			<a href="/product/cartview/{{ Auth::user()->id }}" class="primary-btn order-submit">Back To Cart</a>
		</div>
		<div class="col-md-6 order-details">
			<a href="/product/checkout/transaction/{{ Auth::user()->id }}" class="primary-btn order-submit">Pay Now</a>
		</div>
	</div>
	<!-- /container -->
</div>

@stop
@section('footer')
<script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@stop