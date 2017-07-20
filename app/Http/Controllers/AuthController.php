<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
	function loginGet(){
		return view('backend/login/login',['title'=>'Đăng nhập']);
	}

    function loginPost(Request $request){
    	$this->validate($request,[
    		'email'=>'required',
    		'password'=>'required|min:8|max:32'],[
    		'email.required'=>'Bạn chưa nhập email',
    		'password.required'=>'Bạn chưa nhập mật khẩu',
    		'password.min'=>'Mật khẩu từ 8 - 32 ký tự',
    		'password.max'=>'Mật khẩu từ 8 - 32 ký tự',
    		]);
    	if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
    		return redirect('admin/dashboard');
    	} else {
    		return redirect('admin/login')->with('err','Đăng nhập không thành công, vui lòng kiểm tra lại');
    	}
    }

    function destroy(){
    	if(Auth::check()){
    		Auth::logout();
    		return redirect('admin/login');
    	}
    }
}
