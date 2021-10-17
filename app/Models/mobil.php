<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mobil extends Model
{
    use HasFactory;

    protected $primaryKey = 'kode_mobil';
    public $incrementing = false;
    protected $table = 'mobil';
    protected $fillable = [
        'kode_mobil',
        'merek_mobil',
        'tipe_mobil',
        'warna_mobil',
        'harga_mobil',
        'gambar_mobil'
    ];
}
