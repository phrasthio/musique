<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Keranjang;
use App\Produk;
use App\User;
use Carbon\Carbon;
use App\DataPembelian;
use App\ProdukPembelian;

class CartController extends Controller
{
    public function addtocart(Request $request, $id)
    {
     $qty = 1;

     $produk =  Produk::find($id);

     $harga = $produk->harga;
     $diskon = $produk->diskon;
     $kali = $harga * $diskon;
     $bagi = $kali / 100;
     $hasil = $harga - $bagi;
     

     $keranjang = Keranjang::where(['id_produk'=>$produk->id,'id_user'=> auth()->user()->id])->count();
        if($keranjang>0){
        	return redirect()->back()->with('warning','Produk Sudah ada dalam Keranjang');
        }else{
        $request->request->add(['id_produk' => $produk->id]);
        $request->request->add(['id_user' => auth()->user()->id]);
        $request->request->add(['gambar' => $produk->gambar]);
        $request->request->add(['namaproduk' => $produk->namaproduk]);
        $request->request->add(['diskon' => $produk->diskon]);
        $request->request->add(['hargaasli' => $produk->harga]);
        $request->request->add(['harga' => $hasil]);
        $request->request->add(['qty' => $qty]);
        $keranjang = Keranjang::create($request->all());
        //===================================================
    	}
        return redirect('/product/cartview/'.auth()->user()->id)->with('success','Produk Dimasukan Kedalam Keranjang');
    }

    public function addtocartqty(Request $request, $id)
    {
     $qty = $request->qty;

     $produk =  Produk::find($id);

     $harga = $produk->harga;
     $diskon = $produk->diskon;
     $kali = $harga * $diskon;
     $bagi = $kali / 100;
     $hasil = $harga - $bagi;
     

     $keranjang = Keranjang::where(['id_produk'=>$produk->id,'id_user'=> auth()->user()->id])->count();
        if($keranjang>0){
            return redirect()->back()->with('warning','Produk Sudah ada dalam Keranjang');
        }else{
        $request->request->add(['id_produk' => $produk->id]);
        $request->request->add(['id_user' => auth()->user()->id]);
        $request->request->add(['gambar' => $produk->gambar]);
        $request->request->add(['namaproduk' => $produk->namaproduk]);
        $request->request->add(['diskon' => $produk->diskon]);
        $request->request->add(['hargaasli' => $produk->harga]);
        $request->request->add(['harga' => $hasil]);
        $request->request->add(['qty' => $qty]);
        $keranjang = Keranjang::create($request->all());
        //===================================================
        }
        return redirect('/product/cartview/'.auth()->user()->id)->with('success','Produk Dimasukan Kedalam Keranjang');
    }

    public function tampilkeranjang($id_user)
    {
        $coun = Keranjang::where('id_user', $id_user)->count();
        $keranjang = Keranjang::where('id_user', $id_user)->get();
        $user = User::find($id_user);

        return view('depan.keranjang.index', ['keranjangs'=>$keranjang,'users'=>$user, 'counts'=>$coun] );
    }

    public function hapus($id)
    {
    	$keranjang = Keranjang::find($id);
        $keranjang->delete();

        return redirect()->back()->with('success','Barang Berhasil Dihapus');
    }

    public function editqty(Request $request, $id)
    {
        Keranjang::find($id)->update(['qty' => $request->get('value'),]);
        return redirect()->back();
    }

    public function checkout($id)
    {
        $keranjang = Keranjang::where('id_user', $id)->count();
        if($keranjang == 0){
            return redirect()->back()->with('warning','Tidak Ada Barang Dalam Keranjang');
        }else{
            $user = User::find($id);
            $produk = Keranjang::where('id_user', $id)->first();
            return view('depan.keranjang.checkout', ['users'=>$user,'produks'=>$produk]);
        }
        
    }

    public function transaksi(Request $request,$id)
    {
// $dp = DataPembelian::where('id_user', $id)->orderBy('id','desc')->first();
// $waktus = $dp->created_at->format('YmdHis');
// $waktu = $waktus + 100;
// dd($waktu);
//INSERT DATA-ORDER
        $diskon = 0;
        $harga = 0;
        $user = User::find($id);  

        if($user->nomor_telpon == null){
            return redirect()->back()->with('warning','Nomor Telpon Masih Kosong, Silahkan isi pada halaman profil');
        }elseif($user->desa == null){
            return redirect()->back()->with('warning','Desa Masih Kosong, Silahkan isi pada halaman profil');
        }elseif($user->alamat == null){
            return redirect()->back()->with('warning','Alamat Masih Kosong, Silahkan isi pada halaman profil');
        }elseif($user->foto == null){
            return redirect()->back()->with('warning','Foto Masih Kosong, Silahkan isi pada halaman profil');
        }elseif($user->provinsi == null){
            return redirect()->back()->with('warning','Provinsi Masih Kosong, Silahkan isi pada halaman profil');
        }elseif($user->kode_pos == null){
            return redirect()->back()->with('warning','Kode Pos Masih Kosong, Silahkan isi pada halaman profil');
        }elseif($user->nama_lengkap == null){
            return redirect()->back()->with('warning','Nama Lengkap Masih Kosong, Silahkan isi pada halaman profil');
        }elseif($user->kabupaten == null){
            return redirect()->back()->with('warning','Kabupaten Masih Kosong, Silahkan isi pada halaman profil');
        }elseif($user->jenis_kelamin == null){
            return redirect()->back()->with('warning','Jenis Kelamin Masih Kosong, Silahkan isi pada halaman profil');
        }elseif($user->kecamatan == null){
            return redirect()->back()->with('warning','Kecamatan Masih Kosong, Silahkan isi pada halaman profil');
        }else{

            $hariini = new Carbon();
            $hariini->addDays(2);
            setlocale(LC_TIME, 'id');           
            $jatuh = $hariini->formatLocalized('%A, %d %B %Y %H : %m');
//INVOICE
            $request->request->add(['id_user' => $user->id]);
            $request->request->add(['invoice' => str_random(8)]);
            $request->request->add(['jatuhtempo' => $jatuh]);
            $request->request->add(['status' => 'Belum Bayar']);
            $request->request->add(['metodepembayaran' => '--- Belum Disetting ---']);
            DataPembelian::create($request->all());
//INSERT KE TABLE ORDER-PRODUK
            $dao = DataPembelian::where('id_user', $id)->orderBy('id','desc')->first();
            $op = Keranjang::where('id_user', $id)->get();


            foreach($op as $produk){
                $subtotal = $produk->harga * $produk->qty;
                $request->request->add(['id_datapembelian' => $dao->id]);
                $request->request->add(['id_produk' => $produk->id_produk]);
                $request->request->add(['qty' => $produk->qty]);
                $request->request->add(['namaproduk' => $produk->namaproduk]);
                $request->request->add(['gambar' => $produk->gambar]);
                $request->request->add(['diskon' => $produk->diskon]);
                $request->request->add(['harga' => $produk->harga]);
                $request->request->add(['hargaasli' => $produk->hargaasli]);
                $request->request->add(['subtotal' => $subtotal]);

                $op = ProdukPembelian::create($request->all());
            }
//HAPUS CART YG UDAH DIBELI
            $keranjang = Keranjang::where('id_user', $id);
            $keranjang->delete();

//DataPembelian::where('created_at', '<', $waktu)->delete();

            return redirect('/profile/history/'.auth()->user()->id)->with('success','Transaksi Berhasil, Silahkan Cek Pada Halaman Profile -> History');
        }
    }
}
