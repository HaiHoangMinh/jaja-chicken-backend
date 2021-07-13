<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
session_start();

class HomeController extends Controller
{
    public function index()
    {
        $users = DB::table('users')->get();
        return view('home',compact('users'));
    }
}