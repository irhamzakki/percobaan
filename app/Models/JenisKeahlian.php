<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisKeahlian extends Model
{
    use HasFactory;

    protected $table = 'jenis_keahlian';
    protected $primaryKey = 'Kode_keahlian';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = ['Kode_keahlian', 'Nama_keahlian'];
}
