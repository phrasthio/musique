<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\DataPembelian;
use App\ProdukPembelian;

class OrderController extends Controller
{
    public function index()
    {
    	$dapem = DataPembelian::orderBy('id','desc')->paginate(10);
    	return view('belakang.order.index',['dapems'=>$dapem]);
    }

    public function detail($beli, $user, $invoice)
    {
    	$produkpembelian = ProdukPembelian::where('id_datapembelian',$beli)->get();
    	$pembelian = DataPembelian::where('id',$beli)->first();
    	$ucer = User::where('id',$user)->first();
    	return view('belakang.order.detail',['pembelians'=>$pembelian, 'ucers'=>$ucer,'produkpembelians'=>$produkpembelian]);
    }
}
