<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index($id)
    {
        $user = $this->user->find($id);
        return view('home',compact('user'));
    }
}