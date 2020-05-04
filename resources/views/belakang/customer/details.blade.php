@extends('belakang.master')

@section('contentbelakang')
<section class="content-header">
  <h1>
    Edit Data User 
    <small>Kelola Data User</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="/users"><i class="fa fa-dashboard"></i>User</a></li>
    <li class="active">Edit User</li>
  </ol>
</section>
<div class="content">
  <div class="row">
    <div class="col-xs-6">
      <div class="box">
        <div class="box-header">Detail Data User <b>{{$users->nama_lengkap}}</b></div>
        <div class="box-body">
        	<table class="table table-bordered table-hover dataTable">
            <thead>
                <tr class="info ">
                    <th class="text-center">Informasi</th>
                </tr>
            </thead>
          </table>
          <table  class="table table-bordered table-hover dataTable">
                <tbody>
                    <tr>
                      <td>Username</td>
                      <td>{{$users->name}}</td>
                    </tr>
                    <tr>
                      <td>Email</td>
                      <td>{{$users->email}}</td>
                    </tr>
                    <tr>
                      <td>Nama Lengkap</td>
                      <td>{{$users->nama_lengkap}}</td>
                    </tr>
                    <tr>
                      <td>Jenis Kelamin</td>
                      <td>{{$users->jenis_kelamin}}</td>
                    </tr>
                    <tr>
                      <td>Nomor Telpon</td>
                      <td>{{$users->nomor_telpon}}</td>
                    </tr>
                    <tr>
                      <td>Kota</td>
                      <td>{{$users->kota}}</td>
                    </tr>
                    <tr>
                      <td>Negara</td>
                      <td>{{$users->negara}}</td>
                    </tr>
                    <tr>
                      <td>Kode Pos</td>
                      <td>{{$users->kode_pos}}</td>
                    </tr>
                </tbody>
          </table>
          <table class="table table-bordered table-hover dataTable">
              <thead>
                  <tr class="success">
                      <th class="text-center">Alamat</th>
                  </tr>
              </thead>
              <tbody>
              	<tr>
                    <td>{{$users->alamat}}</td>
                  </tr>
              </tbody>
          </table>
          <table class="table table-bordered table-hover dataTable">
              <thead>
                  <tr class="success">
                      <th class="text-center">Tentang {{$users->name}}</th>
                  </tr>
              </thead>
              <tbody>
              	<tr>
                    <td>{!!$users->tentang!!}</td>
                  </tr>
              </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="col-xs-6">
    	<div class="box">
        <div class="box-header">Edit Data User</div>
    	  <div class="box-body">
    			<div class="form-group">
    				<label for="foto">Foto</label>
    				<img class="user-img img-responsive" src="{{asset('gambars/'.$users->foto)}}">
    			</div>
    			<a href="/admin/customer" class="btn btn-warning pull-left">Kembali</a>
    		</div>
      </div>
    </div>
  </div>
</div>
@endsection