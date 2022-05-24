<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function loginAdmin(){
        return view('login');
    }
    public function postLoginAdmin(Request $request){
        $this->validate($request,[
           'email'=>'required|email:filter',
           'password'=>'required'
        ]);
        $remember=$request->has('remember_me') ? true:false;
        if(Auth()->attempt([
            'email'=>$request->input('email'),
            'password'=>$request->input('password')
        ],$remember)){
            return redirect()->to('home');
        }
        session()->flash('error','Email hoặc mật khẩu không chính xác.Mời bạn nhập lại');
        return  redirect()->back();
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('admin.login');
    }
}

