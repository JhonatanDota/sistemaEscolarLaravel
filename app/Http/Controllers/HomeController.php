<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('principais.home');
    }

    public function info(){
        return view('principais.info');
    }
}
