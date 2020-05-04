<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    protected $table = 'keranjang';

    protected $fillable = ['id_produk','id_user','qty','gambar','namaproduk','diskon','harga','hargaasli'];


    public function produks()
    {
    	return $this->belongsTo('App\Produk','id_produk');
    }
    
    public function users()
    {
    	return $this->belongsTo('App\User','id');
    }
}
