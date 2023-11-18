<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Magang extends Model
{
    use HasFactory;
    protected $table = 'anak_magang';
    protected $primaryKey = 'id_magang';
    protected $fillable = ['id_user', 'id_minat',];
}
