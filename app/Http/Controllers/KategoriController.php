<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori;

class KategoriController extends Controller
{
    public function adminindex()
    {
    	$kategori = Kategori::orderBy('id','desc')->paginate(10);
    	return view('belakang.category.index',['kategoris'=>$kategori]);
    }

    public function adminedit($id)
    {
    	$kategori = Kategori::find($id);
    	return view('belakang.category.edit',['kategoris'=>$kategori]);
    }

    public function admincreate(Request $request)
    {
    	$this->validate($request,[
    		'kategori' => 'required'
    	]);
    	$kategori = Kategori::create($request->all());
    	return redirect()->back()->with('success','Data Kategori Berhasil Dimasukan');
    }

    public function adminhapus($id)
    {
    	$kategori = Kategori::find($id);
        $kategori->delete();
        return redirect()->back()->with('success','Data Kategori Berhasil Dihapus');
    }

    public function adminperbarui(Request $request, $id)
    {
    	$this->validate($request,[
    		'kategori' => 'required'
    	]);
    	$kategori = Kategori::find($id);
        $kategori->update($request->all());
        return redirect('/admin/kategori')->with('success','Data Kategori Berhasil Diperbarui');
    }
}
