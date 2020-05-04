<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produk';

    protected $fillable = ['id_kategori','namaproduk','harga','deskripsi','diskon','gambar'];

    public function kategoris()
    {
    	return $this->belongsTo('App\Kategori','id_kategori');
    }
}
