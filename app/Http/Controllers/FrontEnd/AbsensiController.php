<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Http\Controllers\WebinarMailController;
use App\Models\Absen;
use App\Models\Jadwal;
use App\Models\RegistrasiPeserta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AbsensiController extends Controller
{
   
    public function index($id)
    {
        return view('front-end.webinar.absen',compact('id'));
    }
    public function absen(Request $request,$id){
        if(RegistrasiPeserta::where('user_id',Auth::user()->id)->where('token',$request->token)->count() == 1){
            $absen = [
                'jadwal_id' => $id,
                'user_id'   => Auth::user()->id,
                'token'     => $request->token,
            ];
           
            $webinar = Jadwal::where('id',$id)->first();
            $mailSertif = new WebinarMailController;
            $mailSertif->sendMailSertif(Auth::user(),$webinar,$request->token); 
            Absen::create($absen);
            return redirect()->route('index');
        }
        else{
            return view('front-end.absensi.gagal');
        } 
    }
}
