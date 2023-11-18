<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presensi extends Model
{
    use HasFactory;
    protected $table = 'Presensi';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'id_user', 'tanggal', 'status', 'tgl','waktu_pulang', 'keterangan'];


    public function user()
{
    return $this->belongsTo(User::class, 'id_user');
}

}
