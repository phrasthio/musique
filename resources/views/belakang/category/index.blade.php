@extends('belakang.master')

@section('contentbelakang')    
  <section class="content-header">
    <h1>
      CATEGORY
    </h1>
    <ol class="breadcrumb">
      <li><a href="/admin/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active">Category</li>
    </ol>
  </section>

  <section class="content"> 
    <div class="row">

      <div class="col-xs-2">
      </div>
      
      <div class="col-xs-6">
        <div class="box">
          <div class="box-header">
            <strong>Data - Data Kategori</strong>
              <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#modal-tambah">
                Add Category
              </button>
          </div>
          <div class="box-body">
            <table class="table table-bordered table-hover dataTable">
                <thead>
                  <tr class="success">
                    <th>Category Product</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($kategoris as $kategori)
                  <tr role="row" class="odd">
                    <td>{{$kategori->kategori}}</td>
                    <td>
                      <a href="/admin/kategori/{{$kategori->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                      <a href="#" class="btn btn-danger btn-sm hapus" kat-nama="{{$kategori->kategori}}" kat-id="{{$kategori->id}}">Delete</a>
                    </td>
                  </tr>
                @endforeach
                </tbody>
            </table>
            {{$kategoris->links()}}
          </div>
        </div>  
      </div>

      <div class="col-xs-2">
      </div>

    </div>
  </section>

<div class="modal fade" id="modal-tambah">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title">Add Category</h4>
      </div>
      <div class="modal-body">
        <form action="/admin/kategori/create" method="POST" enctype="multipart/form-data">
          {{csrf_field()}}
          <div class="form-group {{$errors->has('kategori') ? ' has-error' : ''}}"> 
            <label for="kategori">Category Product</label>
            <input name="kategori" type="text" id="kategori" class="form-control" autofocus="" placeholder="nama kategori">
            @if($errors->has('kategori'))
                <span class="invalid-feedback" role="alert">
                    <small class="text-danger">{{ $errors->first('kategori') }}</small>
                </span>
            @endif
          </div>

          <div class="modal-footer">
            <button type="submit" class="btn btn-primary btn-round">Save New Category</button>
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
  $('.hapus').click(function(){
    var kat_id = $(this).attr('kat-id')
    var kat_nama = $(this).attr('kat-nama')

    swal({
      title: "Yakin",
      text: "Mau Hapus Kategori "+kat_nama+" ?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      console.log(willDelete);
      if (willDelete) {
        window.location = "/admin/kategori/"+kat_id+"/hapus";
      } else {
        
      }
    });

  });
</script>
@stop