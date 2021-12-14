<?php

namespace App\Http\Controllers;
use Exception;
use Carbon\Carbon;
use App\Models\ZoomOauth;
use Illuminate\Http\Request;
use MacsiDigital\Zoom\Facades\Zoom;
use Illuminate\Support\Facades\Http;

class ZoomOauthController extends Controller
{
    public function generateLinkZoom($judul,$jadwal){
        
        $user = Zoom::user()->find('webinarinformatikaofficial@gmail.com');
        
        $meeting = Zoom::meeting()->make([
            'topic' => $judul,
            'type' => 8,
            'start_time' => new Carbon($jadwal), 
        ]);
        $meeting->recurrence()->make([
            'type' => 2,
            'repeat_interval' => 1,
            'weekly_days' => '2',
            'end_times' => 5
        ]);
      
        $meeting->settings()->make([
            'join_before_host' => true,
            'approval_type' => 1,
            'registration_type' => 2,
            'enforce_login' => false,
            'waiting_room' => false,
        ]);
        // dd($user->meetings()->save($meeting));
        $user->meetings()->save($meeting);
        
        return $meeting->join_url;
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
    public function generateToken()
    {
        //Generate a random string.
        $token = openssl_random_pseudo_bytes(16);

        //Convert the binary data into hexadecimal representation.
        $token = bin2hex($token);

        //Print it out for example purposes.
        return $token;
    }
}