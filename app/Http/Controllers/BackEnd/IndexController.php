<?php

namespace App\Http\Controllers\BackEnd;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index(){
        $admin = User::role('Admin')->get()->count();
        return view('back-end.index',compact('admin'));
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
