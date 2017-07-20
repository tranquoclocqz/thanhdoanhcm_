<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Danhmuc extends Model
{
    protected $table = "danhmuc";

    public function diadiem(){
    	return $this->hasMany('App\Diadiem','iddanhmuc','id');
    }
}
