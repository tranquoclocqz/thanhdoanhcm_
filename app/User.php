<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{

    protected $table = "user";

   public function diadiem(){
        return $this->hasMany('App\Diadiem','user_id','id');
   }
}
