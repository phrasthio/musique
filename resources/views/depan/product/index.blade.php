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
	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- STORE -->
				<div id="store" class="col-md-12">
					<!-- store products -->
					@php

					$cols = 4;
					$row = 0;
					$colwidth = 12 / $cols;
					 
					@endphp
					<div class="row">
						@foreach($produks as $produk)
						<!-- product -->
							@php
							    $kali = $produk->harga * $produk->diskon;
							@endphp
							@php
							    $bagi = $kali / 100;
							@endphp
							@php
							    $hasil = $produk->harga - $bagi;
							@endphp
						<div class="col-md-{{$colwidth}}">
							<div class="product">
								<div class="product-img">
									<img src="{{asset('gambars/'.$produk->gambar)}}" alt="">
									<div class="product-label">
									@if($produk->diskon > 0)
					                    <span class="sale">Discount</span>
					                    <span class="new">{{$produk->diskon}}%</span>
					                @endif
									</div>
								</div>
								<div class="product-body">
									<p class="product-category">{{$produk->kategoris->kategori}}</p>
									<h3 class="product-name"><a href="#">{{$produk->namaproduk}}</a></h3>
									@if($produk->diskon > 0)
									<h4 class="product-price">@currency($hasil) 
										<del class="product-old-price">@currency($produk->harga)</del>
									</h4>
									@else
									<h4 class="product-price">@currency($hasil)
									</h4>
									@endif
									<div class="product-btns">
										<a href="/product/details/{{$produk->id}}" class="primary-btn btn-sm">Detail Product</a>
									</div>
								</div>
								<div class="add-to-cart">
									<a href="/product/addtocart/{{$produk->id}}/cart" class="primary-btn">add to cart</a>
								</div>
							</div>
						</div>
						    @php
								$row ++;
								if($row % $cols == 0){
							@endphp
								<div class="row"></div>
							@php
								}
							@endphp

						@endforeach
						<!-- /product -->

					</div>
					<!-- /store products -->
					<!-- store bottom filter -->
					
						{{$produks->links()}}
				
					<!-- /store bottom filter -->
				</div>
				<!-- /STORE -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->
@endsection