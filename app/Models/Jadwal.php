<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'judul',
        'thumbnail',
        'deskripsi',
        'link',
        'narasumber_id',
        'moderator_id',
        'jadwal',
        'created_by',
        'updated_by',
        
    ];
    public function narasumber()
	{
		return $this->belongsTo(Narasumber::class);
	}
<<<<<<< HEAD
    public function moderator()
	{
		return $this->belongsTo(Moderator::class);
	}
    public function peserta()
	{
		return $this->hasMany(RegistrasiPeserta::class,'jadwal_id');
	}
=======
>>>>>>> e000fd2ed1736a19122b745448badf6a4ab70653
}
