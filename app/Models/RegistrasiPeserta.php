<?php

namespace App\Models;

use App\Models\Narasumber;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RegistrasiPeserta extends Model
{
    use HasFactory;
	protected $fillable = [
        'user_id',
		'jadwal_id',
		'token',
        'created_by',
        'updated_by',
        
    ];
    public function webinar()
	{
		return $this->belongsTo(Jadwal::class);
	}
    public function peserta()
	{
		return $this->belongsTo(User::class);
	}

}
