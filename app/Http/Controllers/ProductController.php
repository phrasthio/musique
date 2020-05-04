<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produk;
use App\Kategori;

class ProductController extends Controller
{
    public function adminindex()
    {
        $kategori = kategori::all();
        $produk = Produk::orderBy('id','desc')->paginate(10);
        return view('belakang.product.index',['produks'=>$produk,'kategoris'=>$kategori]);
    }

    public function admincreate(Request $request)
    {
        $this->validate($request,[
            'namaproduk' => 'required',
            'harga' => 'required|numeric|digits_between:1,10',
            'diskon' => 'required|numeric|digits_between:1,2',
            'deskripsi' => 'required'
            //'gambar' => 'required|image|max:2000|mimes:jpg,jpeg,png,bmp'
        ]);

        $produk = Produk::create($request->all());

        if($request->hasFile('gambar')){
            $ext = $request->file('gambar')->getClientOriginalExtension();
            $nama = date('YmdHis'). ".$ext";
            $request->file('gambar')->move('gambars',$nama);
            $produk->gambar = $nama;
            $produk->save();
        }
        return redirect()->back()->with('success','Data Produk Berhasil Dimasukan');
    }

    public function adminedit($id)
    {
        $kategori = kategori::all();
        $produk = Produk::find($id);
        return view('belakang.product.edit',['produks'=>$produk,'kategoris'=>$kategori]);
    }

    public function adminperbarui(Request $request, $id)
    {   
        $this->validate($request,[
            'namaproduk' => 'required',
            'harga' => 'required|numeric|digits_between:1,10',
            'diskon' => 'required|numeric|digits_between:1,2',
            'deskripsi' => 'required',
            'gambar' => 'image|max:2000|mimes:jpg,jpeg,png,bmp'
        ]);
        $produk = Produk::find($id);
        $produk->update($request->all());

        if($request->hasFile('gambar')){
            $ext = $request->file('gambar')->getClientOriginalExtension();
            $nama = date('YmdHis'). ".$ext";
            $request->file('gambar')->move('gambars',$nama);
            $produk->gambar = $nama;
            $produk->save();
        }
        return redirect('/admin/product')->with('success','Data Produk Berhasil Diperbarui');
    }

    public function admindetail($id)
    {
        $kategori = Kategori::all();
        $produk = Produk::find($id);
        return view('belakang.product.detail',['produks'=>$produk,'kategoris'=>$kategori]);
    }

    public function adminhapus($id)
    {
        $produk = Produk::find($id);
        $produk->delete();
        return redirect()->back()->with('success','Data Produk Berhasil Dihapus');
    }

    public function index(Request $request)
    {
        $cekproduk = Produk::orderBy('id','desc')->count();
        $produk = Produk::orderBy('id','desc')->paginate(12);
        $kategori = Kategori::all();
        return view('depan.product.index',['produks'=>$produk, 'kategoris'=>$kategori, 'cekproduks'=>$cekproduk]);
    }

    public function kategori(Request $request, $kategori)
    {
        $cekproduk = Produk::where('id_kategori',$kategori)->count();
        $produk = Produk::where('id_kategori',$kategori)->orderBy('id','desc')->paginate(8);
        $kategori = Kategori::all();
        return view('depan.product.indexkategori',['produks'=>$produk, 'kategoris'=>$kategori, 'cekproduks'=>$cekproduk]);
    }

    public function details($id)
    {
        $kategori = Kategori::all();
        $produk = Produk::find($id);
        return view('depan.product.detail',['produks'=>$produk,'kategoris'=>$kategori]);
    }
}
