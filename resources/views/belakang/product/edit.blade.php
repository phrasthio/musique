@extends('belakang.master')

@section('contentbelakang')    
<section class="content-header">
  <h1>
    Edit Data Produk 
    <small><b><i>{{$produks->namaproduk}}</i></b></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="/produk"><i class="fa fa-dashboard"></i>Produk</a></li>
    <li class="active">Edit Produk</li>
  </ol>
</section>
<div class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">Edit Data Kategori</div>
        <div class="box-body">
          <form action="/admin/product/{{$produks->id}}/perbarui" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}

            <div class="row">

              <div class="col-xs-6">
                <div class="form-group {{$errors->has('namaproduk') ? ' has-error' : ''}}">
                  <label for="namaproduk">Nama Produk</label>
                  <input name="namaproduk" type="text" class="form-control" id="namaproduk" autofocus="" value="{{$produks->namaproduk}}">
                  @if($errors->has('namaproduk'))
                      <span class="invalid-feedback" role="alert">
                          <small class="text-danger">{{ $errors->first('namaproduk') }}</small>
                      </span>
                  @endif
                </div>
              </div>

              <div class="col-xs-6">
                <div class="form-group">
                  <label for="id_kategori">Kategori Produk</label>
                  <select name="id_kategori" class="form-control">
                    @foreach($kategoris as $kategori)
                    <option value="{{$kategori->id}}"  @if ($kategori->id == $produks->id_kategori) selected @endif>{{$kategori->kategori}}</option>
                    @endforeach
                  </select>
                </div>
              </div>

            </div>

            <div class="row">

              <div class="col-xs-6">
                <div class="form-group {{$errors->has('harga') ? ' has-error' : ''}}">
                  <label for="harga">Harga Produk</label>
                  <input name="harga" type="number" class="form-control" id="harga" value="{{$produks->harga}}">
                  @if($errors->has('harga'))
                      <span class="invalid-feedback" role="alert">
                          <small class="text-danger">{{ $errors->first('harga') }}</small>
                      </span>
                  @endif
                </div>
              </div>

              <div class="col-xs-6">
                <div class="form-group {{$errors->has('diskon') ? ' has-error' : ''}}">
                  <label for="diskon">Diskon</label>
                  <input name="diskon" type="number" class="form-control" id="diskon" value="{{$produks->diskon}}">
                  @if($errors->has('diskon'))
                      <span class="invalid-feedback" role="alert">
                          <small class="text-danger">{{ $errors->first('diskon') }}</small>
                      </span>
                  @endif
                </div>
              </div>
              
            </div>

            <div class="form-group {{$errors->has('deskripsi') ? ' has-error' : ''}}">
              <label for="deskripsi">Deskripsi Produk</label>
              <textarea name="deskripsi" id="deskripsi" rows="5" type="textarea" class="form-control">{{$produks->deskripsi}}</textarea>
              @if($errors->has('deskripsi'))
                  <span class="invalid-feedback" role="alert">
                      <small class="text-danger">{{ $errors->first('deskripsi') }}</small>
                  </span>
              @endif
            </div>

            <div class="form-group {{$errors->has('gambar') ? ' has-error' : ''}}">
              <label for="gambar">Gambar Produk</label>
              <input name="gambar" type="file" class="form-control" id="gambar" value="{{$produks->gambar}}">
              @if($errors->has('gambar'))
                  <span class="invalid-feedback" role="alert">
                      <small class="text-danger">{{ $errors->first('gambar') }}</small>
                  </span>
              @endif
            </div>

            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Perbarui</button>
              <a href="/admin/product" class="btn btn-warning pull-left">Kembali</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@stop


@section('footer')
<script>
    ClassicEditor
        .create( document.querySelector( '#deskripsi' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
@stop