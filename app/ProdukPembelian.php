<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProdukPembelian extends Model
{
    protected $table = 'produkpembelian';

    protected $fillable = ['id_datapembelian','id_produk','qty','namaproduk','gambar','diskon','harga','hargaasli','subtotal'];

    public function produks() 
    {
    	return $this->belongsTo('App\Produk','id_produk');
    }
}
