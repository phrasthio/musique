@extends('depan.master')

@section('content')    
<nav id="navigation">
  <!-- container -->
  <div class="container">
    <!-- responsive-nav -->
    <div id="responsive-nav">
      <!-- NAV -->
      <ul class="main-nav nav navbar-nav">
        <li class="active"><a href="/profile/{{ Auth::user()->name }}/{{ Auth::user()->id }}"><h3>Profile</h3></a></li>
        <li><a href="/profile/history/{{ Auth::user()->name }}/{{ Auth::user()->id }}"><h3>History</h3></a></li>
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
     <!-- Product main img -->
      <div class="col-md-1">

      </div>
    <!-- /Product main img -->
    <!-- Product details -->
      <div class="col-md-7 order-details">

            <div class="order-summary">            
              <div class="order-col">
                <div><h4>Fullname</h4></div>
                <div>{{ Auth::user()->nama_lengkap }}</div>
              </div>
              <div class="order-col">
                <div><h4>Phone</h4></div>
                <div>{{ Auth::user()->nomor_telpon }}</div>
              </div>
              <div class="order-col">
                <div><h4>Email</h4></div>
                <div>{{ Auth::user()->email }}</div>
              </div>
              <div class="order-col">
                <div><h4>Jenis Kelamin</h4></div>
                <div>
                    @if(auth()->user()->jenis_kelamin == 'L')
                      Laki - Laki
                    @else
                      Perempuan
                    @endif
                </div>
              </div>
              <div class="order-col">
                <div><h4>Desa</h4></div>
                <div>{{ Auth::user()->desa }}</div>
              </div>
              <div class="order-col">
                <div><h4>Kecamatan</h4></div>
                <div>{{ Auth::user()->kecamatan }}</div>
              </div>
              <div class="order-col">
                <div><h4>Kabupaten</h4></div>
                <div>{{ Auth::user()->kabupaten }}</div>
              </div>
              <div class="order-col">
                <div><h4>Provinsi</h4></div>
                <div>{{ Auth::user()->provinsi }}</div>
              </div>
              <div class="order-col">
                <div><h4>Kode Pos</h4></div>
                <div>{{ Auth::user()->kode_pos }}</div>
              </div>
              <div class="order-col">
                <div><h4>Alamat</h4></div>
                <div>{{ Auth::user()->alamat }}</div>
              </div>
            </div>
            
            <a href="/profile/edit/{{ Auth::user()->name }}/{{ Auth::user()->id }}" class="primary-btn order-submit">Edit Profile</a>

      </div>
      <div class="col-md-3 order-details">
        <div class="section-title text-center">
          <h5 class="title">Photo {{ Auth::user()->name }}</h5>
        </div>
        <div id="product-main-img">
          <div class="product-preview">
            <img src="{{asset('gambars/'.Auth::user()->foto)}}">
          </div>
        </div>
        @if(Auth::user()->role == "admin")
          <div class="section-title text-center">
            <a href="/admin/dashboard" class="primary-btn">Dashboard</a>
          </div>
        @elseif(Auth::user()->role == "pemilik" )
          <div class="section-title text-center">
            <a href="/admin/dashboard" class="primary-btn">Dashboard</a>
          </div>
        @endif
      </div>
      <!-- /Product details -->
            <!-- Product main img -->
      <div class="col-md-1">

      </div>
      <!-- /Product main img -->

    </div>
    <!-- /row -->
  </div>
  <!-- /container -->
</div>
<!-- /SECTION -->
@endsection