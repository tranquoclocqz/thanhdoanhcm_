<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diadiem extends Model
{
    protected $table = "diadiem";

    public function phuong(){
    	return $this->belongsTo('App\Phuong','idphuong','id');
    }

    public function danhmuc(){
    	return $this->belongsTo('App\Danhmuc','iddanhmuc','id');
    }

    public function user(){
    	return $this->belongsTo('App\User','user_id','id');
    }
}
