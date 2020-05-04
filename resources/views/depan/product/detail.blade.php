@extends('depan.master')

@section('content')
<nav id="navigation">
  <!-- container -->
  <div class="container">
    <!-- responsive-nav -->
    <div id="responsive-nav">
      <!-- NAV -->
      <ul class="main-nav nav navbar-nav">
        <li><a href="/product"><h4>All</h4></a></li>
        @foreach($kategoris as $kategori)
        <li><a href="/product/kategori/{{$kategori->id}}"><h4>{{$kategori->kategori}}</h4></a></li>
        @endforeach
      </ul>
      <!-- /NAV -->
    </div>
    <!-- /responsive-nav -->
  </div>
  <!-- /container -->
</nav>
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<!-- Product thumb imgs -->
		    <div class="col-md-1">
			</div>

			<div class="col-md-5 order-details">
				<div id="product-main-img">
					<div class="product-preview">
						<img src="{{asset('gambars/'.$produks->gambar)}}" alt="">
					</div>
				</div>
			</div>
			<!-- /Product thumb imgs -->
			@php
			    $kali = $produks->harga * $produks->diskon;
			@endphp
			@php
			    $bagi = $kali / 100;
			@endphp
			@php
			    $hasil = $produks->harga - $bagi;
			@endphp
			<!-- Product details -->
			<div class="col-md-5 text-center">
				<div class="product-details">
					<h2 class="product-name">{{$produks->namaproduk}}</h2>
					<div>
					@if($produks->diskon > 0)
						<h3 class="product-price">@currency($hasil) <del class="product-old-price">@currency($produks->harga)</del></h3>
					<h5><i>Special Discount {{$produks->diskon}}%</i></h5>
					@else
						<h3 class="product-price">@currency($hasil)
						</h3>
					@endif
					</div>

					<form action="/product/addtocart/{{$produks->id}}/cartqty" method="POST" enctype="multipart/form-data">
            			{{csrf_field()}}
						<div class="add-to-cart">
							<div class="qty-label">
								Qty
								<div class="input-number">
									<input name="qty" type="number" class="form-control" id="namaproduk" value="1">
									<span class="qty-up">+</span>
									<span class="qty-down">-</span>
								</div>
							</div>
						</div>
						<ul class="product-links">
							<li>Category:</li>
							<li><a href="/product/kategori/{{$produks->kategoris->id}}">{{$produks->kategoris->kategori}}</a></li>
						</ul>
						<ul class="product-links">
						</ul>
						<ul class="product-links">
						</ul>
						<div class="add-to-cart">
							<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
						</div>
					</form>


				</div>
			</div>
			<!-- /Product details -->
			<div class="col-md-1">
			</div>
		</div>
		<div class="row">
			<!-- Product tab -->
			<div class="col-md-1">
			</div>
			<div class="col-md-10">
				<div id="product-tab">
					<!-- product tab nav -->
					<ul class="tab-nav">
						<li><h4>Description</h4></li>
					</ul>
					<!-- /product tab nav -->

					<!-- product tab content -->
					<div class="tab-content">
						<!-- tab1  -->
						<div id="tab1" class="tab-pane fade in active">
							<div class="row">
								<div class="col-md-12">
									{!! $produks->deskripsi !!}
								</div>
							</div>
						</div>
						<!-- /tab1  -->
					</div>
					<!-- /product tab content  -->
				</div>
			</div>
			<!-- /product tab -->
			<div class="col-md-1">
			</div>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
@endsection