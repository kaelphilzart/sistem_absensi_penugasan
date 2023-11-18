<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hasil extends Model
{
    use HasFactory;
    protected $table = 'hasil';
    protected $primaryKey = 'id';
    protected $fillable = ['id_task', 'id_user', 'deadline', 'tugas'];
}
