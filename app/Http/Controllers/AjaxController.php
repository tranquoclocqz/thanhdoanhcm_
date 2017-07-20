<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Diadiem;
class AjaxController extends Controller
{
    function laythongtin($iddanhmuc){
    	$diadiem = Diadiem::where('iddanhmuc', $iddanhmuc)->get();
    	foreach($diadiem as $key){
    		echo '<div>
					<li class="wicked"><a href="#">'.$key->tendiadiem.'</a></li>
					<li class="mullet">'.$key->diachi.'</li>
					<li class="iew"><a href="#">View Location on Map</a></li>
				</div>';
    	}
    }

    function laydanhsachphuong($idphuong){
        $diadiem = diadiem::select('slug','id','tendiadiem')->where('idphuong',$idphuong)->orderBy('id', 'desc')->take(10)->get();
        foreach($diadiem as $dd){
            echo '<div>
                    <a href="'.route('chitiet',['slug'=>$dd->slug,'id'=>$dd->id]).'">'.$dd->tendiadiem.'</a>
                </div>';
        }
    }

    function laydanhsachquan($idquan){

    }
}
