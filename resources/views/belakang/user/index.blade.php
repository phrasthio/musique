@extends('belakang.master')

@section('contentbelakang')    
  <section class="content-header">
    <h1>
      ADMINS
    </h1>
    <ol class="breadcrumb">
      <li><a href="/admin/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active">Admins</li>
    </ol>
  </section>

  <section class="content"> 
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <strong>Data - Data Admin</strong>
          </div>
          <div class="box-body">
            <table class="table table-bordered table-hover dataTable">
                <thead>
                  <tr class="success">
                    <th>Username</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Full Name</th>
                    <th>Register On</th>
                    <th>Update On</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                @php setlocale(LC_TIME, 'id');    @endphp  
                @foreach($users as $user)
                  <tr role="row" class="odd">
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->role}}</td>
                    <td>{{$user->nama_lengkap}}</td>
                    <td>{{$user->created_at->formatLocalized('%A, %d %B %Y %H : %m')}}</td>
                    <td>{{$user->updated_at->formatLocalized('%A, %d %B %Y %H : %m')}}</td>
                    <td>
                      <a href="/admin/user/detail/{{$user->id}}" class="btn btn-warning btn-sm">Edit</a>
                    </td>
                  </tr>
                @endforeach
                </tbody>
            </table>
            {{$users->links()}}
          </div>
        </div>  
      </div>

    </div>
  </section>
 
@endsection