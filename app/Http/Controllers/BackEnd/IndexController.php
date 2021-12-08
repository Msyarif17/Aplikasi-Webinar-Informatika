<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        return view('back-end.index');
    }
    public function user(){
        return view('back-end.user.index');
    }
    public function narasumber(){
        return view('back-end.narasumber.index');
    }
    public function sertificate(){
        return view('back-end.sertif.index');
    }
    public function report(){
        return view('back-end.report.index');
    }
    
}
