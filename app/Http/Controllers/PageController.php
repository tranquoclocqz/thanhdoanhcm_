<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Diadiem;
use App\Danhmuc;
class PageController extends Controller
{
	function __construct(){
		$danhmuc = danhmuc::all();		
		view()->share('danhmuc',$danhmuc);
	}
    function index(){
    	$diadiem = diadiem::select('tendiadiem','id','diachi','slug')->where('iddanhmuc','1')->orderBy('id','desc')->take(10)->get();
    	return view('frontend/index/index',['diadiem'=>$diadiem,'title'=>'index']);
    }

    function danhmuc(){
        return view('frontend/category/category',['title'=>'category.blade.php']);
    }

    function chitiet($slug,$id){
        $diadiem = diadiem::find($id);
        return view('frontend/single/single',['title'=>$diadiem->tendiadiem,'diadiem'=>$diadiem]);
    }

    function err404(){
    	return view('frontend/404/404',['title'=>'404 page']);
    }

    function lienhe(){
        return view('frontend/contact/contact',['title'=>'contact.blade.php']);
    }
}
