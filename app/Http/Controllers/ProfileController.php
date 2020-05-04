<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\Auth;
use App\Keranjang;
use App\ProdukPembelian;
use App\DataPembelian;

class ProfileController extends Controller
{
    public function index($id, $name)
    {
    	return view('depan.profile.index');
    }

    public function edit($name, $id)
    {
    	$user = User::where('id',$id)->first();
    	return view('depan.profile.edit',['users'=>$user]);
    }

    public function perbarui(Request $request, $id)
    {
    	$user = User::find($id);
    	$user->update($request->all());
    	if($request->hasFile('foto')){
            $ext = $request->file('foto')->getClientOriginalExtension();
            $nama = date('YmdHis'). ".$ext";
            $request->file('foto')->move('gambars',$nama);
            $user->foto = $nama;
            $user->save();
        }
    	return redirect('/profile/'.auth()->user()->name.'/'.auth()->user()->id)->with('success','Profile anda Berhasil Diperbarui');
    }

    public function histori($nama, $id)
    {
        $datapembelian = DataPembelian::where('id_user',$id)->first();
        $produkpembelian = ProdukPembelian::where('id_datapembelian',$datapembelian->id)->get();
        
        $count = DataPembelian::where('id_user', $id)->count();
        $dapem = DataPembelian::orderBy('id','desc')->paginate(10);
        return view('depan.profile.history',['dapems'=>$dapem,'counts'=>$count,'produkpembelians'=>$produkpembelian]);
    }

    public function detail($id,$user,$invo)
    {
        $datapembelian = DataPembelian::where('id',$id)->first();
        $produkpembelian = ProdukPembelian::where('id_datapembelian', $id)->get();
        $user = User::where('id',$user)->first();
        if($datapembelian->status == 'Belum Bayar'){
            return view('depan.profile.invoicepending',['datapembelians'=>$datapembelian,'produkpembelians'=>$produkpembelian,'users'=>$user]);
        }else{
            return view('depan.profile.invoicesuccess',['datapembelians'=>$datapembelian,'produkpembelians'=>$produkpembelian,'users'=>$user]);
        }
    }
}
