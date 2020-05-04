<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    //BERES
    public function index()
    {
    	$user = User::where('role','=','admin')->orderBy('id','desc')->paginate(5);
    	return view('belakang.user.index',['users'=>$user]);
    }
    //RAPIH
    public function detail($id)
    {
    	$user = User::where('id',$id)->first();
    	return view('belakang.user.edit',['users'=>$user]);
    }
    //RAPIH
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->update($request->all());
        return redirect('/admin/user')->with('success','Role User Berhasil Diperbarui');
    }
}
