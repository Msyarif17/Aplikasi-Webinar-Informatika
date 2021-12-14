<?php

namespace App\Http\Controllers\FrontEnd;

use App\Models\Jadwal;
use Illuminate\Http\Request;
use App\Models\RegistrasiPeserta;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ZoomOauthController;
use App\Http\Controllers\WebinarMailController;

class IndexController extends Controller
{
    public function index(){
        return view('front-end.index');
    }
    public function webinar(){
        $webinar = Jadwal::paginate(6);
        return view('front-end.webinar.index',compact('webinar'));
    }
    public function detail($id){
        $webinar = Jadwal::find($id);
        return view('front-end.webinar.detail',compact('webinar'));
    }
    public function daftar($id){
        $webinar = Jadwal::find($id);
        if(RegistrasiPeserta::where('user_id',Auth::user()->id)->andWhere('jadwal_id',$id)->count() == 1){
            return back()->with('failed','Pendaftaran gagal, anda hanya bisa daftar 1 kali untuk setiap akun');
        }
        $reg['user_id'] = Auth::user()->id;
        $reg['jadwal_id'] = $id;
        $token = new ZoomOauthController;
        $reg['token'] = $token->generateToken();
        RegistrasiPeserta::create($reg);
        $mail = new WebinarMailController;
        dd($mail->sendMailReg(Auth::user()->name,Auth::user()->email, $webinar, $reg['token']));
        return back()->with('success','Pendaftaran sukses');
    }
    public function absen(Request $request, $id){
        $webinar = Jadwal::find($id);
    }
}
