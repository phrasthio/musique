@extends('belakang.master')

@section('contentbelakang')    
<section class="content-header">
  <h1>
    Detail Produk
    <small><b><i>{{$produks->namaproduk}}</i></b></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="/produk"><i class="fa fa-dashboard"></i>Product</a></li>
    <li class="active">Detail Produk</li>
  </ol>
</section>
<div class="content">
  <div class="row">

    <div class="col-xs-3">
    </div>
    
    <div class="col-xs-6">
      <div class="box">
        <div class="box-body box-profile">
          <img class="user-img img-responsive" src="{{asset('gambars/'.$produks->gambar)}}">

          <h3 class="profile-username text-center">{{$produks->namaproduk}}</h3>

          <p class="text-muted text-center">{{$produks->kategoris->kategori}}</p>

          <ul class="list-group list-group-bordered">
            <li class="list-group-item">
              <b>Harga</b> <strong class="pull-right">@currency($produks->harga)</strong>
            </li>
            <li class="list-group-item">
              <b>Diskon</b> <strong class="pull-right">{{$produks->diskon}} %</strong>
            </li>
            <li class="list-group-item">
              <b>Deskripsi</b><br><p>{!!$produks->deskripsi!!}</p>
            </li>
          </ul>

          <a href="/admin/product" class="btn btn-warning pull-left">Kembali</a>
        </div>
      </div>
    </div>

    <div class="col-xs-3">
    </div>

  </div>
</div>
@stop