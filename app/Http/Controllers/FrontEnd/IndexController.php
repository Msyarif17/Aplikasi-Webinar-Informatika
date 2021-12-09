<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        return view('front-end.index');
    }
    public function webinar(){
        return view('front-end.webinar.index');
    }
    
}
