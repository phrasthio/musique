<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataPembelian extends Model
{
    protected $table = 'datapembelian';

    protected $fillable = ['id_user','invoice','jatuhtempo','status','metodepembayaran'];

    public function users() 
    {
    	return $this->belongsTo('App\User','id_user');
    }
}
