<?php

namespace App\Http\Controllers\BackEnd;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use App\Models\Narasumber;
use App\Models\Pengunjung;

class IndexController extends Controller
{
    public function index(){
        $admin = User::role('Admin')->get()->count();
        $peserta = User::role('Peserta')->get()->count();
        $narasumber = Narasumber::get()->count();
        $sertif = Jadwal::get()->count();
        $webinar = Jadwal::get()->count();
        $pengunjung = Pengunjung::get()->first();
        return view('back-end.index',compact('admin','peserta','narasumber','sertif','webinar','pengunjung'));
    }
    // public function user(){
    //     return view('back-end.user.index');
    // }
    // public function narasumber(){
    //     return view('back-end.narasumber.index');
    // }
    // public function sertificate(){
    //     return view('back-end.sertif.index');
    // }
    // public function report(){
    //     return view('back-end.report.index');
    // }
    
}
