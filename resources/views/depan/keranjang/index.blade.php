@extends('depan.master')

@section('header')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
@stop

@section('content')
<div class="section">
	<!-- container -->
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
                    <th width="5%">No</th>
                    <th width="10%">Picture</th>
                    <th width="28%">Product</th>
                    <th width="6%">Discount</th>
                    <th width="15%">Price</th>
                    <th width="4%">Qty</th>
                    <th width="15%">Sub Total</th>
                    <th width="7%">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @php
                    $no = 1; 
                  @endphp
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
                      $ppn1 = $grandt / 100;
                      $gt = $grandt + $ppn1;
                    @endphp 
                  <tr role="row" class="odd">
                    <td>{{$no}}</td>
                    <td>
                      <div class="img-container">
                        <img width="100px" src="{{asset('gambars/'.$keranjang->produks->gambar)}}">
                      </div>
                    </td>
                    <td>{{ $keranjang->produks->namaproduk }}</td>
                    <td>{{$keranjang->produks->diskon}}%</td>
                    <td>@currency($hasil)</td>
                    <td>
                    <a href="/product/cartview/{{ Auth::user()->id }}" class="qty" data-type="text" data-pk="{{$keranjang->id}}" data-url="/api/cart/{{$keranjang->id}}/editqty" data-title="Update Qty">{{$keranjang->qty}}</a>
                    </td>
                    <td>@currency($subt)</td>
                    <td class="text-center">
                      <a href="#" class="delete" cart-id="{{$keranjang->id}}" cart-nama="{{$keranjang->produks->namaproduk}}">Delete</a>
                    </td>
                  </tr>
                  @php
                    $no++;
                  @endphp 
                @endforeach
                </tbody>
            </table>
          </div>
        </div>  
      </div>
		</div>
    <div class="row">
      <div class="col-xs-4">
      </div>
      <div class="col-xs-4">
        <div class="add-to-cart">
          <a href="/product" class="primary-btn">Next Shop</a>
          <a href="/product/checkout/{{ Auth::user()->id }}" class="primary-btn">Checkout</a>
        </div>
      </div>
      <div class="col-xs-4">
        <div class="box">
          <div class="box-body">

            <table class="table table-bordered table-hover dataTable">
                  <tr>
                    <th class="info">Total Qty</th>
                    <th width="50%">{{$quantity}} Items</th>                    
                  </tr>

                  <tr>
                    <th class="info">Sub Total</th>
                    <th width="50%">@currency($grandt)</th>                    
                  </tr>

                  <tr>
                    <th class="info">PPN 10%</th>
                    <th width="50%">+ @currency($ppn1)</th>                    
                  </tr>

                  <tr>
                    <th class="warning"></th>
                    <th class="warning"></th>                    
                  </tr>

                  <tr>
                    <th class="info">Grand Total</th>
                    <th width="50%">@currency($gt)</th>                    
                  </tr>
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
<script>
$(document).ready(function() {
    $('.qty').editable();
});
</script>

<script>
  $('.delete').click(function(){
    var cart_id = $(this).attr('cart-id');
    var cart_nama = $(this).attr('cart-nama');
    swal({
      title: "Yakin ?",
      text: "Mau dihapus produk " + cart_nama + " dari Keranjang??",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        window.location = "/product/hapus/" + cart_id + "/items";
        
      } else {
        
      }
    });
  });
</script>

@stop