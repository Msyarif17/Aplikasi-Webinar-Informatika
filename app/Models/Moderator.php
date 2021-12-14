<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Moderator extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        
    ];
    public function jadwal()
	{
		return $this->hasMany(Jadwal::class,'moderator_id');
	}
}
