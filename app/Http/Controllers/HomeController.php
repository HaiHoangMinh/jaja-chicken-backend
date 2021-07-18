<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
session_start();

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return redirect()->to('/');
        }
        return redirect()->to('/admin');
    }
}