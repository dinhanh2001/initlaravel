<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class AdminController extends Controller
{
    public function index(){
    	return view('admin.index');
    }
    public function getLogin(){
    	return view('admin.login');
    }
    public function postLogin(Request $request){
        $email = $request->email;
        $password = $request->password;
        if(Auth::attempt(['user_email' => $email, 'password' => $password]))
        {
            return redirect()->route('admin.index');
        }
        else
        {
            session()->flash('error','Sai tài khoản hoặc mật khẩu');
            $request->flash();
            return back();
        }
    }
    public function getLogout(){
    	Auth::logout();
    	return redirect()->route('admin.get.login');
    }
}
