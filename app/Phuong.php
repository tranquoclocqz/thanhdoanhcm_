<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phuong extends Model
{
    protected $table = "phuong";

    public function quan(){
    	return $this->belongsTo('App\Quan','idquan','id');
    }

    public function diadiem(){
    	return $this->hasMany('App\Diadiem','idphuong','id');
    }
}
