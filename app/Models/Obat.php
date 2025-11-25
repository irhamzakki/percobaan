<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    protected $table = 'obat';
    protected $primaryKey = 'Kode_obat'; // hanya jika kode obat adalah primary key
    public $incrementing = false; // kalau kode obat bukan auto increment

    protected $fillable = [
        'Kode_obat',
        'nm_obat',
        'harga_obat',
        'tgl_kadaluarsa',
        'satuan',
        'letak_obat',
        'stok',
    ];

    public $timestamps = false;
}

