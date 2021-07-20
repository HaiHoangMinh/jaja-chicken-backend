<?php

namespace App\Http\Controllers;

;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
session_start();

class AdminController extends Controller
{
    public function AuthLogin()
    {
        $admin_id = Session::get('admin_id');
        if($admin_id != null)
        {
            Redirect::to('/');
        } else {
            Redirect::to('/admin')->send();
        }
    }
    public function loginAdmin()
    {
        if (Auth::check()) {
            return redirect()->to('/');
        }
       return view('login');
    }
    public function postLoginAdmin(Request $request)
    {

        $result = DB::table('users')->where('username',$request->username)->where('password',md5($request->password))->first();
        
        $remember  = $request->remember_me;

        if ($result) {
            Session::put('admin_name',$result->name);
            Session::put('admin_id',$result->id);
            Session::put('admin_img',$result->feature_image_path);
            if ($remember !=null) {
                Session::put('admin_username',$request->username);
                Session::put('admin_password',$request->password);
                return view('home');
            }
            else {
                Session::put('admin_username',null);
                Session::put('admin_password',null);
                return view('home');
            }
            
        }
        else{
            Session::put('message','Tên đăng nhập hoặc mật khẩu không đúng!!');
            return Redirect::to('/admin');
        }
       
       
    }
    public function logout()
    {
        $this->AuthLogin();
        Session::put('admin_name',null);
        Session::put('admin_id',null);
        Session::put('admin_img',null);
        Auth::logout();
        return Redirect::to('/admin');
    }
}