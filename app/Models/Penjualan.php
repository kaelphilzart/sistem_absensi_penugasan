<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;
    protected $table = 'penjualan';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'stand', 'tanggal', 'nama', 'menu', 'harga', 'jumlah', 'total'];

    public function scopeSearch($query, $keyword)
    {
        return $query->where('nama', 'like', '%' . $keyword . '%')
                     ->orWhere('stand', 'like', '%' . $keyword . '%');
    }
    
    public function fillProductTotalColumn()
{
    $this->total = $this->harga * $this->jumlah;
    $this->save();
}

    
}
