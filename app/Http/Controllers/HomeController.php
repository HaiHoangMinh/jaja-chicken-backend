<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session as FacadesSession;

session_start();

class HomeController extends Controller
{
    public function AuthLogin()
    {
        $admin_id = FacadesSession::get('admin_id');
        if($admin_id != null)
        {
            Redirect::to('/');
        } else {
            Redirect::to('/admin')->send();
        }
    }
    public function index()
    {
        $this->AuthLogin();
        
        return view("home");
    }
            
}