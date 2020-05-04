@extends('belakang.master')

@section('contentbelakang')
<section class="content-header">
  <h1>
    Edit Kategori
    <small>Kelola Data Kategori</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="/kategori"><i class="fa fa-dashboard"></i>Kategori</a></li>
    <li class="active">Edit Kategori</li>
  </ol>
</section>
<div class="content">
  <div class="row">
    <div class="col-xs-2">
    </div>
    <div class="col-xs-8">
      <div class="box">
        <div class="box-header">Edit Data Kategori</div>
        <div class="box-body">

          <form action="/admin/kategori/{{$kategoris->id}}/perbarui" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group {{$errors->has('kategori') ? ' has-error' : ''}}"> 
                <label for="kategori">Nama Kategori</label>
                <input name="kategori" autofocus="" type="text" id="kategori" class="form-control" value="{{$kategoris->kategori}}">
                @if($errors->has('kategori'))
                  <span class="invalid-feedback" role="alert">
                      <small class="text-danger">{{ $errors->first('kategori') }}</small>
                  </span>
                @endif
            </div>

            <div class="modal-footer">
              <button type="submit" class="btn btn-primary btn-round">Perbarui
              </button>
              <a href="/admin/kategori" class="btn btn-warning pull-left">Kembali</a>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="col-xs-2">
    </div>
  </div>
</div>

@endsection
