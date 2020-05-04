<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\DataPembelian;

class CustomerController extends Controller
{
    public function index()
    {
    	$customer = User::where('role','=','customer')->orderBy('id','desc')->paginate(5);
    	return view('belakang.customer.index',['customers'=>$customer]);
    }

    //SI ADMIN BUKAN PEMILIK
    public function detail($id)
    {
    	$user = User::where('id',$id)->first();
    	return view('belakang.customer.details',['users'=>$user]);
    }
    //SI PEMILIK 
    public function edit($id)
    {
        $user = User::where('id',$id)->first();
        return view('belakang.customer.edit',['users'=>$user]);
        
    }

    //SI PEMILIK OK
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->update($request->all());
        return redirect('/admin/customer')->with('success','Role User Berhasil Diperbarui');
    }

}
