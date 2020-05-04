@extends('depan.master')

@section('content')
<div class="section">
  <div class="container">
    <form action="/profile/edit/{{ Auth::user()->id }}/perbarui" method="POST" enctype="multipart/form-data">
    {{csrf_field()}}
    <div class="row">
      <div class="col-md-1">
      </div>
    
      <div class="col-md-7 order-details">
            <div class="order-summary">
              <div class="order-col">
                <h4>Nama Lengkap</h4>
                <input class="form-control" type="text" name="nama_lengkap" value="{{$users->nama_lengkap}}">
              </div><br>
              <div class="order-col">
                <h4>Phone</h4>
                <input class="form-control" type="number" name="nomor_telpon" value="{{$users->nomor_telpon}}">
              </div><br>
              <div class="order-col">
                <h4>Jenis Kelamin</h4>
                  <select name="jenis_kelamin" class="form-control" id="id_kategori">
                      <option value="L" @if(auth()->user()->jenis_kelamin == 'L') selected @endif>Laki - Laki</option>
                      <option value="P" @if(auth()->user()->jenis_kelamin == 'P') selected @endif>Perempuan</option>
                  </select>
              </div><br>
              <div class="order-col">
                <h4>Alamat</h4>
                <textarea name="alamat" rows="5" type="text" class="form-control">{{$users->alamat}}</textarea> 
              </div>

              <div class="order-col">
                <h4>Desa</h4>
                <input class="form-control" type="text" name="desa" value="{{$users->desa}}">
              </div>
              <div class="order-col">
                <h4>Kecamatan</h4>
                <input class="form-control" type="text" name="kecamatan" value="{{$users->kecamatan}}">
              </div>
              <div class="order-col">
                <h4>Kabupaten</h4>
                <input class="form-control" type="text" name="kabupaten" value="{{$users->kabupaten}}">
              </div>
              <div class="order-col">
                <h4>Provinsi</h4>
                <input class="form-control" type="text" name="provinsi" value="{{$users->provinsi}}">
              </div>
              <div class="order-col">
                <h4>Kode Pos</h4>
                <input class="form-control" type="number" name="kode_pos" value="{{$users->kode_pos}}">
              </div>
            </div>
      </div>

      <div class="col-md-3 order-details">
        <div class="section-title text-center">
          <h5 class="title">Photo</h5>
        </div>
        <div id="product-main-img">
          <div class="product-preview">
            <img src="{{asset('gambars/'.Auth::user()->foto)}}">
          </div>
        </div>
          <input class="form-control" type="file" name="foto" value="{{$users->foto}}">
      </div>

      <div class="col-md-1">
      </div>

    </div>
    <div class="row">
          <div class="col-md-1">
          </div>

          <div class="col-md-5">
            <div class="col-md-6">
              <a href="/profile/{{ Auth::user()->name }}/{{ Auth::user()->id }}" class="primary-btn order-submit">Back</a>
            </div>
            <div class="col-md-6">
              <button type="submit" class="primary-btn order-submit">Save Profile</button>
            </div>
          </div>

          <div class="col-md-5">
          </div>

          <div class="col-md-1">
          </div>
    </div>
    </form>
  </div>
  <!-- /container -->
</div>
<!-- /SECTION -->
@endsection