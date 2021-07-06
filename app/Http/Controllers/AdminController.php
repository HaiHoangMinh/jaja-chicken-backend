<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function loginAdmin()
    {
        if (Auth::check()) {
            return redirect()->to('');
        }
       return view('login');
    }
    public function postLoginAdmin(Request $request)
    {
        $errorMsgs = [
            'email.required' => "Email không được để trống",
            'email.email' => 'email không hợp lệ',
            'password.required' => "Không để trống password"
        ];
        $validator = Validator::make($request->all(),[
            'email' => 'required|email',
            'password' =>'required'
        ]);
    $remember = $request->has('remember_me') ? true:false;
       if(Auth::attempt([
           'email' => $request->email,
          'password' => $request->password
       ],$remember)){
        return redirect()->to('/');
       } else {echo "login fail";}
       
       
    }
    public function logout()
    {
        if(Auth::logout())
        {
            return redirect()->to('/');
        }
        return redirect()->to('/admin');
    }
}