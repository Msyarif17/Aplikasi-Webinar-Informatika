<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\WebinarMailController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ZoomOauthController;
use App\Models\RegistrasiPeserta;

class PendaftaranController extends Controller
{
    public function index(){
        return view('front-end.webinar.pendaftaran');
    }
    public function daftar(Request $request){
        $reg['user_id'] = Auth::user()->id;
        $reg['jadwal_id'] = $request->jadwal_id;
        $token = new ZoomOauthController;
        $reg['token'] = $token->generateToken();
        RegistrasiPeserta::create($reg);
        $mail = new WebinarMailController;
        $mail->sendMailReg(Auth::user()->name,Auth::user()->email,)
        return redirect()->back()
                        ->with('success','Pendaftaran sukses');
    }
}
