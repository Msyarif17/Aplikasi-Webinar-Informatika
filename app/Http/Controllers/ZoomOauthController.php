<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Models\ZoomOauth;
class ZoomOauthController extends Controller
{
    public function index(){
        $url = "https://zoom.us/oauth/authorize?response_type=code&client_id=".config('app.client_id')."&redirect_uri=".config('app.redirect_uri');
        return view('auth.zoom-oauth',compact('url'));
    }
    
    public function handle(Request $request) {
        try {
            
            $response = Http::post('https://zoom.us/oauth/token',[
                "headers" => [
                    "Authorization" => "Basic ". base64_encode(config("app.client_id").":".config("app.client_secreat"))
                ],
                "form_params" => [
                    "grant_type" => "authorizationCode",
                    "code" => $_GET["code"],
                    "redirect_uri" => config("app.redirect_uri")
                ],
            ]);
           dd($response);
          
            $token = json_decode($response->getBody()->getContents(), true);
          
            $db = new ZoomOauth;
            $db->update_access_token(json_encode($token));
            return back();
        } catch(Exception $e) {
            echo $e->getMessage();
        }
    }
}