<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use \App\Http\Middleware\LogAccessMiddleware;

class AboutUsController extends Controller
{
    public function __construct(){
        // $this->middleware(LogAccessMiddleware::class); // passou para o kernel.php
        $this->middleware('log.access');  // chama pelo nome
    }
    public function aboutUs(){
        return view("site.about-us");
    }
}
