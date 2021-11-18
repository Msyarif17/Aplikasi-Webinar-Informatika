<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ZoomOauth extends Model
{
    use HasFactory;
    
    public function is_table_empty() {
        $result = ZoomOauth::select('id')->where('provider','zoom')->get(); 
        if($result->num_rows) {
            return false;
        }
  
        return true;
    }
  
    public function get_access_token() {
        $sql = ZoomOauth::select('provider_value')->where('provider','zoom')->get(); 
        $result = $sql->fetch_assoc();
        return json_decode($result['provider_value']);
    }
  
    public function get_refersh_token() {
        $result = $this->get_access_token();
        return $result->refresh_token;
    }
  
    public function update_access_token($token) {
        $zoom = $zoom ?? new ZoomOauth;
        $zoom->provider = 'zoom';
        $zoom->provider_value = $token;
        $zoom->save();
        return back()->with('Sukses generate Zoom Link');
    }
}
