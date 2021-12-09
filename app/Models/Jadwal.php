<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'institusi',
        'motivation',
        'created_by',
        'updated_by',
        
    ];
    public function narasumber()
	{
		return $this->belongsTo(Narasumber::class);
	}
}
