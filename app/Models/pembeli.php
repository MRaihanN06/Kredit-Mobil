<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pembeli extends Model
{
    use HasFactory;

    protected $primaryKey = 'ktp_pembeli';
    public $incrementing = false;
    protected $table = 'pembeli';
    protected $fillable = [
        'ktp_pembeli',
        'nama_pembeli',
        'alamat_pembeli',
        'telp_alamat'
    ];
}
