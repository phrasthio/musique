@extends('belakang.master')

@section('contentbelakang')    
  <section class="content-header">
    <h1>
      PRODUCTS
      <small>Halaman Kelola Product</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active">Product</li>
    </ol>
  </section>

<div class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">Data - Data Produk
                  <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#modal-tambah">
                    Add Product
                  </button>
                </div>
                <div class="box-body">
                    <table class="table table-bordered table-hover dataTable">
                        <thead>
                            <tr class="success">
                                <th>Nama Produk</th>
                                <th>Kategori</th>
                                <th>Harga</th>
                                <th>Diskon</th>
                                <th>Gambar</th>
                                <th>Deskripsi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach($produks as $produk)
                            <tr role="row" class="odd">
                              <td>{{$produk->namaproduk}}</td>
                              <td>{{$produk->kategoris->kategori}}</td>
                              <td>@currency($produk->harga)</td>
                              <td>{{$produk->diskon}} %</td>
                              <td>
                                <div class="image">
                                  <img width="100" src="{{asset('gambars/'.$produk->gambar)}}">
                                </div>
                              </td>
                              <td>{!! Str::limit($produk->deskripsi, 15) !!}</td>
                              <td>
                                <a class="btn btn-info"href="/admin/product/{{$produk->id}}/detail">View</a>
                                <a class="btn btn-warning" href="/admin/product/{{$produk->id}}/edit">Edit</a>
                                <a href="#" class="btn btn-danger hapus" pro-nm="{{$produk->namaproduk}}" pro-id="{{$produk->id}}">Delete</a>
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                    </table>
                    {{$produks->links()}}
                </div>
            </div>
        </div>

    </div>
</div>
<div class="modal fade" id="modal-tambah">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title">Add Product</h4>
      </div>
      <div class="modal-body">
        <form action="/admin/product/create" method="POST" enctype="multipart/form-data">
          {{csrf_field()}}
          <div class="form-group {{$errors->has('namaproduk') ? ' has-error' : ''}}">
            <label for="namaproduk">Product Name</label>
            <input name="namaproduk" type="text" class="form-control" id="namaproduk" autofocus="" placeholder="nama produk" value="{{old('namaproduk')}}">
            @if($errors->has('namaproduk'))
                <span class="invalid-feedback" role="alert">
                    <small class="text-danger">{{ $errors->first('namaproduk') }}</small>
                </span>
            @endif
          </div>

          <div class="form-group">
            <label for="id_kategori">Category Produk</label>
            <select name="id_kategori" class="form-control">
              @foreach($kategoris as $kategori)
              <option value="{{$kategori->id}}">{{$kategori->kategori}}</option>
              @endforeach
            </select>
          </div>

          <div class="form-group {{$errors->has('harga') ? ' has-error' : ''}}">
            <label for="harga">Price</label>
            <input name="harga" type="number" class="form-control" id="harga" placeholder="harga produk" value="{{old('harga')}}" >
            @if($errors->has('harga'))
                <span class="invalid-feedback" role="alert">
                    <small class="text-danger">{{ $errors->first('harga') }}</small>
                </span>
            @endif
          </div>

          <div class="form-group {{$errors->has('diskon') ? ' has-error' : ''}}">
            <label for="diskon">Discount</label>
            <input name="diskon" type="number" class="form-control" id="diskon" placeholder="diskon produk" value="0">
            @if($errors->has('diskon'))
                <span class="invalid-feedback" role="alert">
                    <small class="text-danger">{{ $errors->first('diskon') }}</small>
                </span>
            @endif
          </div>

          <div class="form-group {{$errors->has('deskripsi') ? ' has-error' : ''}}">
            <label for="deskripsi">Description</label>
            <textarea name="deskripsi" id="editor" type="textarea" class="form-control deskripsi" placeholder="deskripsi produk">{!! old('deskripsi') !!}</textarea>
            @if($errors->has('deskripsi'))
                <span class="invalid-feedback" role="alert">
                    <small class="text-danger">{{ $errors->first('deskripsi') }}</small>
                </span>
            @endif
          </div>

          <div class="form-group {{$errors->has('gambar') ? ' has-error' : ''}}">
            <label for="gambar">Image</label>
            <input name="gambar" type="file" class="form-control" id="gambar"value="{{old('gambar')}}">
            @if($errors->has('gambar'))
                <span class="invalid-feedback" role="alert">
                    <small class="text-danger">{{ $errors->first('gambar') }}</small>
                </span>
            @endif
          </div>

          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Save New Product</button>
          </div>
        </form>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
@stop

@section('footer')
<script>
    CKEDITOR.replace( 'editor', options );
</script>
<script>
  $('.hapus').click(function(){
    var pro_id = $(this).attr('pro-id')
    var pro_nm = $(this).attr('pro-nm')

    swal({
      title: "Yakin ?",
      text: "Mau Hapus Produk dengan Nama "+pro_nm+" ?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      console.log(willDelete);
      if (willDelete) {
        window.location = "/admin/product/"+pro_id+"/hapus";
      } else {
        
      }
    });

  });
</script>

@stop
