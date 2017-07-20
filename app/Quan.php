<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quan extends Model
{
    protected $table = "quan";

    public function phuong(){
    	return $this->hasMany('App\Phuong','idquan','id');
    }

    public function diadiem(){
    	return $this->hasManyThrough('App\Diadiem','App\Phuong',
    								'idquan','idphuong','id');
    }
}
