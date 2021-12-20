<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Narasumber extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'image',
        'name',
        'institusi',
        'motivation',
        'created_by',
        'updated_by',
        
    ];
    public function jadwal()
	{
		return $this->hasMany(Jadwal::class,'narasumber_id');
	}
}
