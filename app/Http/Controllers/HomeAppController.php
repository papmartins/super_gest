<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeAppController extends Controller
{
    public function index(){
        return view('app.home');
    }
}
