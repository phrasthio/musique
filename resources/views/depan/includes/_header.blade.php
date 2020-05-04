<header>
	<!-- TOP HEADER -->
	<div id="top-header">
		<div class="container">
			<ul class="header-links pull-left">
				<li class="putih"><i class="fa fa-phone"></i> 021-57853547</li>
				<li class="putih"><i class="fa fa-envelope-o"></i> cs@musique.co.id</li>
				<li class="putih"><i class="fa fa-map-marker"></i> Jl. M.H. Thamrin - Plaza Indonesia</li>
			</ul>
		</div>
	</div>
	<!-- /TOP HEADER -->

	<!-- MAIN HEADER -->
	<div id="header">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- LOGO -->
				<div class="col-md-3">
					<div class="header-logo">
						<a href="/" class="logo">
							<img src="{{asset('/electro/img/logo.png')}}" alt="">
						</a>
					</div>
				</div>
				<!-- /LOGO -->

				<!-- SEARCH BAR -->
				<div class="col-md-6">
					<div class="header-search">
						<form>
							<select class="input-select">
								<option name"namaproduk" value="1">All Categories</option>
							</select>
							<input class="input" placeholder="Search here">
							<button class="search-btn">Search</button>
						</form>
					</div>
				</div>
				<!-- /SEARCH BAR -->

				<!-- ACCOUNT -->
				<div class="col-md-3 clearfix">
					<div class="header-ctn">
						@guest
						<!-- Login  Or Register -->
						<div>
							<a href="{{ route('login') }}">
								<i class="fa fa-user-o"></i>
								<span>Login</span>
							</a>
						</div>
						<div>
							<a href="{{ route('register') }}">
								<i class="fa fa-user"></i>
								<span>Register</span>
							</a>
						</div>
						<!-- /Login  Or Register -->
						@else
						<!-- Cart -->
						  @php
						    $quantity = 0;
						  @endphp
						  @php
						    $subt = 0;
						  @endphp
						  @php
						    $grandt = 0;
						  @endphp
						  @php
						    $items = 0;
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
					    @endforeach 
						<div class="dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
								<i class="fa fa-shopping-cart"></i>
								<span>Your Cart</span>
								<div class="qty">{{$items}}</div>
							</a>
							<div class="cart-dropdown">
								<div class="cart-summary">
									<span>{{$items}} Items | {{$quantity}} Qty</span>
									<h5>SUB TOTAL : @currency($grandt)</h5>
								</div>
								<div class="cart-btns">
									<a href="/product/cartview/{{ Auth::user()->id }}">View Cart</a>
									<a href="/product/checkout/{{ Auth::user()->id }}">Checkout</a>
								</div>
							</div>
						</div>
						<!-- /Cart -->
						<!-- Cart -->
						<div class="dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
								<i class="fa fa-user"></i>
								<span>{{ Auth::user()->name }}</span>
							</a>
							<div class="cart-dropdown">
									<li><strong class="text-center">{{ Auth::user()->nama_lengkap }}</strong></li><br>
									<div class="product-widget">
										<div class="product-body">
											<img width="150px" src="{{asset('gambars/'.Auth::user()->foto)}}" alt="">
										</div><br>
									</div>
								<div class="cart-btns">
									<a href="/profile/{{ Auth::user()->name }}/{{ Auth::user()->id }}">Profile</a>
									<a href="{{ route('logout') }}" onclick="event.preventDefault();
					                                   document.getElementById('logout-form').submit();">Logout
					                </a>
					                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
				                        @csrf
				                    </form>
								</div>
							</div>
						</div>
						<!-- /Cart -->
						@endguest
						<!-- Menu Toogle -->
						<div class="menu-toggle">
							<a href="#">
								<i class="fa fa-bars"></i>
								<span>Menu</span>
							</a>
						</div>
						<!-- /Menu Toogle -->
					</div>
				</div>
				<!-- /ACCOUNT -->
			</div>
			<!-- row -->
		</div>
		<!-- container -->
	</div>
	<!-- /MAIN HEADER -->
</header>