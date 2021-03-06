<?php

namespace App\Http\Controllers\FrontEnd;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Jadwal;
use App\Models\Pengunjung;
use Illuminate\Http\Request;
use App\Models\RegistrasiPeserta;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ZoomOauthController;
use App\Http\Controllers\WebinarMailController;
use App\Models\Narasumber;

class IndexController extends Controller
{
    public function index(Request $request){
        $view=[
            'count' => $request->session()->increment('count')
        ];
        if(Pengunjung::where('id', 1)->count() == 1){
            Pengunjung::where('id', 1)->update($view);
        }
        else{
            Pengunjung::create($view);
        }
        $narasumber = Narasumber::all();
        $latest = Jadwal::latest()->take(3)->get();
        $webinar = Jadwal::latest()->take(6)->get();
        
        return view('front-end.index',compact('latest','webinar','narasumber'));
    }
    public function webinar(){
        $webinar = Jadwal::latest()->paginate(6);
        return view('front-end.webinar.index',compact('webinar'));
    }
    public function detail($id){
        $webinar = Jadwal::where('id',$id)->with([
            'narasumber' => function ($query){
                return $query->withTrashed();
            }
        ])->first();
        return view('front-end.webinar.detail',compact('webinar'));
    }
    public function daftar($id){
        $webinar = Jadwal::find($id);
        
        if($webinar->jadwal <= Carbon::now('Asia/Jakarta')->format('Y-m-d H:i:s')){
            return back()->with('failed','Pendaftaran telah DITUTUP');
        }
        else if(RegistrasiPeserta::where('user_id',Auth::user()->id)->where('jadwal_id',$id)->count() == 1){
            return back()->with('failed','Pendaftaran gagal, anda hanya bisa daftar 1 kali untuk setiap webinar');
        }else{
            $reg['user_id'] = Auth::user()->id;
            $reg['jadwal_id'] = $id;
            $token = new ZoomOauthController;
            $reg['token'] = $token->generateToken();
            RegistrasiPeserta::create($reg);
            $mail = new WebinarMailController;
            $mail->sendMailReg(Auth::user()->name,Auth::user()->email, $webinar, $reg['token']);
            return back()->with('success','Pendaftaran sukses');
        }
        
    }
    public function absen(Request $request, $id){
        $webinar = Jadwal::find($id);
    }
    public function cek($token){
        $regist = RegistrasiPeserta::where('token',$token)->first();
        $webinar = Jadwal::where('id',$regist->jadwal_id)->first()->judul;
        $user = User::where('id',$regist->user_id)->first();
        
        return view('front-end.cek-sertif.cek', compact('webinar','user','regist'));
    }
}
